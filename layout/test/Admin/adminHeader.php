<?php  
include "../functions/User/UserAction.php"; 
//Define Object From UserClass
 $user=new User();
 UserObject($user,82);
 $userName=$user->getUserName();
 $userPhoto=$user->getUserImg();
?>
<head>
	    <meta http-equiv="Content-Type" content="text/html charset=utf-8" />
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/lightbox.css">
	    <link rel="stylesheet" href="../css/animate.css">
		<link rel="stylesheet" href="../css/front.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/media.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script> 
        <script src="../js/lightbox.js"></script>
        <script src="../js/wow.min.js"></script>
		  <script>
		  new WOW().init();
		  </script>
        <script src="../js/frontAnimation.js"></script>
	</head>

<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top bg-dark slider display-none"  id="slider" style="margin-top: 0px !important;">
        <!--Store Photo-->
      <div class="bottom-border pb-3 text-center">
        <?php $userImg="../images/upload/3-20.jpg" ;
        ?>
        <img src="<?php echo $userPhoto ;?>" class="rounded-circle pro-img" style="width: 80px;
        height: 69px;
        margin-bottom: 10px;
        opacity: 0.6;
        border-radius: 50%;">
          <br>
        <a href="#" class="text-white">
            <?php $userName ="Khadija" ;echo '<span>'.$userName.'</span><br>';?>
        </a>
      </div>
      <ul class="navbar-nav flex-column mt-4" role="tablist">
        <li class="nav-item" ><a data-toggle="tab" href="#users" class="nav-link text-white p-3 mb-2 current">
            <i class="fa fa-home text-light fa-lg mr-3">
            </i>Users</a>
          </li>
        <li class="nav-item">
            <a class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="tab" href="#stores">
                <i class="fa fa-user text-light fa-lg mr-3" ></i>
                Stores
            </a>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="modal" data-target="#cart-modal" >
                <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>
                Categories
            </a>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" >
                <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>
                Productes
            </a>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" >
                <i class="fa fa-envelope text-light fa-lg mr-3"></i>
                Inbox
            </a>
          </li>
    
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link">
                <i class="fa fa-wrench text-light fa-lg mr-3"></i>
                Settings
            </a>
          </li>
      </ul>
    </div>
