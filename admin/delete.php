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
if($_GET['type']=="carsv"){
	$admincrudpanel->deleteproduit($_GET['id']);
	echo('<script>window.location = "carslist.php?done=1";</script>');
}
if($_GET['type']=="carsr"){
	$admincrudpanel->deleteproduitr($_GET['id']);
	echo('<script>window.location = "carslistr.php?done=1";</script>');
}
if($_GET['type']=="cate"){
	$admincrudpanel->deletecatego($_GET['id']);
	echo('<script>window.location = "categories.php?done=1";</script>');
}

if($_GET['type']=="blog"){
	$admincrudpanel->deleteitforme($_GET['id']);
	echo('<script>window.location = "blogslist.php?done=1";</script>');
}

if($_GET['type']=="comment"){
	$admincrudpanel->deletecomment($_GET['id']);
	echo('<script>window.location = "comments.php?done=1";</script>');
}

if($_GET['type']=="piece"){
	$admincrudpanel->deletepiece($_GET['id']);
	echo('<script>window.location = "piecelist.php?done=1";</script>');
}

if($_GET['type']=="catep"){
	$admincrudpanel->deletecategop($_GET['id']);
	echo('<script>window.location = "categoriesp.php?done=1";</script>');
}

if($_GET['type']=="location"){
	$admincrudpanel->yesireplied($_GET['id'],$_GET['answer']);
	$admincrudpanel->sendmailreply($_GET['email'],$_GET['answer']);
	echo('<script>window.location = "commandel.php";</script>');
}




?>