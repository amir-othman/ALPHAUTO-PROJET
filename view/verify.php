<?php 
session_start();
include '../Controller/functions.php';
$admincrudpanel = new admincrudpanel();
if(isset($_SESSION['smartCookies'])){
    if($admincrudpanel->askforadmin($_SESSION['smartCookies'])=='oui'){
        header("Location: ../admin/");
    }
}
if((!isset($_GET['email']))||(!isset($_GET['token'])))
{die("vous n'êtes pas autorisé à accéder");}
$askitpermission=$admincrudpanel->simplecheckverification($_GET['email'],$_GET['token']);
if($askitpermission=='NO'){die("vous n'êtes pas autorisé à accéder");}
$email=$_GET['email'];
$token=$_GET['token'];
$admincrudpanel->verificationEmail($_GET['email'],$_GET['token']);
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
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <title><?php echo($sitename);?></title>
    <link rel="icon" href="<?php echo($sitelog);?>" type="image/gif" sizes="16x16">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oxanium:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/swiper-bundle.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
                                <div class="header-search-login">
                                    <div class="header-login">
                                    <?php 
                                        if(!isset($_SESSION['smartCookies'])){echo('<a href="javascript:void(0);" id="mylogin" data-bs-toggle="modal" data-bs-target="#login" title="Login"><i class="far fa-user"></i></a>');}
                                        else{
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
                                        if(!isset($_SESSION['smartCookies'])){echo('<a href="javascript:void(0);" id="mylogin" data-bs-toggle="modal" data-bs-target="#login" title="Login"><i class="far fa-user"></i></a>');}
                                        else{
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
    <section class="main-banner">
        <span class="banner-shape">
            <img width="1245" height="867" src="assets/images/banner-shape.svg" alt="shape">
        </span>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner-content">
                        <h1 class="h1-title wow fadeup-animation" data-wow-duration="0.8s">Future <span>voiture</span> future <span>voyage</span> 😊 </h1>
                        <p class="wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">Toute l'equipe Alpha Auto vous souhaite la bienvenue à notre site de vente , achat et location de voiture. Bon trajet à tous 😉 .</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner-img wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <img src="assets/images/banner-car.png" width="1173" height="565" alt="Car">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Services Start -->
    <section class="main-search-car">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8 m-auto">
                    <div class="title wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h2 class="h2-title">Louer une <span>voiture</span></h2>
                        <span class="title-line"></span>
                        <p>Besoin d'une voiture à louer ?<br>Pas de problème, nous vous louons à petits prix et à la meilleur qualité.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="main-cars-slider wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <div class="cars-slider">
                            <div class="swiper-wrapper">
                                <?php
                                    $allpiece = $admincrudpanel->getAllitems();
                                    foreach ($allpiece as $singlepiece) {
                                ?>
                                <div class="swiper-slide">
                                    <div class="car-box">
                                        <div class="car-img">
                                            <img src="<?php echo($singlepiece['img']);?>" width="430" height="220" alt="nissan">
                                        </div>
                                        <div class="car-box-text">
                                            <h3 class="h3-title"><?php echo($singlepiece['marque'].' '.$singlepiece['model']);?></h3>
                                            <div class="price-reviews">
                                                <div class="car-price">
                                                    <h4 class="h4-title"><span>TND <?php echo $singlepiece['prix']; ?></h4>
                                                </div>
                                                <div class="car-review">
                                                    <p><?php echo($singlepiece['reviews']);?> avis</p>
                                                    <ul>
                                                        <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                                        <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                                        <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                                        <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                                        <li><img src="assets/images/rating-icon.svg" width="20" height="20" alt="Star"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="cars-features-list">
                                                <div class="cars-features-box">
                                                    <span class="icon"><img src="assets/images/seat-icon.svg" width="34" height="45" alt="Seat"></span>
                                                    <p><?php echo($singlepiece['nb_place']);?> places</p>
                                                </div>
                                                <?php 
                                                if($singlepiece['ac']=="1"){
                                            ?>
                                            <div class="cars-features-box">
                                                <span class="icon"><img src="assets/images/ac-icon.svg" width="45" height="45" alt="AC"></span>
                                                <p>Oui</p>
                                            </div>
                                            <?php
                                                }else{
                                            ?>
                                            <div class="cars-features-box">
                                                <span class="icon"><img src="assets/images/ac-icon.svg" width="45" height="45" alt="AC"></span>
                                                <p>Non</p>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            <div class="cars-features-box">
                                                <span class="icon"><img src="assets/images/gear-icon.svg" width="30" height="45" alt="Auto"></span>
                                                <p><?php echo($singlepiece['boite']);?></p>
                                            </div>

                                            <?php 
                                                if($singlepiece['carburant']=="es"){
                                            ?>
                                            <div class="cars-features-box">
                                                <span class="icon"><img src="assets/images/petrol-icon.svg" width="45" height="45" alt="Petrol"></span>
                                                <p>Essence</p>
                                            </div>
                                            <?php
                                                }else{
                                            ?>
                                            <div class="cars-features-box">
                                                <span class="icon"><img src="assets/images/petrol-icon.svg" width="45" height="45" alt="Petrol"></span>
                                                <p>petrol</p>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            </div>
                                            <div class="cars-features-btn">
                                                <a href="car-detail.php?id_vehicule=<?php echo($singlepiece['idVehicule']);?>" class="sec-btn" title="Reserve maintenant"><span>Reserve maintenant</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }?>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-arrow swiper-button-prev"><img src="assets/images/arrow-icon.svg" width="30" height="30" alt="Arrow"></div>
                            <div class="swiper-arrow swiper-button-next"><img src="assets/images/arrow-icon.svg" width="30" height="30" alt="Arrow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- Services End -->

    <!-- Our Super Cars Start -->
    
    <!-- Our Super Cars End -->

    <!-- Blog Start -->
    
    <!-- Blog End -->

    <br><br>

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


    <!-- Login Popup Start -->
    <div class="modal fade common-popup" id="login">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="popup-title">
					<h3 class="h3-title">vérification de votre compte</h3>
				</div>
				<div class="common-popup-overflow">
					<div class="common-popup-text">
						<div class="contact-form">
							<form method="post" action="index.php">
                                <div class="row">
                                    <center><b><font id="wrongz" style="color:green;"><b>merci pour la vérification que votre compte est maintenant déverrouillé, vous pouvez vous y connecter en toute sécurité ✅ ✅<br><br></b></font></b></center>
                                    <div class="col-12">
                                        <div class="form-box">
                                            <button type="submit" name="submitus" class="sec-btn"><span>Connexion</span></button>
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
    <!-- Login Popup End -->
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
        echo('<script>document.getElementById("mylogin").click();</script>');
    ?>  