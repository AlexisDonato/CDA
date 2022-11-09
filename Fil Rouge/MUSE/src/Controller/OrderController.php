<?php

namespace App\Controller;

use Knp\Snappy\Pdf;
use App\Entity\Cart;
use Twig\Environment;
use App\Entity\Address;
// use App\Form\AddressType;
use App\Data\SearchData;
use App\Service\PdfTools;
use App\Form\OrderAddressType;
use App\Form\SelectAddressType;
use App\Security\EmailVerifier;
use App\Service\Cart\CartService;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrderDetailsRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Address as E_address;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class OrderController extends AbstractController
{
    public function getData(CartService $cartService, ?UserInterface $user, ?OrderDetailsRepository $orderDetails, ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);
        $cartService->setUser($user);
        $info = [
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total'     => $cartService->getTotal($orderDetails),
            'products'  => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount'  => $discount,
            'discount2' => $discount2,
        ];

        return $info;
    }

    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/order', name: 'app_order')]
    public function index(CartService $cartService, ProductRepository $productRepository, Request $request, CategoryRepository $categoryRepository, OrderDetailsRepository $orderDetails, ?UserInterface $user, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_SALES', null, 'User tried to access a page without having ROLE_SALES');
        }
        
        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        $addresses = $this->getDoctrine()->getRepository(Address::class)->findByUser($user);

        $cartService->setUser($user);

        $cart = $cartService->getClientCart();

        $address = new Address();
        $newAddressForm = $this->createForm(OrderAddressType::class);
        $newAddressForm->handleRequest($request);

        if ($newAddressForm->isSubmitted() && $newAddressForm->isValid()) {

            $this->addFlash('success','Adresse ajoutée !');

            $address->setName($newAddressForm->get('name')->getData());
            $address->setCountry($newAddressForm->get('country')->getData());
            $address->setZipcode($newAddressForm->get('zipcode')->getData());
            $address->setCity($newAddressForm->get('city')->getData());
            $address->setPathType($newAddressForm->get('pathType')->getData());
            $address->setPathNumber($newAddressForm->get('pathNumber')->getData());

            $address->setBillingAddress($newAddressForm->get('billingAddress')->getData());
            $address->setDeliveryAddress($newAddressForm->get('deliveryAddress')->getData());


            // $user->addAddress($address); 
            // this equals to :
            $address->setUser($user);
            // and these bind the two classes

            $entityManager->persist($address);
            $entityManager->flush();

            if ($newAddressForm->get('billingAddress')->getData(true)) {
                $cart->setBillingAddress($address);
            }
            if ($newAddressForm->get('deliveryAddress')->getData(true)) {
                $cart->setDeliveryAddress($address);
            }
            $entityManager->persist($cart);
            $entityManager->flush();
            
            return $this->redirectToRoute("app_order");
        }

        $selectForm = $this->createForm(SelectAddressType::class);
        $selectForm->handleRequest($request);
        $addresses = $this->getDoctrine()->getRepository(Address::class)->findByUser($user);
        

        
        if ($selectForm->isSubmitted() && $selectForm->isValid()) {

            $this->addFlash('success','Adresses de FACTURATION et LIVRAISON définies!');

            $cart = $cartService->getClientCart();

            $cart->setBillingAddress($selectForm->get('selectBillingAddress')->getData());
            $cart->setDeliveryAddress($selectForm->get('selectDeliveryAddress')->getData());

            $address->setUser($user);

            $entityManager->persist($cart);
            $entityManager->flush();
        }
        return $this->render('order/index.html.twig', [
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total' => $cartService->getTotal($orderDetails),
            'products' => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount' => $discount,
            'discount2' => $discount2,
            'addresses' => $addresses,
            'cart' => $cart,
            'newAddressForm' => $newAddressForm->createView(),
            'selectForm' => $selectForm->createView(),
        ]);
    }

        public function checkoutAction(Request $request)
        {
        if ($request->isMethod('POST')) {
            $token = $request->request->get('stripeToken');
            \Stripe\Stripe::setApiKey("pk_test_HxZzNHy8LImKK9LDtgMDRBwd");
            \Stripe\Charge::create(array(
              "amount" => $this->get('cart')->getTotal() * 100,
              "currency" => "eur",
              "source" => $token,
              "description" => "Test charge!"
            ));

            $this->getCart()->setValidated(true);

            return $this->redirectToRoute('app_order_validated');
        }
    }

    #[Route('/order/validated', name: 'app_order_validated')]
    public function validateOrder(PdfTools $pdf, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_SALES', null, 'User tried to access a page without having ROLE_SALES');
        }

        $cartService->setUser($user);

        $cart = $cartService->getClientCart();

        // if ($this->cart->isBillingAddress(null) && $this->cart->isDeliveryAddress(null)) {

        //     $this->addFlash('error', "Merci d'enregister vos adresses de facturation et de livraison au préalable!");
        //     $route = $request->headers->get('referer');
        //     return $this->redirect($route);

        // } else {

        $cart->setValidated(true);
        $cart->setShipped(false);
        $cart->setTotal($cartService->getTotal($orderDetails));
        $date = new \DateTime('@'.strtotime('now'));
        $cart->setOrderDate($date);

        $orderId = $cart->getId();
        $clientOrderId = $cart->getClientOrderId();
        $cart->setInvoice('INVOICE-'. $clientOrderId .'.pdf');

        $entityManager->persist($cart);
        $entityManager->flush();

        $clientOrderId = $cart->getClientOrderId();
        $details = $orderDetails->findBy(['cart' => $orderId]);

        $addresses = $this->getDoctrine()->getRepository(Address::class)->findByUser($user);
        
        $pdf->generateInvoice($clientOrderId);

            $email = (new TemplatedEmail())
                ->from(new E_address('info_noreply@muse.com', 'Muse MailBot'))
                ->to($user->getEmail())
                ->cc('Shipping@muse.com')
                ->subject('Votre commande est validée!')
                ->htmlTemplate('email/order_validation_email.html.twig')
                ->context([
                    'details' => $details,
                    'user' => $user,
                    'addresses' => $addresses,
                    'cart'      => $cart,
                    'details' => $details,
                ]);
                // ->attach($pdf, sprintf('order_validation_%s.pdf', date('d-m-Y')));
            $mailer->send($email);

        $this->addFlash('success', 'Commande validée, merci pour votre achat! Un email de confirmation de votre commande a été envoyé sur votre adresse mail');
        return $this->redirectToRoute('app_home');
        // }
        
    }

    #[Route('/verify/order_email', name: 'app_verify_order_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_order');
        }
    }
}