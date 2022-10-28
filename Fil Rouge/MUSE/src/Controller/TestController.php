<?php

namespace App\Controller;

use DateTime;
use Knp\Snappy\Pdf;
use App\Entity\Cart;
use Twig\Environment;
use App\Entity\Address;
use App\Service\Cart\CartService;
use App\Repository\CartRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrderDetailsRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function pdfAction(Pdf $knpSnappyPdf, Environment $twig, Pdf $pdf, EntrypointLookupInterface $entrypointLookup, ?CartService $cartService, ?CartRepository $cartRepository, ?Cart $cart, ?UserInterface $user, ?EntityManagerInterface $entityManager, OrderDetailsRepository $orderDetails, MailerInterface $mailer)
    {

        $html = $this->renderView('email/test.html.twig', array(

        ));

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'file.pdf'
        );
    }
}
