<?php

use Knp\Snappy\Pdf;
use Twig\Environment;
use App\Entity\Address;
use App\Data\SearchData;
use App\Service\Cart\CartService;
use App\Repository\UserRepository;
use App\Repository\AddressRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\OrderDetailsRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class SendCommand extends Command
{
    private $twig;
    private $pdf;
    public function __construct(MailerInterface $mailer, Environment $twig, Pdf $pdf, UserRepository $userRepository, UserInterface $user, AddressRepository $addressRepository, CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, ?OrderDetailsRepository $orderDetails)
    {
        $this->twig = $twig;
        $this->pdf = $pdf;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        $addresses = $this->getDoctrine()->getRepository(Address::class)->findByUser($user);

        $cartService->setUser($user);

            $html = $this->twig->render('email/order_validation_pdf.html.twig', [
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total'     => $cartService->getTotal($orderDetails),
            'user'      => $user,
            'products'  => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount'  => $discount,
            'discount2' => $discount2,
            'addresses' => $addresses,
            ]);

            $pdf = $this->pdf->getOutputFromHtml($html);
        }
    }

