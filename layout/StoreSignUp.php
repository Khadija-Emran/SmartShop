<title>Create Store</title>
<?php
include 'temp/ini.php';
include $userActionPath;
include $categoryActionPath;
//include 'functions/Store/StoreAction.php';
//require_once('Modal/alert.php');

//if userID is existing
session_start();
if(isset($_SESSION['UserID'])){
$userName = $_SESSION['User_name'];
?>
  <header class="log-header">
		<div class="text-light" ></div>
        <div class="login  text-center">
				<?php
				if(isset($_SESSION['User_name'])){
					echo '<h3 class="title-style ">Welcome '.$_SESSION['User_name'].'</h3>';
				}
				?>
			<h3 class="title-style">Create Your Store</h3>
				<br>
				<form action="" method="post" class="" enctype="multipart/form-data">
                <div class="content">
                    <input type="hidden" id="selectedID" class="selectedID" name="selectedID">
                    <input type="hidden" id="storeOwner" class="storeOwner" name="storeOwner" value="<?php echo $_SESSION['UserID'];?>">
                   <img 
                        src="images/img2.png" 
                        class="ImgUpload mt-4 mb-2"
                        id="ImgUpload">
                   <!-- Product Image -->
            
                  <div class="custom-file " style="width:100% !important">
                  <input type="file" class="custom-file-input ProImg ImgfileInput" 
                  id="customFile"
                  name="ProImg" 
                  required
                   >
                  <label class="custom-file-label" for="customFile">Choose Photo For Store <i class="fa fa-image"></i></label>
                  </div>
                </div>  
				<!-- store name -->
                <div class="container-fluid">    
				<!-- name -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Store Name</span>
                <div class="input-div mt-4 col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-user user"></i></span>
                    <input type="text" placeholder="Store Name" name="Sname" class="Sname" autocomplete="off" required> 
					<p class="validate-text Sname-txt-error" >Please , enter Store name </p>
                </div>
                </div>
				<!-- end store name -->
				<!-- store des-->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Store Description</span>
				<div class="input-div col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-user lock"></i></span>
                    <input type="text" placeholder="Store Description" name="des" class="des"  >
					<p class="validate-text Dname-txt-error" >Please , enter store description  </p> 
                </div>
                </div>
				<!-- end store des -->
				<!-- Location -->
				<div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Store Location</span>
                    <div class="input-div col col-sm-8 col-12">
                        <span class="icon-span"><i class="fa fa-home lock"></i></span>
                        <input type="text" placeholder="Store Location" name="location" class="location"  >
                        <p class="validate-text location-txt-error" >Please , enter Store Location </p> 
                    </div>
                </div> 
                  <!-- Available -->                        
                  <div class="custom-control custom-radio custom-control-inline mr-5">
                  <input type="radio" class="custom-control-input" id="available" name="available" value="0" checked>
                  <label class="custom-control-label text-light" for="available">Close</label>
                 </div>
                <!--End Available -->
                <!-- Close -->
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="close" name="available" value="1">
                  <label class="custom-control-label text-light" for="close">Opens</label>
                </div>
                </div>
                <!-- End Close -->
                    <br>
                    
                  <!--End Close Status-->
                <!--end Status -->
                <input type="submit" value="Save" class="submit text-center" name="add_store">
            <br>
			</form>	
	  </div>
 </header>
<?php
    }//end if (UserID is existing)
//otherwise if UserID is not existing
else{
    $alertTitle='You Have Not Permission To Enter To This Page !';
    $question='Do You Want To Create  Account ?';
    $yesLink='SignUp.php';
    $NoLink='#';
    echo AlertMessage($alertTitle,$question,$yesLink,$NoLink);
}//end else
?>
<?php
// include 'temp/footer.php';	
?>
	
