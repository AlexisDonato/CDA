<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Service\Cart\CartService;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\OrderDetailsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart_index')]
    // #[IsGranted("ROLE_CLIENT")]
    public function index(CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, ?UserInterface $user, ?OrderDetailsRepository $orderDetails): Response
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('info', 'Merci de vous connecter ou de vous inscrire au préalable');
            return $this->redirectToRoute('login');  
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        }

        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        $cartService->setUser($user);
        $total = $cartService->getTotal($orderDetails);

        return $this->render('cart/index.html.twig', [
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total'     => $total,
            'products'  => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount'  => $discount,
            'discount2' => $discount2,
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add')]
    public function add($id, CartService $cartService, ?UserInterface $user, Request $request) 
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('info', 'Merci de vous connecter ou de vous inscrire au préalable');
            return $this->redirectToRoute('login');  
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        }

        $cartService->setUser($user);
        $cartService->addOrRemove($id);

        // Redirects to the last page :
        $route = $request->headers->get('referer');
        return $this->redirect($route);
    }

    #[Route('/cart/remove/{id}', name: 'app_cart_remove')]
    public function remove($id, CartService $cartService, ?UserInterface $user, Request $request) 
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        }

        $cartService->setUser($user);
        $cartService->addOrRemove($id, $remove=true);

        $route = $request->headers->get('referer');
        return $this->redirect($route);
    }

    #[Route('/cart/deleteAll', name: 'app_cart_deleteAll')]
    public function deleteALL(CartService $cartService, ?UserInterface $user) 
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        }

        $cartService->setUser($user);
        $cartService->deleteALL();
        $this->addFlash('success', 'Votre panier a bien été vidé.');
        return $this->redirectToRoute('app_home');
    }

    #[Route('/cart/delete/{id}', name: 'app_cart_delete')]
    public function delete($id, CartService $cartService, ?UserInterface $user, Request $request) 
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        if ($this->getUser()->getUserIdentifier() != $user->getUserIdentifier()) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        }

        $cartService->setUser($user);
        $cartService->delete($id);

        $route = $request->headers->get('referer');
        return $this->redirect($route);
    }
}
