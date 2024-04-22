<?php
session_start();
include '../Controller/functions.php';
$admincrudpanel = new admincrudpanel();
$list ;
$total ; 
$date ;
$paye = true ;
$id_facture = "" ;
if (!isset($_GET['id_facture'])) {
    $list = $admincrudpanel->getPanierProduct();
	$listpiece = $admincrudpanel->getPanierProductPiece();
	if(count($list) == 0 && count($listpiece) == 0  ){
		header('Location: index.php');
	}
	$total = $admincrudpanel->getTotal();
	$date = date("D M d, Y G:i");
$paye = false ;
}

if (isset($_GET['id_facture'])) {
	$paye = true;
	$facture  = $admincrudpanel->getFacture($_GET['id_facture']);
    $list = $admincrudpanel->getFactureProducts($_GET['id_facture']);
	$listpiece = $admincrudpanel->getFactureProductsPiece($_GET['id_facture']);


	$total = $admincrudpanel->getTotalFacture($_GET['id_facture']);
	$date = $facture['date_creation'];
	$id_facture = $facture['id'];
}

if (isset($_GET['paye'])) {
	$admincrudpanel->createFacture();
 }


?>
<head>
    
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}

		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
    </style>

</head>
<div class="col-md-12">   
 <div class="row" id="box1">
 <a href="javascript:genScreenshot()"><button style="background:aqua; cursor:pointer" id="telecharger">Télécharger</button> </a>
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" id="capture" style="margin-left: 26%">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">

							<?php 
								$mysite = $admincrudpanel->getFullName();
								foreach ($mysite as $me) {
							?>


						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="assets/images/logoblack.png" style="width: 91px; border-radius: 43px;" >
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">


							<h5><?php echo($me['sitename']);?></h5>
							<p><?php echo($me['phonenumber']);?><i class="fa fa-phone"></i></p>
							<p><?php echo($me['email']);?> <i class="fa fa-envelope-o"></i></p>
							<p><?php echo($me['address']);?> <i class="fa fa-location-arrow"></i></p>
						<?php }?>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							
							<?php 
								$liste = $admincrudpanel->getmydetails($_SESSION['smartCookies']);
								foreach ($liste as $myinfo) {
							?>
							<h5><?php echo($myinfo['nom']." ".$myinfo['prenom']);?>  </h5>
						
							<p><b>Email :</b> <?php echo($myinfo['email']);?> </p>
						<?php } ?>
						
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h3>Facture # <?= $id_facture; ?></h3>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach ($list as $panierItem): ?>
                        <tr>
                            <td class="col-md-9"> <strong> <?= $panierItem->marque; ?> / <?= $panierItem->model; ?> </strong></td>
                            <td class="col-md-3"> <strong> <?= number_format($panierItem->prix); ?>DT </strong></td>
                        </tr>
                        <?php endforeach ?>

						<?php foreach ($listpiece as $panierpiece): ?>
                        <tr>
                            <td class="col-md-9"> <strong> <?= $panierpiece->nompiece; ?>  </strong></td>
                            <td class="col-md-3"> <strong> <?= number_format($panierpiece->prixpiece); ?>DT </strong></td>
                        </tr>
                        <?php endforeach ?>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Prix Total DT:  </strong>
                            </p>
                            <p>
                                <strong>Tax / TVA: </strong>
                            </p>
							
							</td>
                            <td>
                            <p>
                                <strong> <?=  number_format($total,3); ?> DT</strong>
                            </p>
                            <p>
                                <strong></i> 19% </strong>
                            </p>
					
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong></i><?=  number_format($total + $total*0.19,3); ?> DT</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?= $date; ?> </p>
							<h5 style="color: rgb(140, 140, 140);">Merci pour votre commande.!</h5>
							<?php if(!$paye) : ?>
							<a href="facture.php?paye=ok" class="btn btn-primary" style="margin-left: 118%;"> Payer </a>
							<?php endif ; ?>
						</div>
						<div class="">
						<input  id="historique" class="btn btn-success" type="button" onclick="location.href='historique_des_commandes.php';" style=" margin-left: 54%;" value="Historique des achats" />
					
						</div>
					</div>
        
				</div>
            </div>
			
        </div>    
	</div>
</div>


<script>
function genScreenshot() {
	$('#capture').css('margin-left','5%');
	$('#telecharger').css('display','none');
	$('#historique').css('display','none');
	
    html2canvas(document.body, {
      onrendered: function(canvas) {
	
      $('#box1').html("");
			$('#box1').append(canvas);
      
      if (navigator.userAgent.indexOf("MSIE ") > 0 || 
					navigator.userAgent.match(/Trident.*rv\:11\./)) 
			{
      	var blob = canvas.msToBlob();

        window.navigator.msSaveBlob(blob,'Test file.png');
        
      }
      else   {
        $('#capture').css('margin-left','26%');
        $('#test').attr('href', canvas.toDataURL("image/png"));
        doc = new jsPDF({
                     unit: 'px',
                     format: 'a3'
                 });
                doc.addImage(canvas.toDataURL("image/png"), 'JPEG', 0, 0);
                doc.save('ExportFile.pdf');
   
				location.reload();
         }
		
      }
    });
}
</script>
