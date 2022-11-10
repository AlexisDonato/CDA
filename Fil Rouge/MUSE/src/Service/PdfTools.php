<?php


namespace App\Service;

use Knp\Snappy\Pdf;
// use App\Entity\Cart;
// use App\Entity\OrderDetails;
use Twig\Environment;
use App\Service\Cart\CartService;
// use Symfony\Component\HttpFoundation\Request;
use App\Repository\CartRepository;
use App\Repository\OrderDetailsRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class PdfTools {

    private $pdf;
    private $cartRepository;
    private $request;
    private $orderDetails;
    private $cartService;
    private $cart;
    private $orderId;
    private $templating;
    private $user;

    public function __construct(Pdf $pdf, CartRepository $cartRepository, CartService $cartService, OrderDetailsRepository $orderDetails, ?UserInterface $user,  Environment $templating) 
    {
        $this->pdf = $pdf;
        $this->cartRepository = $cartRepository;
        // $this->request = $request;
        $this->orderDetails = $orderDetails;
        $this->cartService = $cartService;
        // $this->cart = $cart;
        // $this->cart->getId() = $orderId;
        $this->user = $user;
        $this->templating = $templating;
    }

    public function generateInvoice($orderId) {
        // $orderId = $this->cart->getId();

        $order = $this->cartRepository->find($orderId);

        $user = $this->cartService->getUser($orderId);

        $details = $this->orderDetails->findBy(['cart' => $orderId]);
        // $cart = $this->cartService->getClientCart();
        // $clientOrderId = $this->cartRepository->getClientOrderId($orderId);

        $html = $this->templating->render('email/invoice.html.twig', array(
            "order" => $order,
            'details' => $details,
            'user' => $user,
        ));

        $this->pdf->generateFromHtml($html, '../doc/Invoice-'. $orderId .'.pdf', [], true);

    }
 
}