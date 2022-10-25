<?php

namespace App\Controller;

use App\Entity\Address;
use App\Data\SearchData;
// use App\Form\AddressType;
use App\Form\OrderAddressType;
use App\Form\SelectAddressType;
use App\Security\EmailVerifier;
use App\Service\Cart\CartService;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrderDetailsRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Address as E_address;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Security\Core\User\UserInterface;
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
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
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

        $address = new Address();
        $form = $this->createForm(OrderAddressType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->addFlash('success','Adresse ajoutée !');

            $address->setName($form->get('name')->getData());
            $address->setCountry($form->get('country')->getData());
            $address->setZipcode($form->get('zipcode')->getData());
            $address->setCity($form->get('city')->getData());
            $address->setPathType($form->get('pathType')->getData());
            $address->setPathNumber($form->get('pathNumber')->getData());
            $address->setBillingAddress($form->get('billingAddress')->getData());
            $address->setDeliveryAddress($form->get('deliveryAddress')->getData());

            // $user->addAddress($address); 
            // this equals to :
            $address->setUser($user);
            // and these bind the two classes

            $entityManager->persist($address);
            $entityManager->flush();
        }

        $selectForm = $this->createForm(SelectAddressType::class);
        $selectForm->handleRequest($request);
        $addresses = $this->getDoctrine()->getRepository(Address::class)->findByUser($user);
        
        if ($selectForm->isSubmitted() && $form->isValid()) {

            $address->setBillingAddress($selectForm->get('selectBillingAddress')->getData(), true);
            $address->setDeliveryAddress($selectForm->get('selectDeliveryAddress')->getData(), true);

            $address->setUser($user);

            $entityManager->persist($address);
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
            'form' => $form->createView(),
            'selectForm' => $selectForm->createView(),
        ]);
    }

    #[Route('/order/validated', name: 'app_order_validated')]
    public function validateOrder(?CartService $cartService, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails)
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        }
        $cartService->setUser($user);

        $cart = $cartService->getClientCart();
        $cart->setValidated(true);
        $cart->setShipped(false);
        $cart->setTotal($cartService->getTotal($orderDetails));
        $date = new \DateTime('@'.strtotime('now'));
        $cart->setOrderDate($date);
        $entityManager->persist($cart);
        $entityManager->flush();

        $orderId = $cart->getId();
        $clientOrderId = $cart->getClientOrderId();
        $details = $orderDetails->findBy(['cart' => $orderId]);
        $orderDate = $cart->getOrderDate();

        $this->emailVerifier->sendEmailConfirmation(
            'app_verify_order_email',
            $user,
            (new TemplatedEmail())
                ->from(new E_address('info_noreply@muse.com', 'Muse MailBot'))
                ->to($user->getEmail())
                ->subject('Votre commande est validée!')
                ->htmlTemplate('validated_orders/order_validation_email.html.twig')
                ->context([
                    'order_id' => $clientOrderId,
                    'details' => $details,
                    'orderDate' => $orderDate,
                    'user' => $user,
                    ]
        ));
                    
        $this->addFlash('success', 'Commande validée, merci pour votre achat! Un email de confirmation de votre commande a été envoyé sur votre adresse mail');
        return $this->redirectToRoute('app_home');
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