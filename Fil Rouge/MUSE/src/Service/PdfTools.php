<?php


namespace App\Service;

use Knp\Snappy\Pdf;
// use App\Entity\Cart;
// use App\Entity\OrderDetails;
use App\Service\Cart\CartService;
use App\Repository\CartRepository;
// use Symfony\Component\HttpFoundation\Request;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class PdfTools {

    private $pdf;
    private $cartRepository;
    private $request;
    private $orderDetails;
    private $cartService;
    private $cart;
    private $orderId;

    public function __construct(Pdf $pdf, CartRepository $cartRepository, CartService $cartService) 
    {
        $this->pdf = $pdf;
        $this->cartRepository = $cartRepository;
        // $this->request = $request;
        // $this->orderDetails = $orderDetails;
        $this->cartService = $cartService;
        // $this->cart = $cart;
        // $this->cart->getId() = $orderId;
    }

    public function getClientCart() {
        if (isset($this->user)) {
            return $this->cartRepository->findOneByUser($this->user->getId());
        } else {
            return null;
        }
    }

    public function generateInvoice($orderId) {

        $order = $this->cartRepository->find($orderId);


        $clientCart = $this->getClientCart();

                
        // $details = $this->orderDetails->findBy(['cart' => $orderId]);

        // $cartService->setUser($user);
        
        $html = $this->renderView('email/test.html.twig', array(
            "order" => $order,
            'order_id' => $cart->getClientOrderId(),
            'cart_id' => $orderId,
            'details' => $details,
            'orderDate' => $orderDate,
            'shipped' => $cart->isShipped(),
            'shipmentDate' => $cart->getShipmentDate(),
            'carrier' => $cart->getCarrier(),
            'carrierShipmentId' => $cart->getCarrierShipmentId(),
            'user' => $cart->getUser(),
            'total' => $cart->getTotal(),
        ));

        $this->pdf->generateFromHtml($html, getenv('INVOICE_DIRECTORY') . 'Invoice-'. $orderId .'.pdf');
    // $html = $this->generateUrl('app_home', array(), true); // use absolute path! -> Render a pdf document with a relative url inside like css files

        // return new PdfResponse(
        //     $pdf->getOutputFromHtml($html),
        //     // $pdf->getOutput($pageUrl), // To render a pdf document with a relative url inside like css files
        //     // $pdf->getOutput('email/test.html.twig',array('ignore-load-errors'=>true)),
        //     'M_O::'.date('Y-m-d').'.pdf'
        // );
    }
 
}