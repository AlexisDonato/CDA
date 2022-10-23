<?php

namespace App\Controller;

use App\Entity\Address;
use App\Data\SearchData;
use App\Form\AddressType;
use App\Service\Cart\CartService;
use App\Repository\AddressRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrderDetailsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/address')]
class AddressController extends AbstractController
{
    #[Route('/', name: 'app_address_index', methods: ['GET'])]
    public function index(AddressRepository $addressRepository, CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, ?UserInterface $user, ?OrderDetailsRepository $orderDetails): Response
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        $this->denyAccessUnlessGranted('ROLE_CLIENT', null, 'User tried to access a page without having ROLE_CLIENT');

        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        if (!$this->isGranted('ROLE_CLIENT')) {
            $addresses = $this->getDoctrine()->getRepository(Address::class)->findByUser($user);
        }
        if (!$this->isGranted('ROLE_ADMIN')) {
            $addresses = $addressRepository->findAll();
        }

        $cartService->setUser($user);

        return $this->render('address/index.html.twig', [
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
    }

    #[Route('/new', name: 'app_address_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AddressRepository $addressRepository, CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, ?UserInterface $user, ?OrderDetailsRepository $orderDetails, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        $this->denyAccessUnlessGranted('ROLE_CLIENT', null, 'User tried to access a page without having ROLE_CLIENT');

        $address = new Address();
        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);

        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        $cartService->setUser($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $addressRepository->save($address, true);

            // $address->setName($form->get('name')->getData());
            // $address->setCountry($form->get('country')->getData());
            // $address->setZipcode($form->get('zipcode')->getData());
            // $address->setCity($form->get('city')->getData());
            // $address->setPathType($form->get('pathType')->getData());
            // $address->setPathNumber($form->get('pathNumber')->getData());
            // $address->setBillingAddress($form->get('billingAddress')->getData());
            // $address->setDeliveryAddress($form->get('deliveryAddress')->getData());

            // $address->setUser($user);

            // $entityManager->persist($address);
            // $entityManager->flush();

            return $this->redirectToRoute('app_address_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('address/new.html.twig', [
            'address' => $address,
            'form' => $form,
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total'     => $cartService->getTotal($orderDetails),
            'user'      => $user,
            'products'  => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount'  => $discount,
            'discount2' => $discount2,
        ]);
    }

    #[Route('/{id}', name: 'app_address_show', methods: ['GET'])]
    public function show(Address $address, CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, ?UserInterface $user, ?OrderDetailsRepository $orderDetails): Response
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        $this->denyAccessUnlessGranted('ROLE_CLIENT', null, 'User tried to access a page without having ROLE_CLIENT');

        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        $cartService->setUser($user);

        return $this->render('address/show.html.twig', [
            'address' => $address,
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total'     => $cartService->getTotal($orderDetails),
            'user'      => $user,
            'products'  => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount'  => $discount,
            'discount2' => $discount2,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_address_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Address $address, AddressRepository $addressRepository, CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, ?UserInterface $user, ?OrderDetailsRepository $orderDetails): Response
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        $this->denyAccessUnlessGranted('ROLE_CLIENT', null, 'User tried to access a page without having ROLE_CLIENT');

        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);

        $categories = $categoryRepository->findAll();
        $data = new SearchData();
        $products = $productRepository->findSearch($data);
        $products2 =$productRepository->findAll();
        $discount = $productRepository->findDiscount($data);
        $discount2 =$productRepository->findBy(['discount' => true]);

        $cartService->setUser($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $addressRepository->save($address, true);

            return $this->redirectToRoute('app_address_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('address/edit.html.twig', [
            'address' => $address,
            'form' => $form,
            'items'     => $cartService->getFullCart($orderDetails),
            'count'     => $cartService->getItemCount($orderDetails),
            'total'     => $cartService->getTotal($orderDetails),
            'user'      => $user,
            'products'  => $products,
            'products2' => $products2,
            'categories' => $categories,
            'discount'  => $discount,
            'discount2' => $discount2,
        ]);
    }

    #[Route('/{id}', name: 'app_address_delete', methods: ['POST'])]
    public function delete(Request $request, Address $address, AddressRepository $addressRepository, CartService $cartService, ProductRepository $productRepository, CategoryRepository $categoryRepository, ?UserInterface $user, ?OrderDetailsRepository $orderDetails): Response
    {
        if (!$this->isGranted('ROLE_CLIENT')) {
            $this->addFlash('error', 'Accès refusé');
            return $this->redirectToRoute('login');  
        }

        $this->denyAccessUnlessGranted('ROLE_CLIENT', null, 'User tried to access a page without having ROLE_CLIENT');

        if ($this->isCsrfTokenValid('delete'.$address->getId(), $request->request->get('_token'))) {
            $addressRepository->remove($address, true);
        }

        return $this->redirectToRoute('app_address_index', [], Response::HTTP_SEE_OTHER);
    }
}
