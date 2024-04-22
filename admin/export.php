<?php
session_start();
include '../Controller/functions.php';
$admincrudpanel = new admincrudpanel();
if(!isset($_SESSION['smartCookies'])){
    header("Location: ../view/");
}
if(isset($_SESSION['smartCookies'])){
    if($admincrudpanel->askforadmin($_SESSION['smartCookies'])=='non'){
        header("Location: ../view/");
    }
}
    require_once('TCPDF/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content  = '';
    if($_GET['type']=='sell'){
        $pdf->SetTitle("Tableau des voitures à vendre");  
        $content .= '
            <img src="../view/assets/images/logoblack.png" width="150">
            <h2 align="center">Tableau des voitures à vendre</h2>
            <h4>Tableau des voitures à vendre</h4>
            <table border="1" cellspacing="0" cellpadding="3">  
                <tr>  
                    <th>Type de voiture</th>
                    <th>Prix</th> 
                    <th>Nombre de place</th>
                    <th>boite</th>
                    <th>carburant</th>
                </tr>  
      ';  
      $content .= $admincrudpanel->generatesell();  
    }else if($_GET['type']=='louer'){
        $pdf->SetTitle("Liste De Vos Voitures À Louer");  
        $content .= '
            <img src="../view/assets/images/logoblack.png" width="150">
            <h2 align="center">Liste De Vos Voitures À Louer</h2>
            <h4>Liste De Vos Voitures À Louer</h4>
            <table border="1" cellspacing="0" cellpadding="3">  
                <tr>  
                    <th>Type de voiture</th>
                    <th>Prix</th> 
                    <th>Nombre de place</th>
                    <th>boite</th>
                    <th>carburant</th>
                </tr>  
      ';  
      $content .= $admincrudpanel->generaterent();  
    }else if($_GET['type']=='piece'){
        $pdf->SetTitle("Liste de vos pièces de rechange");  
        $content .= '
            <img src="../view/assets/images/logoblack.png" width="150">
            <h2 align="center">Liste de vos pièces de rechange</h2>
            <h4>Liste de vos pièces de rechange</h4>
            <table border="1" cellspacing="0" cellpadding="3">  
                <tr>
                    <th>Nom</th>
                    <th>Prix</th> 
                    <th>Poids</th>
                    <th>Pays</th>
                    <th>Etat</th>
                    <th>Categorie</th> 
                </tr>  
      ';  
      $content .= $admincrudpanel->generateRowPiece();  
    }










    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('Tableau Des Pieces.pdf', 'I');
?>