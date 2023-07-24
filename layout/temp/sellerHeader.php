  <head>
    <!--<meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="title icon" href="images/cart7.jpg">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <?php include 'temp/ini.php';?>
    <!--<link rel="stylesheet" href="css/UserStyle.css">-->
	  	
  </head>
	<!-- session -->
	<?php 
    if(isset($_SESSION['StoreID'])){
	$userName = $_SESSION['User_name'];
	$id=$_SESSION['UserID'];
    $cartID=$_SESSION['cartID'];
    $storeID=$_SESSION['StoreID'];
    //User Data
    //Define Object From UserClass
    $user=new User();
    UserObject($user,$id);
    $userImg=$user->getUserImg();
    //Store Data
    //Define Object From StoreClass
    $store=new Store();
    StoreObject($store,$storeID);
    $storeImg=$store->getStorePhoto();
    $Name=$store->getStoreName();
    $storeDes=$store->getStoreDes();
    }//end if
	?>
	<!-- end session -->
    <!--Navbar-->  
    <!--End Navbar-->
    <!-- sidebar -->
     <?php
    include 'temp/slider1.php';
    include 'temp/top_nav.php';
    ?>  

