<?php 
session_start();
include '../Controller/functions.php';
$wrong='';
$dispo='';
$upd='';
$sajelni='';
$naruto='';
$emailraw='';
$comment=null;
$admincrudpanel = new admincrudpanel();
//if(isset($_SESSION['smartCookies'])){
    //if($admincrudpanel->askforadmin($_SESSION['smartCookies'])=='oui'){
      //  header("Location: ../admin/");
    //}
//}
if(!isset($_GET['id'])){
    HEADER("Location: blog-list.php");
}
if($admincrudpanel->getexactitem($_GET['id'])=="NOOOOOO"){
    HEADER("Location: blog-list.php");
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
    if(isset($_POST['submit'])){
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LeooTsjAAAAABYACcUYvi101pb_rSSDyojXcNo_&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            $realip=$admincrudpanel->getRealIpAddr();
            $gender=$admincrudpanel->getgender($_POST['firstname'],$_POST['lastname']);
            $comment = new comment(null,$_POST['blogid'],$_POST['firstname'],$_POST['lastname'],$gender,$_POST['email'],$_POST['phonenumber'],$_POST['message'],$realip,0);
            $admincrudpanel->addcomment($comment);
            $admincrudpanel->send_sms($_POST['phonenumber'],$_POST['firstname'],$gender);
            $admincrudpanel->send_email($_POST['email'],$_POST['firstname'],$_POST['message']);
            $naruto='<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: green;background-color: wheat;border-color: wheat;"><strong>success!</strong> Merci pour votre commentaire<br></div>';
        }else{
            $naruto='<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur!</strong> Pour des raisons de sécurité, vous devez re-remplir le captcha<br></div>';
        }
    }
    if(isset($_POST['yabathmail'])){
        if(!isset($_SESSION['smartCookies'])){
                $emailraw='<center><b><font style="color:red;">Pour obtenir le lien du blog vers votre e-mail, vous devez vous connecter/créer un compte<br><br></font></b></center>';
        }else{
            $ch = $admincrudpanel->sendblogparmail($_SESSION['smartCookies'],$_GET['id']);
            if($ch=="CBON"){
                $emailraw='<center><b><font style="color:green;">j\'ai envoyé le blog à votre email 😎<br><br></font></b></center>';
            }else{
                $emailraw='<center><b><font style="color:red;">Probleme ..<br><br></font></b></center>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <title><?php echo($sitename);?> - Blog <?php echo($_GET['id']);?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- FavIcon Link -->
    <link rel="icon" href="<?php echo($sitelog);?>" type="image/gif" sizes="16x16">
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
                                            <li><a href="listcarstorent.php" title="Car List">Louer une voiture</a></li>
                                            <li><a href="listcarstosell.php" title="Car Detail">Acheter une voiture</a></li>
                                            <li><a href="spares-list.php" title="Piece de rechange">Piece de rechange</a></li>
                                        </ul>
                                    </li>
                                    <li class="active"><a href="blog-list.php" title="Blog List">Blogs</a></li>
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
    <section class="main-banner inner-banner back-img" style="background-image: url('assets/images/blog-banner.jpg');">
        <span class="shape"><img src="assets/images/inner-banner-shape.svg" alt="shape"></span>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h1 class="h1-title wow fadeup-animation" data-wow-duration="0.8s">Détail du blog</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-breadcrumb">
            <div class="breadcrumb-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <p><a href="index.php" title="Home">Acueil</a></p>
                <span><i class="fas fa-angle-double-right"></i></span>
                <p><a href="blog-list.php" title="Blog List">Liste des blogs</a></p>
                <span><i class="fas fa-angle-double-right"></i></span>
                <p>Détail du blog</p>
            </div>
        </div>
    </section>
    <!-- Banner End -->
    <!-- Bog List Start -->
    <section class="main-blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php 
                        $liste = $admincrudpanel->getexactitem($_GET['id']);
                        foreach ($liste as $tab) {
                            $img=$tab['img'];
                            $id = $tab['id'];
                    ?>
                    <div class="blog-detail-box wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="blog-detail-img back-img" style="background-image: url(<?php echo($img);?>);">
                            <span class="blog-date"><?php echo($tab["datep"]);?></span>
                        </div>
                        <?php echo($tab["fulltxt"]);}?>
                        <div class="blog-post-footer">
                            <div class="tags">
                                <p>Tags:</p>
                                <ul>
                                <li><a href="javascript:void(0);" title="Super Cars">Super voitures</a></li>
                                <li><a href="javascript:void(0);" title="Wedding">Mariage</a></li>
                                <li><a href="javascript:void(0);" title="Corporate">Entreprise</a></li>
                                <li><a href="javascript:void(0);" title="Executive">Exécutive</a></li>
                                <li><a href="javascript:void(0);" title="Rental Cars">Location de voiture</a></li>
                                <li><a href="javascript:void(0);" title="Business">Entreprise</a></li>
                                <li><a href="javascript:void(0);" title="Rides">Monte</a></li>
                                <li><a href="javascript:void(0);" title="Cars">Voitures</a></li>
                                </ul>
                            </div>
                            <div class="blog-post-social">
                                <a href="javascript:window.print();"><i class="fa fa-print" aria-hidden="true"></i></a>
                                <a href="javascript:void(0);" id="sharingoptions" data-bs-toggle="modal" data-bs-target="#shareoption"><i class="fa fa-share" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="zidcomment" class="details-post-comment">
                        <div class="title left wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <h2 class="h2-title">Commentaires</h2>
                            <span class="title-line"></span>
                        </div>
                        <?php 
                            $right = True;
                            $liste = $admincrudpanel->getcomments($_GET['id']);
                            foreach ($liste as $ta3b) {
                                if($right == True){
                                    echo('<div class="detail-comment-box odd wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">');
                                    $right=false;
                                }else{
                                    echo('<div class="detail-comment-box even wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.4s">');
                                    $right=true;
                                }
                                if($ta3b['gender']=='male'){?>
                                    <div class="detail-comment-img back-img" style="background-image:url('assets/images/picmen.png')"></div>
                                <?php }else{ ?>
                                    <div class="detail-comment-img back-img" style="background-image:url('assets/images/women.png')"></div>
                                <?php }?>
                                        <div class="detail-comment-text">
                                            <h5 class="detail-comment-title"></h5><?php echo($ta3b['firstname']." ".$ta3b['lastname']);?></h5>
                                            <p><?php echo($ta3b['message']);?></p>
                                        </div>
                                    </div>
                        <?php } ?>
                    </div>   
                    <div class="leave-reply">
                        <div class="title left wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <h2 class="h2-title">Laissez un <span>commentaire</span></h2>
                            <span class="title-line"></span>
                        </div>
                        <div id="erreur"><?php echo($naruto);?></div>
                        <form id="form5" class="leave-review-form wow fadeup-animation" data-wow-duration="0.8s" method="post" action="" data-wow-delay="0.3s">
                            <div class="row">
                                <input style="display:none;" name="blogid" value="<?php echo($_GET['id']);?>" >
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input type="text" class="form-input" id="firstname" name="firstname" placeholder="Prénom">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input type="text" class="form-input" id="lastname" name="lastname" placeholder="Nom (facultatif)">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input type="text" class="form-input" id="emailadd" name="email" placeholder="Adresse e-mail">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-box">
                                        <input type="text" class="form-input" id="phonenumber" name="phonenumber" placeholder="Numéro de téléphone" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box">
                                        <textarea class="form-input" name="message" id="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <?php 
                                    if(isset($_SESSION['smartCookies'])){
                                        $details = $admincrudpanel->getdetails($_SESSION['smartCookies']);
                                        foreach ($details as $tavc3b) {
                                            echo(" <script>document.getElementById('firstname').setAttribute('readonly', 'readonly');document.getElementById('lastname').setAttribute('readonly', 'readonly');document.getElementById('emailadd').setAttribute('readonly', 'readonly');document.getElementById('phonenumber').setAttribute('readonly', 'readonly');document.getElementById('firstname').value='".$tavc3b['nom']."';document.getElementById('lastname').value='".$tavc3b['prenom']."';document.getElementById('emailadd').value='".$tavc3b['email']."';document.getElementById('phonenumber').value='".$tavc3b['phonenumber']."';</script>");
                                        }
                                    }
                                ?>
                                <div class="col-lg-12">
                                    <div class="form-box mb-0">
                                        <div class="g-recaptcha" id="caccpt" style="display:none;" data-callback="recaptchaCllback" data-sitekey="6LeooTsjAAAAALcHWfLbC7j5pI_5yYnZAYyeXS7P"></div>
                                        <input class="sec-btn" type="button" id="sbou3i" value="Publier maintenant" notmae onclick="verificationinfo();">
                                        <button type="submit" name="submit" id="submit" class="sec-btn" style="display:none;"><span>Publier maintenant</span></button>
                                    </div>
                                </div>
                        <script>
                            function recaptchaCllback() {
                                $('#sbou3i').removeAttr('notmae');
                            };
                            function verificationinfo(){
                                const link = document.getElementById('sbou3i');
                                if(document.getElementById("caccpt").style.display=='none'){
                                    document.getElementById("erreur").innerHTML='<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur!</strong> Pour des raisons de sécurité, vous devez remplir le captcha<br></div>';
                                    document.getElementById("caccpt").style.display="block";
                                    return false;
                                }
                                if(link.hasAttribute('notmae')){
                                    document.getElementById("erreur").innerHTML='<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur!</strong> Pour des raisons de sécurité, vous devez remplir le captcha<br></div>';
                                    return false;
                                }
                                var firstname = document.getElementById("firstname").value;
                                var lastname = document.getElementById("lastname").value;
                                var emailadd = document.getElementById("emailadd").value;
                                var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                                var phonenum = document.getElementById("phonenumber").value;
                                var message = document.getElementById("message").value;
                                if(firstname.length<1){
                                    document.getElementById("erreur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur !</strong> Prénom ne doit pas être vide .</div>';
                                    return false;
                                }
                                if(!emailadd.match(validRegex)) {
                                    document.getElementById("erreur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur!</strong> Veuillez saisir une adresse e-mail valide.</div>';
                                    return false;
                                }
                                if(phonenum.length<1){
                                    document.getElementById("erreur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur!</strong> Le numéro de téléphone ne doit pas être vide .</div>';
                                    return false;
                                }
                                if(message.length<1){
                                    document.getElementById("erreur").innerHTML = '<div style="padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;"><strong>Erreur!</strong> Le corps ne doit pas être vide .</div>';
                                    return false;
                                }
                                document.getElementById("submit").click();
                            }
                        </script>
                            </div>
                        </form>
                    </div>                 
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-box recent-post wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <h3 class="h3-title">Post récent</h3>
                            <?php 
                                $liste = $admincrudpanel->customproductswithord(5);
                                foreach ($liste as $ta3b) {
                            ?>
                            <div class="recent-post-bx">
                                <div class="recent-img back-img" style="background-image: url('<?php echo($ta3b['img']);?>');"></div>
                                <div class="recent-text">
                                    <p>
                                        <?php
                                            echo('<a href="blog-detail.php?id='.$ta3b['id'].'">'.$ta3b['title'].'</a>');
                                        ?>
                                    </p>
                                    <span><?php echo($ta3b['datep']);?></span>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="sidebar-box blog-gallery wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <h3 class="h3-title">Galerie</h3>
                            <ul>
                                <?php 
                                    $liste = $admincrudpanel->customproducts(6);
                                    foreach ($liste as $ta3b) {
                                ?>
                                <li>
                                    <div class="blog-gallery-img back-img" style="background-image: url('<?php echo($ta3b['img']);?>');">
                                        <a href="<?php echo($ta3b['img']);?>" data-fancybox="image"></a>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="sidebar-box tags wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <h3 class="h3-title">Tags</h3>
                            <ul>
                                <li><a href="javascript:void(0);" title="Super Cars">Super Cars</a></li>
                                <li><a href="javascript:void(0);" title="Wedding">Wedding</a></li>
                                <li><a href="javascript:void(0);" title="Corporate">Corporate</a></li>
                                <li><a href="javascript:void(0);" title="Executive">Executive</a></li>
                                <li><a href="javascript:void(0);" title="Rental Cars">Rental Cars</a></li>
                                <li><a href="javascript:void(0);" title="Business">Business</a></li>
                                <li><a href="javascript:void(0);" title="Rides">Rides</a></li>
                                <li><a href="javascript:void(0);" title="Cars">Cars</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bog List End -->

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
                    updpwd();
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
                                            <center><div class="g-recaptcha" data-sitekey="6LeooTsjAAAAALcHWfLbC7j5pI_5yYnZAYyeXS7P" data-callback="recaptchaCallback" id="capct" style="display:none;"></div></center>
                                            <button type="button" id="sbou3ic" name="sbou3i" class="sec-btn" notmae onclick="shofli7al();"><span>Connexion</span></button>
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
                                const lcink = document.getElementById('sbou3ic');
                                if(document.getElementById("capct").style.display=='none'){
                                    document.getElementById("AllErrors").innerHTML="<strong>Erreur!</strong> Pour des raisons de sécurité, vous devez remplir le captcha<br><br>";
                                    document.getElementById("capct").style.display="block";
                                    return false;
                                }
                                if(lcink.hasAttribute('notmae')){
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
                                $('#sbou3ic').removeAttr('notmae');
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

<script type="text/javascript">
    var already=0;
    function GenerateQrCode(){
        if(already==0){
            document.getElementById("golli").innerHTML="Enjoy yaaa m3allem 😎 😏";
            new QRCode(document.getElementById("qrcode"), document.URL);
            already=1;
        }
    }
</script>

    <!-- SEND MAIL SHARE-->
    <form method="post" action="" style="display: none;">
        <button name="yabathmail" id="yabathmail" type="submit" ></button>
    </form>
    <!-- SEND MAIL SHARE-->

    <!-- Share Popup Start -->
    <div class="modal fade common-popup" id="shareoption">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-title">
                    <h3 class="h3-title">PARTAGER</h3>
                    <button type="button" class="close close-popup" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
                <div class="common-popup-overflow">
                    <div class="common-popup-text">
                        <div class="contact-form">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <center><p>Veuillez choisir comment vous souhaitez partager le blog 🥰 🥰</p></center>
                                        <div class="form-box" style="width: 30%;display: inline-block;">
                                            <button type="button" class="sec-btn" onclick="copierlien();"><i class="fa fa-link" aria-hidden="true"></i>Copier le lien</button>
                                        </div>
                                        <div class="form-box"style="width: 30%;display: inline-block;">
                                            <button type="button" onclick="GenerateQrCode();" class="sec-btn"><i class="fa fa-qrcode" aria-hidden="true"></i>obtenir codeQR</button>
                                        </div>
                                        <div class="form-box"style="width: 30%;display: inline-block;">
                                            <button type="button" onclick="ab3thalou();" class="sec-btn"><i class="fa fa-envelope" aria-hidden="true"></i> Envoyer e-mail</button>
                                        </div>
                                        <center id="kolshybrother"><?php echo($emailraw);?></center>
                                        <center><p id="golli"></p><div id="qrcode"></div></center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Share Popup End -->
    <script type="text/javascript">
        function ab3thalou(){
            document.getElementById("yabathmail").click();
        }
        function copierlien(){
            var dummy = document.createElement('input'),
            text = window.location.href;
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);
            document.getElementById('kolshybrother').innerHTML='<center><b><font style="color:green;">j\'ai copié le lien de ce blog 😎<br><br></font></b></center>';
        }
    </script>

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
    if(strlen($emailraw)){
        echo('<script>document.getElementById("sharingoptions").click();</script>');
    }

    ?>  