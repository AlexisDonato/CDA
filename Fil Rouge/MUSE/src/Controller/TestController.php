<?php

namespace App\Controller;

use DateTime;
use Knp\Snappy\Pdf;
use App\Entity\Cart;
use Twig\Environment;
use App\Service\Cart\CartService;
use App\Repository\CartRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrderDetailsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    private $twig;
    private $pdf;
    public function __construct(Environment $twig, Pdf $pdf, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {
        $this->twig = $twig;
        $this->pdf = $pdf;

        $this->entrypointLookup = $entrypointLookup;
    }


    #[Route('/test', name: 'app_test')]
    public function pdfAction(Environment $twig, Pdf $pdf, Request $request, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {
        $pdf_file_path = '/PDFs';
        dd($request->attributes);
        $orderId = $request->attributes->get('id');
        $details = $orderDetails->findBy(['cart' => $orderId]);

        // $orderDate = $details[0]->getCart()->getOrderDate();
        $cartService->setUser($user);
        $clientOrderId = $cart->getClientOrderId();

        $carrier = $cart->getCarrier();
        $carrierShipmentId= $cart->getCarrierShipmentId();
        $shipmentDate = $cart->getShipmentDate();
    
        $total = $cart->getTotal();
    
        $user = $cart->getUser();

        $html = $this->renderView('order/index.html.twig', array(
                'order_id' => $clientOrderId,
                'cart_id' => $orderId,
                'details' => $details,
                'orderDate' => $orderDate,
                'shipped' => $cart->isShipped(),
                'shipmentDate' => $shipmentDate,
                'carrier' =>$carrier,
                'carrierShipmentId' => $carrierShipmentId,
                'user' => $user,
                'total' => $total,
        ));

// $html = $this->generateUrl('app_home', array(), true); // use absolute path!

        return new PdfResponse(
            $pdf->getOutputFromHtml($html),
            'file.pdf'
        

        );
        $this->entrypointLookup->reset();
    }


    #[Route('/test/download', name: 'app_test_download')]
    public function DlPdfAction(Environment $twig, Pdf $pdf, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {
        $pdf_file_path = '/PDFs';

        $html = $this->renderView('order/index.html.twig', array(

        ));

// $html = $this->generateUrl('app_home', array(), true); // use absolute path!

        return new PdfResponse(
            $pdf->getOutputFromHtml($html),
            'file.pdf'
        

        );
        $this->entrypointLookup->reset();
    }


}



