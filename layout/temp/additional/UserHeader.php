
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/cart-com2.jpg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/UserStyle.css">
	  	
  </head>
	<!-- session -->
	<?php 
    if(isset($_SESSION['UserID'])&&isset($_SESSION['StoreID'])){
	$userName = $_SESSION['User_name'];
	$id=$_SESSION['UserID'];
    $cartID=$_SESSION['cartID'];
    $storeID=$_SESSION['StoreID'];
    //User data
    
    //store data
    StoreObject($store,$storeID);
    $storeImg=$store->getStorePhoto();
    $storeName=$store->getStoreName();
    $storeDes=$store->getStoreDes();
    }//end if
	?>
	<!-- end session -->

       <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top bg-dark slider display-none"  id="slider" >
              <div class="bottom-border pb-3 text-center">
                <img src="<?php echo $storeImg; ?>" class="rounded-circle pro-img"><br>
                <a href="#" class="text-white">
					<?php echo '<span>'.$userName.'</span><br>';?></a>
              </div>
              <ul class="navbar-nav flex-column mt-4">
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 current"><i class="fa fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white p-3 mb-2 sidebar-link"  data-toggle="modal" data-target="#profile"><i class="fa fa-user text-light fa-lg mr-3" ></i>Profile</a></li>
			 	<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="modal" data-target="#cart-modal" ><i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>Cart</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" ><i class="fa fa-envelope text-light fa-lg mr-3"></i>Inbox</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="modal" data-target="#Procurement-modal" ><i class="fa fa-money text-light fa-lg mr-3"></i>Procurement</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="modal" data-target="#favourite-modal"><i class="fa fa-heart text-light fa-lg mr-3"></i>Favourite</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-wrench text-light fa-lg mr-3"></i>Settings</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fa fa-file-alt text-light fa-lg mr-3"></i>Documentation</a></li>
              </ul>
            </div>
            <!-- end of sidebar -->

		  <script src="js/jquery-3.4.1.min.js"></script>
		  <script src="js/popper.min.js"></script>
		  <script src="js/bootstrap.min.js"></script> 
		  <script src="js/backAnamation.js"></script> 
		  <script src="js/frontAnimation.js"></script> 

    