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
use Symfony\Component\Mailer\MailerInterface;
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
    public function pdfAction(Environment $twig, Pdf $pdf, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {
        $pdf_file_path = '/PDFs';

        $html = $this->renderView('email/test.html.twig', array(

        ));

        return new PdfResponse(
            $pdf->getOutputFromHtml($html),
            'file.pdf'
        
            $this->entrypointLookup->reset();
        );
    }
}
