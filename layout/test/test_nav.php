<?php include 'temp/ini.php'; ?>
<?php include 'temp/Navbar.php'; ?>
<?php include 'temp/footer.php'; ?>

<script>
    $('.link-list').click(function(){
      $(this).addClass('nav-active').siblings().removeClass('nav-active');
    });
</script>

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
    $storeName=$store->getStoreName();
    $storeDes=$store->getStoreDes();
    }//end if
	?>
	<!-- end session -->
    <!--Navbar-->  
    <!--End Navbar-->
    <!-- sidebar -->
     <?php
    include 'temp/slider1.php';
     
    ?>  

<!-- top-nav -->
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top top-navbar">
              <div class="row align-items-center">
                <div class="col-md-4">
                  <h4 class="basal-color text-uppercase mb-0"><?php echo $storeName ;?></h4>
                </div>
                  <li class="icon-item nav-item" ><a class=" text-light" href="#"><i class="fa fa-angle-down slidBar mr-0 icon-items"></i></a></li>  
                <div class="col-md-5">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control search-input" placeholder="Search...">
                      <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-light"></i></button>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <ul class="navbar-nav">
                    <li class="nav-item icon-parent mr-5 ml-3"><a href="#" class="nav-link icon-bullet"><i class="fa fa-comments text-muted fa-lg"></i></a></li>
                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fa fa-bell text-muted fa-lg"></i></a></li>
                    <li class="nav-item ml-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fa fa-sign-out text-danger fa-lg"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- end of top-nav -->
    <!-- End sidebar -->