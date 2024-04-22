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
if(isset($_POST['logout'])){
        $admincrudpanel->logout();
}
if(!isset($_GET['id'])){
	header("Location: carslist.php");
}
if($admincrudpanel->carexistS($_GET['id'])=='LEE!'){
	header("Location: carslist.php");
}
$marto='';
if(isset($_POST['submit'])){
    if(@copy($_FILES['imgpath']['tmp_name'],$_FILES['imgpath']['name'])){
        rename($_FILES['imgpath']['name'], '../view/uploads/'.$_FILES['imgpath']['name']);
    }else{
        die('<b>Failed Upload !!!</b><br><br>');
    }
    $picupload = "uploads/".$_FILES['imgpath']['name'];
    if($_POST['clima']=='Oui'){$_POST['clima']=1;}
    else{$_POST['clima']=0;}
    $ok=$admincrudpanel->upditem($picupload,$_POST['brand'],$_POST['modele'],$_POST['prix'],$_POST['reviews'],$_POST['nbp'],$_POST['clima'],$_POST['vitesse'],$_POST['carburant'],$_POST['catego'],$_GET['id']);
    if($ok=="OK!"){
        $marto='<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Succès</span>Vous avez réussi à mettre à jour les détails de la voiture.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
    }
}
$liste = $admincrudpanel->getFullName();
foreach ($liste as $ta3b) {
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?php echo($ta3b['sitename']);?> - Mettre à jour les détails de la voiture</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="../view/assets/images/logoblack.png" style="max-width: 60%;" alt="" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <!---------------------------------------->
                        <li >
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Tableau de bord</a>
                        </li>
                        <li>
                            <a href="carslist.php">
                                <i class="fas fa-list-ul"></i>Lrs voitures à vendre</a>
                        </li>
                        <li>
                            <a href="carslistr.php">
                                <i class="fas fa-list-ul"></i>Les voitures à louer</a>
                        </li>
                        <li>
                            <a href="piecelist.php">
                                <i class="fas fa-list-ul"></i>Les Piece De Rechange</a>
                        </li>
                        <li>
                            <a href="categories.php">
                                <i class="fas fa-plus-circle"></i>Catégories (voitures)</a>
                        </li>
                        <li>
                            <a href="categoriesp.php">
                                <i class="fas fa-plus-circle"></i>Catégories (Pièce)</a>
                        </li>
                        <li>
                            <a href="commande.php">
                                <i class="fas fa-shopping-cart"></i>Commandes</a>
                        </li>
                        <li>
                            <a href="commandel.php">
                               <i class="fas fa-shopping-cart"></i>Commandes location</a>
                        </li>
                        <li>
                            <a href="blogslist.php">
                               <i class="fas fa-list-alt"></i>BLOGS LIST</a>
                        </li>
                        <li>
                            <a href="comments.php">
                               <i class="fas fa-comment"></i>Commentaires</a>
                        </li>
                        <li>
                            <a href="feedbacks.php">
                               <i class="fas  fa-envelope"></i>Messages</a>
                        </li>
                        <!---------------------------------------->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="../view/assets/images/logoblack.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <!---------------------------------------->
                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Tableau de bord</a>
                        </li>
                        <li>
                            <a href="carslist.php">
                                <i class="fas fa-list-ul"></i>Les voitures à vendre</a>
                        </li>
                        <li>
                            <a href="carslistr.php">
                                <i class="fas fa-list-ul"></i>Les voitures à louer</a>
                        </li>
                        <li>
                            <a href="piecelist.php">
                                <i class="fas fa-list-ul"></i>Les Piece De Rechange</a>
                        </li>
                        <li>
                            <a href="categories.php">
                                <i class="fas fa-plus-circle"></i>Catégories (voitures)</a>
                        </li>
                        <li>
                            <a href="categoriesp.php">
                                <i class="fas fa-plus-circle"></i>Catégories (Pièce)</a>
                        </li>
                        <li>
                            <a href="commande.php">
                               <i class="fas fa-shopping-cart"></i>Commandes</a>
                        </li>
                        <li>
                            <a href="commandel.php">
                               <i class="fas  fa-location-arrow"></i>Commandes location</a>
                        </li>
                        <li>
                            <a href="blogslist.php">
                               <i class="fas fa-list-alt"></i>Liste des blogs</a>
                        </li>
                        <li>
                            <a href="comments.php">
                               <i class="fas fa-comment"></i>Commentaires</a>
                        </li>
                        <li>
                            <a href="feedbacks.php">
                               <i class="fas  fa-envelope"></i>Messages</a>
                        </li>
                        <!---------------------------------------->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST"></form>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../view/assets/images/img_avatar.png" />
                                        </div>
                                        <?php 
                                            $details = $admincrudpanel->getdetails($_SESSION['smartCookies']);
                                            foreach ($details as $tav3b) {
                                        ?>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo($tav3b['nom']." ".$tav3b['prenom']);?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../view/assets/images/img_avatar.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo($tav3b['nom']." ".$tav3b['prenom']);?></a>
                                                    </h5>
                                                    <span class="email"><?php echo($tav3b['email']);?></span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="setting.php">
                                                        <i class="zmdi zmdi-settings"></i>Réglages</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <form method="post" action="">
                                                    <button name="logout" id="logout" type="submit" style="display:none;">Se déconnecter</button>
                                                    <a href="#" onclick="document.getElementById('logout').click();"><i class="zmdi zmdi-power"></i>Se déconnecter</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Mettre à jour les détails de la voiture</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="form1" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div id="error"><?php echo($marto);?></div>
                                            <input type="text" value="10" name="reviews" style="display: none;">
                                            <?php 
                                            	$l = $admincrudpanel->getexactcar($_GET['id']);
                                            	foreach ($l as $singcar) {
                                            ?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Marque</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                	<input type="text" name="brand" id="brand" placeholder="Text" value="<?php echo($singcar['marque']);?>" readonly="readonly" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Modèle</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="Modele" value="<?php echo($singcar['model']);?>" readonly="readonly" name="modele" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">catégorie</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="catego" id="catego" class="form-control">
                                                        <option value ="0" selected>Please select</option>
                                                        <?php 
                                                            $liste = $admincrudpanel->getalllist0();
                                                            foreach ($liste as $row) {
                                                                $uu = $row['id'];
                                                                $xx = $row['lista'];
                                                            	if($row['id']==$singcar['id_c']){
                                                                	echo('<option value ="'.$uu.'" selected="">'.$xx.'</option>');
                                                            	}else{
                                                            		echo('<option value ="'.$uu.'">'.$xx.'</option>');
                                                            	}
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Ajouter une image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                	<?php 
                                                		list($width, $height, $type, $attr) = getimagesize("../view/".$singcar['img']);
                                                		echo('<div class="form-group" style="width: '.strval($width).'px;height:'.strval($height-360).'px;">');
                                                		echo('<img class="form-control" id="file-ip-1-preview" src="../view/'.strval($singcar['img']).'" style="width: 42%;height: '.strval($height-400).'px;" ><br>');
                                                		echo('<input class="form-control" style="display: none;" id="fileipload" name="imgpath" type="file" placeholder="IMG PATH" onchange="showPreview(event);">');
                                                		echo('<input class="form-control" type="button" class="btn btn-xs btn-warning" value="Ajouter une image" onclick="func();">');
                                                		echo('</div>');
                                                	?>                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nombre de places </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nbp" value="<?php echo($singcar['nb_place']);?>" name="nbp" placeholder="Text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Boîte de vitesse</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="vitesse" id="vitesse" class="form-control">
                                                        <option value ="0" selected>Veuillez sélectionner</option>
                                                        <?php 
                                                        	if($singcar['boite']=='automatique'){
                                                        ?>
                                                        	<option value ="automatique" selected>Automatique</option>
                                                       	 	<option value ="manuelle">manuelle</option>
                                                        <?php
                                                        	}else{
                                                        ?>
                                                        	<option value ="automatique">Automatique</option>
                                                       	 	<option value ="manuelle" selected>manuelle</option>
                                                       	<?php
                                                        	}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Climatisée</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="clima" id="vehicle1" class="form-control">
                                                        <option value ="0" selected>Veuillez sélectionner</option>
                                                        <?php 
                                                        	if($singcar['ac']=='0'){
                                                        ?>
                                                        	<option value ="Oui">Oui</option>
                                                        	<option value ="No" selected>No</option>
                                                        <?php
                                                        	}else{
                                                        ?>
                                                        	<option value ="Oui" selected>Oui</option>
                                                        	<option value ="No" >No</option>
                                                       	<?php
                                                        	}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Carburant</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select  name="carburant" id="carburant" class="form-control">
                                                        <option value ="0" selected>Veuillez sélectionner</option>
                                                        <?php 
                                                        	if($singcar['carburant']=='Eccence'){
                                                        ?>
                                                        	<option selected value ="Eccence">Eccence</option>
                                                        	<option value ="Mazot">Mazot</option>
                                                        <?php
                                                        	}else{
                                                        ?>
                                                        	<option value ="Eccence">Eccence</option>
                                                        	<option selected value ="Mazot">Mazot</option>
                                                       	<?php
                                                        	}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Prix</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="prix" name="prix" value="<?php echo($singcar['prix']);?>" placeholder="prix" class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" id="submitx" style="display:none;">Save Record</button>
                                        <button type="button" onclick="checkvari();" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Enregistrer</button>
                                        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Réinitialiser</button>
                                    </div>
                                        </form>
                                </div>

<?php }?>
                            
                            
                         
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>   
<script type="text/javascript">
        $(document).ready(function () {
            $("#form1").on("keydown", function(event){
                if(event.key == "Enter"){
                    checkvari();
                }
                return event.key != "Enter";
            });

        });
    function checkvari(){
        var brand = document.getElementById("brand").value;
        var modelc = document.getElementById("Modele").value;
        var catego = document.getElementById("catego").value;
        var file = document.getElementById("fileipload");
        var nbp = document.getElementById("nbp").value;
        var vitesse = document.getElementById("vitesse").value;
        var vehicle1 = document.getElementById("vehicle1").value;
        var carburant = document.getElementById("carburant").value;
        var prix = document.getElementById("prix").value;
        if(brand=="0"){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez sélectionner la marque<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(modelc.length<1){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez écrire le modèle<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(catego=="0"){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez sélectionner la catégorie<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(file.files.length == 0 ){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez re-télécharger une image<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(nbp.length<1){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez écrire les numéros de place de votre voiture<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(vitesse=="0"){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez sélectionner la type de votre boîte de vitesses<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(vehicle1=="0"){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez sélectionner un véhicule<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(carburant=="0"){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>veuillez sélectionner le carburant<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else if(prix.length<1){
            document.getElementById("error").innerHTML='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Erreur</span>Veuillez écrire le prix<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }else{
            document.getElementById("submitx").click();
        }
    }
    function showPreview(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
    function func(){
        document.getElementById("fileipload").click();
    }

</script>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright"><p>Copyright © <script>document.write(new Date().getFullYear());</script> <a href="https://esprit.tn/" title="ESPRIT" target="_blank">ESPRIT</a>. Tous les droits sont réservés.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->

<?php 


}
    ?>  