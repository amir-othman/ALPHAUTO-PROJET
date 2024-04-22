<?php 
session_start();
ini_set('memory_limit', '16M');
include '../Controller/functions.php';
$wrong='';
$dispo='';
$upd='';
$sajelni='';
$resarva='';
$admincrudpanel = new admincrudpanel();
if(isset($_SESSION['smartCookies'])){
    if($admincrudpanel->askforadmin($_SESSION['smartCookies'])=='oui'){
        header("Location: ../admin/");
    }
}
if(!isset($_GET['id'])){
    $_GET['id']=1;
}
$liste = $admincrudpanel->getFullName();
foreach ($liste as $ta3b) {
    $sitename=$ta3b['sitename'];
    $sitelog=$ta3b['logo'];
    $sitefb=$ta3b['fb'];
    $siteinsta=$ta3b['insta'];
    $siteyt=$ta3b['yt'];
    $sitephonenumber=$ta3b['phonenumber'];
    $siteemail=$ta3b['email'];
    $siteaddress=$ta3b['address'];
}
    if(isset($_POST['logout'])){
        $admincrudpanel->logout();
    }
    if(isset($_POST['updatepassword'])){
        $ch = $admincrudpanel->updatepassword($_SESSION['smartCookies'],$_POST['currentpassword'],$_POST['newpassword']);
        if($ch=='WRONGPASSWORD'){
            $upd='<center><b><font style="color:red;">Mot de pase actuel incorrect<br><br></font></b></center>';
        }else{
            $upd='<center><b><font style="color:green;">Le mot de passe a été changé avec succès<br><br></font></b></center>';
        }
    }
    if(isset($_POST['loginn'])){
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LeooTsjAAAAABYACcUYvi101pb_rSSDyojXcNo_&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            $ch = $admincrudpanel->login($_POST['email'],$_POST['password']);
            if($ch=='0'){
                $wrong='Mauvais e-mail ou mot de passe<br><br>';
            }else if($ch=='1'){
                $wrong='votre compte est verrouillé, si vous souhaitez déverrouiller votre compte, vous devrez vérifier votre adresse e-mail<br><br>';
            }else{
                $_SESSION['smartCookies']=$_POST['email'];
                if($ch=='oui'){
                    header("Location: ../admin/");
                }
            }
        }else{
           $wrong='Mauvais Catpcha<br><br>';
        }
    }
    if(isset($_POST['reset'])){
        $ch = $admincrudpanel->reset($_POST['email']);
        if($ch=="INVALIDEMAIL"){
            $dispo='<center><b><font style="color:red;">Adresse e-mail invalide<br><br></font></b></center>';
        }else{
            $dispo='<center><b><font style="color:green;">Merci, veuillez vérifier votre e-mail<br><br></font></b></center>';
        }
    }
    if(isset($_POST['sub'])){
        $ch = $admincrudpanel->signup($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password'],$_POST['phone'],$admincrudpanel->getRealIpAddr());
        if($ch=="DONE"){
            $sajelni='<center><b><font style="color:green;">Merci, vous pouvez vous connecter maintenant<br><br></font></b></center>';
        }else if($ch=="ALREADY"){
            $sajelni='<center><b><font style="color:red;">L\'e-mail existe déjà<br><br></font></b></center>';
        }else if($ch=="ALREADYP"){
            $sajelni='<center><b><font style="color:red;">Le numéro de téléphone existe déjà<br><br></font></b></center>';
        }
    }
    if (isset($_POST['reserv'])) {
        $ch = $admincrudpanel->addReserv($_GET['id_vehicule'],$_POST['fulldetails'], $_POST['phonenumer'], $_POST['emailx'], $_POST['debut'], $_POST['fin'], $_POST['totalprix']);
        if ($ch == "OK") {
            $resarva = '<center><b><font style="color:green;">nous vous enverrons les détails lorsque votre voiture sera prête pour le ramassage<br><br></font></b></center><br><br>';
        }
  }
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <title><?php echo($sitename);?></title>
    <link rel="icon" href="<?php echo($sitelog);?>" type="image/gif" sizes="16x16">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- FavIcon Link -->

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oxanium:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- Datepicker CSS Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.min.css">

    <!-- Swiper Slider CSS Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/swiper-bundle.min.css">

    <!-- Fancybox CSS Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

	<!-- Wow Animation CSS Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">

	<!-- Main Style CSS Link -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

</head>
<body class="fixed">
<div class="main">

    <!-- Loader Start -->
    <div class="loader-box">
        <div class="loader">
            <img src="assets/images/loader.gif" width="300" height="300" alt="Car">
        </div>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="site-brnading">
                        <a href="index.php" title="<?php echo($sitename);?>">
                            <img src="assets/images/logoblack.png" width="188" height="60" alt="<?php echo($sitename);?>">
                            <img src="assets/images/logoblack.png" class="sticky" width="188" height="60" alt="<?php echo($sitename);?>">
                        </a>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="header-menu">
                        <nav class="main-navigation">
                            <button class="toggle-button"><span></span></button>
                            <div class="mobile-menu-box">
                                <i class="menu-background top"></i>
                                <i class="menu-background middle"></i>
                                <i class="menu-background bottom"></i>
                                <ul>
                                    <li><a href="index.php" title="Home">Accueil</a></li>
                                    <li><a href="about-us.php" title="About Us">À propos de nous</a></li>
                                    <li class="sub-items">
                                        <a href="javascript:void(0);" title="Cars">Notre service</a>
                                        <ul class="sub-menu">
                                            <li  class="active"><a href="listcarstorent.php" title="Car List">Louer une voiture</a></li>
                                            <li><a href="listcarstosell.php" title="Car Detail">Acheter une voiture</a></li>
                                            <li><a href="spares-list.php" title="Piece de rechange">Piece de rechange</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog-list.php" title="Blog List">Blogs</a></li>
                                    <li><a href="contact.php" title="Contact">contact</a></li>
                                </ul>
                                <div class="header-search-login">
                                    <div class="header-login">
                                        <a style="height: 45px;width: 41px;" href="panier.php">
                                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                        </a>&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="header-login">
                                    <?php
    if (!isset($_SESSION['smartCookies'])) {
        echo ('<a href="javascript:void(0);" id="mylogin" data-bs-toggle="modal" data-bs-target="#login" title="Login"><i class="far fa-user"></i></a>');
    } else {
                                    ?>
                                        <a href="javascript:void(0);"data-bs-toggle="modal" data-bs-target="#mydashboard" title="mydashboard"><img src="assets/images/img_avatar.png" style="border-radius: 50%;"></a>
                                    <?php
    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="for-mob">
                                <div class="header-login">
                                    <div class="header-login">
                                        <a href="panier.php">
                                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                        </a>&nbsp;&nbsp;&nbsp;
                                    <?php
    if (!isset($_SESSION['smartCookies'])) {
        echo ('<a href="javascript:void(0);" id="mylogin" data-bs-toggle="modal" data-bs-target="#login" title="Login"><i class="far fa-user"></i></a>');
    } else {
                                    ?>
                                        <a href="javascript:void(0);"data-bs-toggle="modal" data-bs-target="#mydashboard" title="mydashboard"><img src="assets/images/img_avatar.png" style="border-radius: 30%;height: 30px;"></a>
                                    <?php
    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Banner Start -->
    <section class="main-banner inner-banner back-img" style="background-image: url('assets/images/cars-banner.jpg');">
        <span class="shape"><img src="assets/images/inner-banner-shape.svg" alt="shape"></span>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h1 class="h1-title wow fadeup-animation" data-wow-duration="0.8s">Détails de la voiture</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-breadcrumb">
            <div class="breadcrumb-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <p><a href="index.html" title="Home">Acueil</a></p>
                <span><i class="fas fa-angle-double-right"></i></span>
                <p><a href="cars.html" title="Cars">Voitures</a></p>
                <span><i class="fas fa-angle-double-right"></i></span>
                <p>Détails de la voiture</p>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Car Detail Start -->
    <section class="main-car-detail">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="interior-exterior-tabbing wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <?php
                            $allpiece = $admincrudpanel->getexactcarlouer($_GET['id_vehicule']);
                            foreach ($allpiece as $singlepiece) {
                                if ($singlepiece['ac'] == "1") {
                                    $rep="Oui";
                                }else{
                                    $rep="Non";
                                }
                        ?>
                        <div class="tab-content wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <div class="tab-pane active" id="car_images">
                                <div class="interior-exterior-content">
                                    <div class="interior-exterior-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="<?php echo($singlepiece['img']);?>" data-fancybox="image">
                                                    <div class="interior-exterior-slide-img back-img" style="background-image: url(<?php echo($singlepiece['img']);?>);"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="car-detail-content wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h2 class="h2-title"><?php echo ($singlepiece['marque'] . ' ' . $singlepiece['model']); ?></h2>
                        <h3 class="h3-title">TND <?php echo($singlepiece['prix']);?><span>/ Jour</span></h3>
                        <div class="car-detail-rating">
                            <p>(<?php echo ($singlepiece['reviews']); ?> Reviews)</p>
                            <ul>
                                <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                            </ul>
                        </div>
                        <div class="car-detail-text">
                                <p>C'est la <?php echo($singlepiece['marque'].' '.$singlepiece['model']);?> , c'est une voiture puissante qui côtoie TND<?php echo($singlepiece['prix']);?> /Jour, cette voiture est une très bonne voiture avec <?php echo($singlepiece['nb_place']);?> places c'est une voiture climatisée avec boîte de vitesses <?php echo($singlepiece['boite']);?> et vous pouvez sentir la puissance de <?php echo($singlepiece['carburant']);?> vous pouvez consulter les <?php echo($singlepiece['reviews']);?> avis si vous veux plus de conseils</p>
                        </div>
                        <div class="car-detail-features">
                            <ul>
                                <li><span>nombre de places :</span> <?php echo ($singlepiece['nb_place']); ?></li>
                                            <li><span>climatiseur :</span> <?php echo($rep)?></li>

                                <li><span>boite :</span> <?php echo ($singlepiece['boite']); ?></li>
                                <li><span>Des portes :</span> 4</li>
                                <li><span>Type de carburant :</span> <?php echo ($singlepiece['carburant']); ?></li>
                            </ul>
                        </div>
                    <?php }
                    ?>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="book-car-box wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <p id="errur"></p>
                        <?php echo ($resarva); ?>
                        <form id="form5" method="POSt" action="">
                            <div class="book-car-form">
                                <div class="car-form-box">
                                    <div class="form-box">
                                        <label>Nom et prénom</label>
                                        <div class="form-input-box" onclick="switchback();">
                                            <img src="assets/images/form-user-icon.svg" width="12" height="14" alt="User">
                                            <input type="text" class="form-input" id="fulldetails" name="fulldetails" placeholder="John Doe">
                                        </div>
                                    </div>
                                </div>
                                <div class="car-form-box">
                                    <div class="form-box">
                                        <label>Adresse e-mail</label>
                                        <div class="form-input-box" onclick="switchback();">
                                            <img src="assets/images/form-mail-icon.svg" width="12" height="8" alt="Mail">
                                            <input type="text" id="emailx" name="emailx" class="form-input" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="car-form-box">
                                    <div class="form-box">
                                        <label>Phone number</label>
                                        <div class="form-input-box" onclick="switchback();">
                                            <input type="text" id="phonenumer" name="phonenumer" class="form-input" placeholder="Phone number">
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if(isset($_SESSION['smartCookies'])){
                                        $details = $admincrudpanel->getdetails($_SESSION['smartCookies']);
                                        foreach ($details as $taeb) {
                                            echo(" <script>document.getElementById('fulldetails').setAttribute('readonly', 'readonly');document.getElementById('emailx').setAttribute('readonly', 'readonly');document.getElementById('phonenumer').setAttribute('readonly', 'readonly');document.getElementById('fulldetails').value='".$taeb['nom']."';document.getElementById('emailx').value='".$taeb['email']."';document.getElementById('phonenumer').value='".$taeb['phonenumber']."';</script>");
                                        }
                                    }
                                ?>
                                <div class="car-form-box">
                                    <div class="form-box">
                                        <label>Date de ramassage</label>
                                        <div class="form-input-box input-group date" onclick="switchback();">
                                            <img src="assets/images/form-calendar-icon.svg" width="14" height="14" alt="Calendar">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-input" id="debut" name="debut">
                                        </div>
                                    </div>
                                </div>
                                <div class="car-form-box">
                                    <div class="form-box">
                                        <label>Date de retour</label>
                                        <div class="form-input-box input-group date" onclick="switchback();">
                                            <img src="assets/images/form-calendar-icon.svg" width="14" height="14" alt="Calendar">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-input" name="fin" id="fin">
                                        </div>
                                    </div>
                                </div>
                                <div class="car-form-box">
                                    <div class="form-box">
                                        <label>Prix</label>
                                        <div class="form-input-box">
                                            <input readonly="readonly" type="text" id="totalprix" name="totalprix" class="form-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="car-form-box">
                                        <button type="submit" id="reserv" name="reserv" style="display:none;">W</button>
                                    <div class="form-box" id="changerbutton">
                                        <button type="button" onclick="bf();" class="sec-btn"><span>vérifier si le voiture est disponible</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<script type="text/javascript">
    function bf(){
        var nox=document.getElementById("fulldetails").value;
        var emailadd = document.getElementById("emailx").value;
        var phonenumer= document.getElementById("phonenumer").value;
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var debut_locate=document.getElementById("debut").value;
        var fin_locate=document.getElementById("fin").value;
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var today = dd + '/' + mm + '/' + yyyy;
        if(nox.length<1){
            document.getElementById("errur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur !</strong> Le nom ne doit pas être vide .</div>';
            return false;
        }
        else if(phonenumer.length<1){
            document.getElementById("errur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur !</strong> Le numero de telephone ne doit pas être vide .</div>';
            return false;
        }
        else if((!emailadd.match(validRegex))||(emailadd.length<1)) {
            document.getElementById("errur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur!</strong> Veuillez saisir une adresse e-mail valide.</div>';
            return false;
        }
        else if(fin_locate==today){
            document.getElementById("errur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur !</strong> Le date ne doit pas être vide .</div>';
            return false;
        }
        else{
            function datediff(first, second) {        
                return Math.round((second - first) / (1000 * 60 * 60 * 24));
            }
            function parseDate(str) {
                var mdy = str.split('/');
                return new Date(mdy[2], mdy[0] - 1, mdy[1]);
            }
            document.getElementById("totalprix").value = datediff(parseDate(debut_locate), parseDate(fin_locate))+" TND";
            document.getElementById("changerbutton").innerHTML='<button type="button" onclick="bfx();" class="sec-btn">Réserver maintenant 🤠</button>';
        }
    }
    function bfx(){
        document.getElementById("reserv").click();
    }
    function switchback(){
        if(document.getElementById("changerbutton").innerHTML!='<button type="button" onclick="bf();" class="sec-btn"><span>vérifier si le voiture est disponible</span></button>'){
            document.getElementById("changerbutton").innerHTML='<button type="button" onclick="bf();" class="sec-btn"><span>vérifier si le voiture est disponible</span></button>';
        }
    }
</script>
        </div>
    </section>
    <!-- Car Detail End -->

    <!-- Footer Start -->
    <footer class="site-footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-info wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="footer-logo">
                            <a href="index.php" title="<?php echo($sitename);?>">
                                <img src="<?php echo($sitelog);?>" width="188" height="60" alt="<?php echo($sitename);?>">
                            </a>
                        </div>
                        <p>Toute l'equipe Alpha Auto vous souhaite la bienvenue à notre site de vente , achat et location de voiture. Bon trajet à tous 😉 .</p>
                        <div class="social-icon">






                            <a href="<?php echo($sitefb);?>" title="Follow on Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="<?php echo($siteinsta);?>" title="Follow on Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="<?php echo($siteyt);?>" title="Follow on Youtube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="quick-links wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h3 class="h3-title">Liens rapides</h3>
                        <ul>
                            <li><a href="index.php" title="Home">Accueil</a></li>
                            <li><a href="about-us.php" title="About Us">À propos de nous</a></li>
                            <li><a href="blog-list.php" title="Blog">Liste des blogs</a></li>
                            <li><a href="contact.php" title="Contact">Nous contacter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="quick-links wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h3 class="h3-title">Nos services</h3>
                        <ul>
                            <li><a href="listcarstorent.php" title="Wedding Rides">Louer une voiture</a></li>
                            <li><a href="listcarstosell.php" title="Corporate Rides">Acheter une voiture</a></li>
                            <li><a href="spares-list.php" title="Piece de rechange">Pièce de rechange</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-contact wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h3 class="h3-title">Nous contacter</h3>
                        <div class="contact-link">
                            <div class="contact-link-box">
                                <a href="tel:<?php echo($sitephonenumber);?>" title="Call on <?php echo($sitephonenumber);?>">
                                    <span class="icon"><i class="fas fa-phone-alt"></i></span>
                                    Numéro de téléphone
                                    <span class="text"><?php echo($sitephonenumber);?></span>
                                </a>
                            </div>
                            <div class="contact-link-box">
                                <a href="mailto:<?php echo($siteemail);?>" title="Mail on <?php echo($siteemail);?>">
                                    <span class="icon"><i class="fas fa-envelope"></i></span>
                                    Adresse e-mail
                                    <span class="text"><?php echo($siteemail);?></span>
                                </a>
                            </div>
                            <div class="contact-link-box">
                                <a href="javascript:void(0);" title="<?php echo($siteaddress);?>">
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <span class="text"><?php echo($siteaddress);?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="copy-right">
                        <p>Copyright © <script>document.write(new Date().getFullYear());</script> <a href="https://esprit.tn/" title="ESPRIT" target="_blank">ESPRIT</a>. Tous les droits sont réservés.</p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="footer-bottom-link">
                        <ul>
                            <li><a href="javascript:void(0);" title="Privacy Policy">Politique de confidentialité</a></li>
                            <li><a href="javascript:void(0);" title="Terms Of Use">Conditions d'utilisation</a></li>
                            <li><a href="javascript:void(0);" title="Cookie Policy">Politique relative aux cookies</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Scroll To Top Start -->
    <div class="scroll-to-top">
        <span><img src="assets/images/scroll-top-car.png" alt="car"></span>
    </div>
    <!-- Scroll To Top End -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#form1").on("keydown", function(event){
                if(event.key == "Enter"){
                    shoof();
                }
                return event.key != "Enter";
            });

            $("#form2").on("keydown", function(event){
                if(event.key == "Enter"){
                    shofli7al();
                }
                return event.key != "Enter";
            });

            $("#form3").on("keydown", function(event){
                if(event.key == "Enter"){
                    updpwd();
                }
                return event.key != "Enter";
            });

            $("#form4").on("keydown", function(event){
                if(event.key == "Enter"){
                    forpassword();
                }
                return event.key != "Enter";
            });

            $("#form5").on("keydown", function(event){
                if(event.key == "Enter"){
                    bf();
                }
                return event.key != "Enter";
            });

        });
    </script>
    <!-- Login Popup Start -->
    <div class="modal fade common-popup" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-title">
                    <h3 class="h3-title">Connexion</h3>
                    <button type="button" class="close close-popup" id="myclose" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="common-popup-overflow">
                    <div class="common-popup-text">
                        <div class="contact-form">
                            <form id="form2" method="post" action="">
                                <div class="row">
                                    <center><b><font id="AllErrors" style="color:red;"><?php echo($wrong);?></font></b></center>
                                    <div class="col-12">
                                        <div class="form-box">
                                            <input type="text" name="email" id="Login_email" class="form-input" placeholder="Entrer l'adresse e-mail">
                                        </div>
                                        <div class="form-box">
                                            <input type="password" name="password" id="Login_password" class="form-input" placeholder="Entrer le mot de passe">
                                        </div>
                                        <div class="form-box checkbox">
                                            <label for="remember_pass"><input type="checkbox" id="remember_pass">Se souvenir du mot de passe</label>
                                        </div>
                                        <div class="form-box">
                                            <center><div class="g-recaptcha" data-sitekey="6LeooTsjAAAAALcHWfLbC7j5pI_5yYnZAYyeXS7P" data-callback="recaptchaCallback" id="capt" style="display:none;"></div></center>
                                            <button type="button" id="sbou3i" name="sbou3i" class="sec-btn" notmae onclick="shofli7al();"><span>Connexion</span></button>
                                            <p><button style="display: none;" type="submit" name="loginn" id="loginn" >Connexion</button></p>
                                        </div>
                                    </div>
                                <p>Mot de passe oublié ? <a href="javascript:void(0);" id="helptoreset" onclick="document.getElementById('myclose').click();" data-bs-toggle="modal" data-bs-target="#resetpassword" title="resetpassword">Cliquez ici</a></p>
                                </div>
                            </form>
                            <div class="contact-form-text">
                                <p>Vous n'avez pas de compte ?<a href="javascript:void(0);" id="signupbutton" onclick="document.getElementById('myclose').click();" data-bs-toggle="modal" data-bs-target="#signup" title="signup">Inscrivez-vous</a></p>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function shofli7al(){
                                const link = document.getElementById('sbou3i');
                                if(document.getElementById("capt").style.display=='none'){
                                    document.getElementById("AllErrors").innerHTML="<strong>Erreur!</strong> Pour des raisons de sécurité, vous devez remplir le captcha<br><br>";
                                    document.getElementById("capt").style.display="block";
                                    return false;
                                }
                                if(link.hasAttribute('notmae')){
                                    document.getElementById("AllErrors").innerHTML="<strong>Erreur!</strong> Pour des raisons de sécurité, vous devez remplir le captcha<br><br>";
                                    return false;
                                }
                                var emaillogin=document.getElementById('Login_email').value;
                                var passwordlogin=document.getElementById('Login_password').value;
                                var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                                if(!emaillogin.match(validRegex)) {
                                    document.getElementById("AllErrors").innerHTML = '<strong>Erreur!</strong> l\'e-mail ne doit pas être vide<br>';
                                    return false;
                                }else if(passwordlogin.length<1){
                                    document.getElementById("AllErrors").innerHTML = '<strong>Erreur!</strong> Le mot de passe ne doit pas être vide<br>';
                                    return false;
                                }else{
                                    document.getElementById("loginn").click();
                                }
                            }
                            function recaptchaCallback() {
                                $('#sbou3i').removeAttr('notmae');
                            };
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Popup End -->

    <!-- DASHBOARD Popup Start -->
    <div class="modal fade common-popup" id="mydashboard">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-title">
                    <h3 class="h3-title">Mon compte</h3>
                    <button type="button" class="close close-popup" id="myclose3" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="common-popup-overflow">
                    <div class="common-popup-text">
                        <div class="contact-form">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-box">
                                            <p><b>Mes Details :</b></p>
                                            <table >
                                                <?php 
                                                    $details = $admincrudpanel->getdetails($_SESSION['smartCookies']);
                                                    foreach ($details as $tav3b) {
                                                ?>
                                                    <tr>
                                                        <td><p>Avatar : </p></td>
                                                        <td><img src="assets/images/img_avatar.png" style="border-radius: 50%;height: 50px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Nom et prénom : </p></td>
                                                        <td><p><?php echo($tav3b['nom']." ".$tav3b['prenom']);?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Adresse e-mail : </p></td>
                                                        <td><p><?php echo($tav3b['email']);?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p>Numéro de téléphone : </p></td>
                                                        <td><p><?php echo($tav3b['phonenumber']);?></p></td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                            </table>
                                        </div>
                                        <div class="form-box">
                                                <button type="button" onclick="location.href='historique_des_commandes.php';" class="sec-btn"><span>Mes commandes</span></button>
                                        </div>
                                        <div class="form-box">
                                            <button type="button" data-bs-toggle="modal" onclick="document.getElementById('myclose3').click();" data-bs-target="#updatepassword" title="updatepassword" id="updatepasswoxrd" class="sec-btn"><span>Changer le mot de passe</span></button>
                                        </div>
                                        <div class="form-box">
                                            <button type="submit" name="logout" class="sec-btn"><span>Se déconnecter</span></button>
                                        </div> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DASHBOARD Popup End -->

    <!-- Update PASSWORD Popup Start -->
    <div class="modal fade common-popup" id="updatepassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-title">
                    <h3 class="h3-title">Changer le mot de passe</h3>
                    <button type="button" class="close close-popup" id="myclose4" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="common-popup-overflow">
                    <div class="common-popup-text">
                        <div class="contact-form">
                            <form id="form3" method="post" action="">
                                <div class="row">
                                    <center><b><font id="error_changepassword" style="color:red;"><?php echo($upd);?></font></b></center>
                                    <div class="col-12">
                                        <div class="form-box">
                                            <input type="password" name="currentpassword" id="Update_currentpassword" class="form-input" placeholder="Ancien mot de passe">
                                        </div>
                                        <div class="form-box">
                                            <input type="password" name="newpassword" id="Update_newpassword" class="form-input" placeholder="Nouveau mot de passe">
                                        </div>
                                        <div class="form-box">
                                            <input type="password" name="cnewpassword" id="Update_cnewpassword" class="form-input" placeholder="Confirmez le mot de passe">
                                        </div>
                                        <div class="form-box">
                                            <button type="submit" style="display:none;" id="updatepasswordx" name="updatepassword"></button>
                                            <button type="button" onclick="updpwd();" class="sec-btn"><span>Mise à jour</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <script type="text/javascript">
                    function updpwd(){
                        cp=document.getElementById("Update_currentpassword").value;
                        np=document.getElementById("Update_newpassword").value;
                        cnp=document.getElementById("Update_cnewpassword").value;
                        if(cp.length<1){
                            document.getElementById("error_changepassword").innerHTML="<strong>Erreur!</strong> Le mot de passe ne doit pas être vide<br>";
                            return false;
                        }else if(np.length<1){
                            document.getElementById("error_changepassword").innerHTML="<strong>Erreur!</strong> Le mot de passe ne doit pas être vide<br>";
                            return false;
                        }else if(cnp.length<1){
                            document.getElementById("error_changepassword").innerHTML="<strong>Erreur!</strong> La confirmation du mot de passe ne doit pas être vide<br>";
                            return false;
                        }else if(np!=cnp){
                            document.getElementById("error_changepassword").innerHTML="<strong>Erreur!</strong> Le mot de passe et le mot de passe de confirmation ne sont pas les mêmes<br>";
                            return false;
                        }else{
                            document.getElementById("updatepasswordx").click();
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <!-- Update PASSWORD Popup End -->



    <!-- FORGET PASSWORD Popup Start -->
    <div class="modal fade common-popup" id="resetpassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-title">
                    <h3 class="h3-title">Réinitialiser le mot de passe</h3>
                    <button type="button" class="close close-popup" id="myclose3" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="common-popup-overflow">
                    <div class="common-popup-text">
                        <div class="contact-form">
                            <form id="form4" method="post" action="">
                                <div class="row">
                                    <center><b><font id="error_reset" style="color:red;"><?php echo($dispo);?></font></b></center>
                                    <div class="col-12">
                                        <div class="form-box">
                                            <input type="email" name="email" id="rezemail" class="form-input" placeholder="Entrer l'adresse e-mail">
                                        </div>
                                        <div class="form-box">
                                            <button type="button" onclick="forpassword();" class="sec-btn"><span>Envoyer</span></button>
                                            <button type="submit" style="display:none;" name="reset" id="reset" class="sec-btn"><span>Envoyer</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function forpassword(){
            var emailadd = document.getElementById("rezemail").value;
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if(!emailadd.match(validRegex)) {
                document.getElementById("error_reset").innerHTML = '<strong>Erreur!</strong> l\'e-mail ne doit pas être vide<br>';
                return false;
            }else{
                document.getElementById("reset").click();
            }
        }
    </script>
    <!-- FORGET PASSWORD Popup End -->
    <!-- signup Popup Start -->
<link href="assets/css/intlTelInput.css" rel="stylesheet">
    <div class="modal fade common-popup" id="signup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-title">
                    <h3 class="h3-title">S'inscrire</h3>
                    <button type="button" class="close close-popup" id="myclose2" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="common-popup-overflow">
                    <div class="common-popup-text">
                        <div class="contact-form">
                            <form id="form1" method="post" action="">
                                <div class="row">
                                    <center><b><font id="error_signup" style="color:red;"><?php echo($sajelni);?></font></b></center>
                                    <div class="col-12">
                                        <div class="form-box">
                                            <input type="text" name="firstname" id="firstname_signup" class="form-input" placeholder="Entrez votre prénom">
                                        </div>
                                        <div class="form-box">
                                            <input type="text" name="lastname" id="lastname_signup" class="form-input" placeholder="Entrez votre nom de famille">
                                        </div>
                                        <div class="form-box">
                                            <input type="text" name="email" id="email_signup" class="form-input" placeholder="Entrez votre adresse email">
                                        </div>
                                        <div class="form-box">
                                            <input type="password" name="password" id="password_signup" class="form-input" placeholder="Tapez votre mot de passe">
                                        </div>
                                        <div class="form-box">
                                            <input type="password" name="cpassword" id="cpassword_signup" class="form-input" placeholder="Récrivez votre mot de passe">
                                        </div>
                                        <div class="form-box" onclick="azouzti();">
                                            <input type="tel" name="phone" id="phone_signup" class="form-input" >
                                        </div>
                                        <div class="form-box">
                                            <button type="submit" style="display:none;" name="sub" id="sub" class="sec-btn"><span>Inscrivez-vous</span></button>
                                            <button type="button" class="sec-btn" onclick="shoof();"><span>Inscrivez-vous</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="contact-form-text">
                                <p>Avez vous déjà un compte? <a href="javascript:void(0);" onclick="document.getElementById('myclose2').click();" data-bs-toggle="modal" data-bs-target="#login" title="Login">S'identifier</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/intlTelInput.js"></script>
    <script>
        var clicka=false;
        const phoneInputField = document.querySelector("#phone_signup");
        const phoneInput = window.intlTelInput(phoneInputField, {utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",});
        function azouzti(){
            if(clicka==false){
                var text = document.getElementsByClassName("iti__selected-flag")[0]['title'];
                const myArray = text.split("+");
                word = '+'+myArray[1];
                document.getElementById("phone_signup").value=word;
                clicka=true;
            }   
        }
        function shoof(){
            var firstname_signup=document.getElementById("firstname_signup").value;
            var lastname_signup=document.getElementById("lastname_signup").value;
            var email_signup = document.getElementById("email_signup").value;
            var password_signup = document.getElementById("password_signup").value;
            var cpassword_signup = document.getElementById("cpassword_signup").value;
            var phone_signup = document.getElementById("phone_signup").value;
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if(firstname_signup.length<1){
                document.getElementById("error_signup").innerHTML="<strong>Erreur!</strong> Le prénom ne doit pas être vide<br>";
                return false;
            }else if(lastname_signup.length<1){
                document.getElementById("error_signup").innerHTML="<strong>Erreur!</strong> Le nom de famille ne doit pas être vide<br>";
                return false;
            }else if(!email_signup.match(validRegex)) {
                document.getElementById("error_signup").innerHTML = '<strong>Erreur!</strong> l\'e-mail ne doit pas être vide<br>';
                return false;
            }else if(password_signup.length<1){
                document.getElementById("error_signup").innerHTML="<strong>Erreur!</strong> Le mot de passe ne doit pas être vide<br>";
                return false;
            }else if(cpassword_signup.length<1){
                document.getElementById("error_signup").innerHTML="<strong>Erreur!</strong> La confirmation du mot de passe ne doit pas être vide<br>";
                return false;
            }else if(cpassword_signup!=password_signup){
                document.getElementById("error_signup").innerHTML="<strong>Erreur!</strong> Le mot de passe et le mot de passe de confirmation ne sont pas les mêmes<br>";
                return false;
            }else if(phone_signup.length<1){
                document.getElementById("error_signup").innerHTML="<strong>Erreur!</strong> Le numéro de téléphone ne doit pas être vide<br>";
                return false;
            }else{
                document.getElementById("sub").click();
            }
        }
    </script>
    <!-- signup Popup End -->

</div>

<!-- Jquery JS Link -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap JS Link -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>

<!-- Datepicker JS Link -->
<script src="assets/js/bootstrap-datepicker.min.js"></script>

<!-- Swiper Slider JS Link -->
<script src="assets/js/swiper-bundle.min.js"></script>

<!-- Fancybox JS Link -->
<script src="assets/js/jquery.fancybox.min.js"></script>

<!-- Font Awesome JS Link -->
<script src="assets/js/font-awesome.min.js"></script>

<!-- Wow Animation JS Link -->
<script src="assets/js/wow.min.js"></script>

<!-- Custom JS Link -->
<script src="assets/js/custom.js"></script>

</body>
</html>
    <?php
    if(strlen($wrong)>1){
        echo('<script>document.getElementById("mylogin").click();</script>');
    }
    if(strlen($dispo)>1){
        echo('<script>document.getElementById("helptoreset").click();</script>');
    }
    if(strlen($upd)>1){
        echo('<script>document.getElementById("updatepasswoxrd").click();</script>');
    }
    if(strlen($sajelni)>1){
        echo('<script>document.getElementById("signupbutton").click();</script>');
    }

    ?>  