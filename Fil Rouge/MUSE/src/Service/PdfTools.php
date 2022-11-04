<?php


namespace App\Service;

class PdfTools {

    public function generateOrder($orderid) {

        
    }

    public function generateInvoice($orderid) {
        $html = $this->renderView('email/test.html.twig', array(
        ));

    // $html = $this->generateUrl('app_home', array(), true); // use absolute path! -> Render a pdf document with a relative url inside like css files

        return new PdfResponse(
            $pdf->getOutputFromHtml($html),
            // $pdf->getOutput($pageUrl), // To render a pdf document with a relative url inside like css files
            // $pdf->getOutput('email/test.html.twig',array('ignore-load-errors'=>true)),
            'M_O::'.date('Y-m-d').'.pdf'
        );
        
    }

    
}