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
if (isset($_GET['id_commande'])) {
    $list=  $admincrudpanel->getPanierProductById($_GET['id_commande']);
  }
$listec = $admincrudpanel->getFullName();
foreach ($listec as $ta3b) {
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
    <title><?php echo($ta3b['sitename']);?> - Commande Details</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
                        <li  class="active has-sub">
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
                        <li  class="active has-sub">
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                       
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Marque</th>
                                        <th>Model</th>
                                        <th>Quantite</th>
                                        <th>Prix</th>
                                        <th>Prix total</th>
                                

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($list as $item): ?>
                             <tr>
                             <th><?= $item->id; ?></th>
                            <td><img src="../view/<?= $item->img; ?>" alt="" width="200" height="150"> </td>
                            <td><?= $item->marque; ?></td>
                            <td><?= $item->model; ?></td>      
                             <td><?= $item->quantite; ?></td>  
                            <td><?= $item->prix; ?> DT</td>     
                            <td><?=  $item->prix* $item->quantite; ?> DT</td>            
                            </tr>
                            <?php endforeach ?>
                                </tbody>
                                    </table>
                                </div>
                            </div>
                      
                        </div>                            <div class="col-md-12">
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
