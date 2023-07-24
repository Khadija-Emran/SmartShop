<?php 
	//session_start();
$userActionPath='functions/User/UserAction.php';
$categoryActionPath='functions/Catogery/CatogeryAction.php';
$ProductActionsPath='functions/ProductActions.php';
$CartProductsClassPath='functions/CartProductsClass.php';
$StoreActionPath='functions/Store/StoreAction.php';
$CartClassPath='functions/CartClass.php';
$alert='Modal/alert.php';
$CartActionPath='functions/CartAction.php';

include 'Modal/confirm.php';
?>
	<head>
	    <meta http-equiv="Content-Type" content="text/html charset=utf-8" />
        <link rel="title icon" href="images/cart9.jpg">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/lightbox.css">
	    <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/front.css">
        <link rel="stylesheet" href="css/media.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/lightbox.js"></script>
        <script src="js/wow.min.js"></script>
		  <script>
		  new WOW().init();
		  </script>
        <script src="js/frontAnimation.js"></script>
        <script src="js/frontAnimation2.js"></script>
        <script src="js/dashboard.js"></script>
	</head>

	<!-- session -->
	<?php 
    if(isset($_SESSION['UserID'])){
	 $userName = $_SESSION['User_name'];
	 $id=$_SESSION['UserID'];
     $cartID=$_SESSION['cartID'];
    }//end if
	?>
	<!-- end session -->