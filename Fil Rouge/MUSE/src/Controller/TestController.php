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
    public function __construct(?Request $request, Environment $twig, Pdf $pdf, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {
        $this->twig = $twig;
        $this->pdf = $pdf;

        $this->entrypointLookup = $entrypointLookup;

        // $orderId = $this->request->attributes->get('id');
    }


    #[Route('/test', name: 'app_test')]
    public function pdfAction(Environment $twig, Pdf $pdf, Request $request, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {
        $pdf_file_path = '/PDFs';

        $orderId = $request->attributes->get('id');
                
        $details = $orderDetails->findBy(['cart' => $orderId]);
//  dd($details);
        // $orderDate = $details[0]->getCart()->getOrderDate();

        $cartService->setUser($user);
        $clientOrderId = $cart->getClientOrderId();
        
        $carrier = $cart->getCarrier();
        $carrierShipmentId= $cart->getCarrierShipmentId();
        $shipmentDate = $cart->getShipmentDate();
    
        $total = $cart->getTotal();
    
        $user = $cart->getUser();

        $html = $this->renderView('validated_orders/order_validation_email.html.twig', array(
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

        $html = $this->renderView('email/test.html.twig', array(
        ));

    // $html = $this->generateUrl('app_home', array(), true); // use absolute path! -> Render a pdf document with a relative url inside like css files

        return new PdfResponse(
            $pdf->getOutputFromHtml($html),
            // $pdf->getOutput($pageUrl), // To render a pdf document with a relative url inside like css files
            // $pdf->getOutput('email/test.html.twig',array('ignore-load-errors'=>true)),
            'file.pdf'
        );
        $this->entrypointLookup->reset();
    }

}



