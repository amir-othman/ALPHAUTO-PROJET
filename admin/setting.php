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
$updatemydata='';
$resultupdateadmin='';
$resultupdateadminpassword='';
if(isset($_POST['updatedetails'])){
        $ch = $admincrudpanel->updatesitedetails($_POST['sitename'],$_POST['siteemail'],$_POST['sitephone'],$_POST['siteaddress'],$_POST['sitefacebook'],$_POST['siteinsta'],$_POST['siteyoutube'],'1');
        if($ch=='OK!'){
            $updatemydata='<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Succès</span>Vous avez réussi à mettre à jour les détails.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
        }else{
            $updatemydata='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Error While updating your site name<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
        }
}
if(isset($_POST['updateadmindata'])){
        $ch = $admincrudpanel->updateadmindetails($_POST['myfirstname'],$_POST['mylastname'],$_POST['myemail']);
        if($ch=='OK!'){
            $resultupdateadmin='<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Succès</span>Vous avez réussi à mettre à jour les détails.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
        }else{
            $resultupdateadmin='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Error</span>erreur lors de la mise à jour du nom de votre site<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
        }
}
if(isset($_POST['updatipassword'])){
        $ch = $admincrudpanel->resultupdateadminpassword($_POST['currentpassword'],$_POST['newpassword'],$_SESSION['smartCookies']);
        if($ch=='NO!'){
            $resultupdateadminpassword='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Error</span>Wrong Current Password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
        }
        else if($ch=='OK!'){
            $resultupdateadminpassword='<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Succès</span>Vous avez réussi à mettre à jour les détails.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
        }else{
            $resultupdateadminpassword='<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Error</span>Erreur lors de la mise à jour du mot de passe<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
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
    <title><?php echo($ta3b['sitename']);?> - Réglages</title>

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
                        <li >
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

            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Update Site Details</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Site Details</h3>
                                        </div>
                                        <hr>
                                        <form id="form1" action="" method="post">
                                            <div id="erreur"><?php echo($updatemydata);?></div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                                <input id="sitename" name="sitename" type="text" class="form-control" value="<?php echo($ta3b['sitename']);?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Logo</label><br><center>
                                                <img src="<?php echo("../view/assets/images/logoblack.png");?>" width="220px;"><br></center>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Email</label>
                                                        <input id="siteemail" name="siteemail" type="text" class="form-control cc-number identified visa" value="<?php echo($ta3b['email']);?>" >
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Phone number</label>
                                                    <div class="input-group">
                                                        <input id="sitephone" name="sitephone" type="text" class="form-control cc-number identified visa" value="<?php echo($ta3b['phonenumber']);?>" >

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">address</label>
                                                <input id="siteaddress" name="siteaddress" type="text" class="form-control cc-number identified visa" value="<?php echo($ta3b['address']);?>" >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Facebook</label>
                                                <input id="sitefacebook" name="sitefacebook" type="text" class="form-control cc-number identified visa" value="<?php echo($ta3b['fb']);?>" >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Instagram</label>
                                                <input id="siteinsta" name="siteinsta" type="text" class="form-control cc-number identified visa" value="<?php echo($ta3b['insta']);?>" >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Youtube</label>
                                                <input id="siteyoutube" name="siteyoutube" type="text" class="form-control cc-number identified visa" value="<?php echo($ta3b['yt']);?>" >
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button type="submit" style="display:none;" id="updatedetails" name="updatedetails">JA</button>

                                                <button  type="button" onclick="verifisitedetails()" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                </button>
                                            </div>
                                        </form>

                        <script>
                            function verifisitedetails(){
                                var sitename = document.getElementById("sitename").value;
                                var siteemail = document.getElementById("siteemail").value;
                                var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                                var sitephone = document.getElementById("sitephone").value;
                                var siteaddress = document.getElementById("siteaddress").value;
                                var sitefacebook = document.getElementById("sitefacebook").value;
                                var siteinsta = document.getElementById("siteinsta").value;
                                var siteyoutube = document.getElementById("siteyoutube").value;
                                if(sitename.length<1){
                                    document.getElementById("erreur").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Site Name Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    return false;
                                }
                                if(!siteemail.match(validRegex)) {
                                    document.getElementById("erreur").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Email Site Should be valid<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    return false;
                                }
                                if(sitephone.length<1){
                                    document.getElementById("erreur").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Phone number Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    return false;
                                }
                                if(siteaddress.length<1){
                                    document.getElementById("erreur").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Site address Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    return false;
                                }
                                if(sitefacebook.length<1){
                                    document.getElementById("erreur").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Site Facebook link Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    return false;
                                }
                                if(siteinsta.length<1){
                                    document.getElementById("erreur").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Site insta link Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    return false;
                                }
                                if(siteyoutube.length<1){
                                    document.getElementById("erreur").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Site youtbe link Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    return false;
                                }
                                document.getElementById("updatedetails").click();
                            }
                        </script>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Admin</strong>
                                        <small> Details</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <?php 
                                            $details = $admincrudpanel->getdetails($_SESSION['smartCookies']);
                                            foreach ($details as $tav3b) {
                                        ?>
                                        <form id="form2" method="post" action="">
                                            <div id="erreur2"><?php echo($resultupdateadmin);?></div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">First Name</label>
                                            <input type="text" id="myfirstname" name="myfirstname" placeholder="Enter first name" value="<?php echo($tav3b['nom']);?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Last Name</label>
                                            <input type="text" id="mylastname" name="mylastname" placeholder="Enter your name" value="<?php echo($tav3b['prenom']);?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Email</label>
                                            <input type="text" id="myemail" name="myemail" readonly="readonly" placeholder="Email" value="<?php echo($tav3b['email']);?>" class="form-control">
                                        </div>
                                            <div>
                                                <button id="updateadmindata" name="updateadmindata" type="submit" class="btn btn-lg btn-info btn-block" style="display:none;"></button>

                                                <button type="button" onclick="verifiadmindetails()" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                </button>
                                            </div>
                                        </form>
                                        <?php } ?>
<script type="text/javascript">
    function verifiadmindetails(){
        var myfirstname = document.getElementById("myfirstname").value;
        var mylastname = document.getElementById("mylastname").value;
        if(myfirstname.length<1){
            document.getElementById("erreur2").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>First Name Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }
        if(mylastname.length<1){
            document.getElementById("erreur2").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Last Name Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }
        document.getElementById("updateadmindata").click();
    }
</script>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Password</strong> Details
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="form3" action="" method="post" class="form-horizontal">
                                            <div id="erreur3"><?php echo($resultupdateadminpassword);?></div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="currentpassword" name="currentpassword" placeholder="Enter the current Password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">New Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="newpassword" name="newpassword" placeholder="Enter the new Password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Confirm Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm your new Password..." class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="updatipassword" name="updatipassword" style="display:none;">JA</button>

                                        <button type="button" onclick="verifiadminpsw()" class="btn btn-lg btn-info btn-block"><i class="fa fa-save"></i>&nbsp;<span id="payment-button-amount">Update</span></button>



                                    </div>
                                        </form>


<script type="text/javascript">
    function verifiadminpsw(){
        var currentpassword = document.getElementById("currentpassword").value;
        var newpassword = document.getElementById("newpassword").value;
        var confirmpassword = document.getElementById("confirmpassword").value;
        if(currentpassword.length<1){
            document.getElementById("erreur3").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>Current Password Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }
        if(newpassword.length<1){
            document.getElementById("erreur3").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>New password Should not be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }
        if(newpassword!=confirmpassword){
            document.getElementById("erreur3").innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">Failed</span>The confirmation password is not the same<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
            return false;
        }
        document.getElementById("updatipassword").click();
    }
</script>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    
                                    <p>Copyright © <script>document.write(new Date().getFullYear());</script> <a href="https://esprit.tn/" title="ESPRIT" target="_blank">ESPRIT</a>. Tous les droits sont réservés.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#form1").on("keydown", function(event){
                if(event.key == "Enter"){
                    verifisitedetails();
                }
                return event.key != "Enter";
            });

            $("#form2").on("keydown", function(event){
                if(event.key == "Enter"){
                    verifiadmindetails();
                }
                return event.key != "Enter";
            });

            $("#form3").on("keydown", function(event){
                if(event.key == "Enter"){
                    verifiadminpsw();
                }
                return event.key != "Enter";
            });

        });
    </script>

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
