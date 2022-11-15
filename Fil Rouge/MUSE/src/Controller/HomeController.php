<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Data\SearchData;
use App\Service\Cart\CartService;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrderDetailsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use ConnectHolland\CookieConsentBundle\CHCookieConsentBundle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    private CartRepository $cartRepository;


    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(Request $request, ?UserInterface $user, CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, CartRepository $cartRepository, OrderDetailsRepository $orderDetails, EntityManagerInterface $entityManager): Response
    {

        if ($this->isGranted('ROLE_CLIENT')) {
            $clientCart = $cartRepository->findOneByUser($user->getId());

            if (!isset($clientCart)) {
                $clientCart = new Cart();
                
                $clientCart->setUser($user);
                $clientCart->setClientOrderId(strtoupper(uniqid('MUSE::')));
                $entityManager->persist($clientCart);
                $entityManager->flush();
            }

            $cartService->setCart($clientCart);
            $cartService->setUser($user);
        }
        
    
        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        $salesByProduct = $this->cartRepository->findSalesByProduct();

        $orderedProducts = $this->cartRepository->findOrderedProducts();

        return $this->render('home/index.html.twig', [
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total' => $cartService->getTotal($orderDetails),
            'products' => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount' => $discount,
            'discount2' => $discount2,
            'salesByProduct' => $salesByProduct,
            'orderedProducts' => $orderedProducts,
        ]);
    }
}
