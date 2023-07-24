<?php  
include 'temp/ini.php';
include $userActionPath;
include $categoryActionPath;
//include 'functions/ProductActions.php'; 
require_once ('Modal/delete_confrim.php');
require_once ('Modal/overlay/user_overlay.php');
require_once ('Modal/overlay/store_overlay.php');
require_once ('Modal/overlay/product_overlay.php');
require_once ('Modal/overlay/category_overlay.php');
//Define Object From UserClass
 $user=new User();
//Define Object From StoreClass
 $store=new Store();
//Define object from Category class
 $category= new Category();
//Define object from Product class
 $product= new Product();
//user data
 $userID=$_SESSION['admineID'];
 UserObject($user,$userID);
 $userName=$user->getUserName();
 $userPhoto=$user->getUserImg();
//store data
?>

<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top bg-dark slider display-none"  id="slider" style="margin-top: 0px !important;">
        <!--Store Photo-->
      <div class="bottom-border pb-3 text-center">
    
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
        <li class="nav-item nav-item text-white p-3 mb-2 sidebar-link current" data-class=".Users">
            <i class="fa fa-home text-light fa-lg mr-3 ">
            </i> Users
          </li>
        <li class="nav-item text-white p-3 mb-2 sidebar-link" data-class=".Stores">
           
                <i class="fa fa-user text-light fa-lg mr-3" ></i>
                Stores
            
          </li>
        <li class="nav-item text-white p-3 mb-2 sidebar-link" data-class=".Categories">
            
                <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>
                Categories
        
          </li>
        <li class="nav-item text-white p-3 mb-2 sidebar-link" data-class=".Productes">
            
                <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>
                Productes
            
          </li>
        <li class="nav-item text-white p-3 mb-2 sidebar-link" data-class=".Inbox">
          
                <i class="fa fa-envelope text-light fa-lg mr-3"></i>
                Inbox
        
          </li>
    
        <li class="nav-item text-white p-3 mb-2 sidebar-link" data-class=".Settings">
            
                <i class="fa fa-wrench text-light fa-lg mr-3"></i>
                Settings
            
          </li>
      </ul>
    </div>

<script>
    $('.sidebar-link').click(function(){
        $(this).addClass('current').siblings().removeClass('current');
        console.log($(this).data('class'));
        if($(this).data('class')){
         $($(this).data('class')).removeClass('display_none').addClass('display_block');
           $('.admin-tab-content').addClass('display_none');
        }//end if
    });
</script>
