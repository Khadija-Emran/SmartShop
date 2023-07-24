<?php require_once('functions/UserClass.php'); 
//Define Object From UserClass
 $user=new User();
?>
<!-- Start store overlay  --> 
<div id="overlay" class="overlay overlay-store">
    <i class="fa fa-close close text-light mr-3 mt-4 fa-2x p-2 close_overlay"  id='Close' style="position: fixed;
    left: 95%;z-index: 10000000000;"></i>
    <div class="overlay-content">
		<div class="text-light" ></div>
        <div class="login  text-center">
            <h3 class="title-style" id="store_title">Create Your Store</h3>
				<br>
				<form action="" method="post" class="" enctype="multipart/form-data">
                    
                <div class="content">
                    <div class="">
                        <p id="owner" class="text-light font-weight-bold"></p>
                        <p id="storeStatus" class="btn text-light" style=""></p>
                 
                    </div>
                    <input type="hidden" id="selectedID" class="selectedID"  name="selectedID">
                   <img 
                        src="images/img2.png" 
                        class="ImgUpload mb-2"
                        id="ImgUpload">
                   <!-- Product Image -->
            
                  <div class="custom-file " style="width:100% !important">
                  <input type="file" class="custom-file-input ProImg ImgfileInput" 
                  id="customFile"
                  name="ProImg" 
                  
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
                    <input type="text" 
                           placeholder="Store Name" 
                           name="Sname" 
                           class="Sname" 
                           id="Sname" autocomplete="off" required> 
					<p class="validate-text Sname-txt-error" >Please , enter Store name </p>
                </div>
                </div>
				<!-- end store name -->
				<!-- store des-->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Store Description</span>
				<div class="input-div col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-user lock"></i></span>
                    <input type="text" placeholder="Store Description" name="des" class="des" id="Sdes" >
					<p class="validate-text Dname-txt-error" >Please , enter store description  </p> 
                </div>
                </div>
				<!-- end store des -->
				<!-- Location -->
				<div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Store Location</span>
                    <div class="input-div col col-sm-8 col-12">
                        <span class="icon-span"><i class="fa fa-home lock"></i></span>
                        <input type="text" placeholder="Store Location" name="location" class="location"  id="location">
                        <p class="validate-text location-txt-error" >Please , enter Store Location </p> 
                    </div>
                </div>
                    <!-- owner store -->
                  
                <div class="row">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Chose Owner Store</span>
                    <select  
                            name="storeOwner" 
                            id="storeOwner"
                            placeholder="Chose  Owner Store"
                            class="form-control product-input product-img col col-sm-8 col-12 mb-2 mt-2"  required>
						<option value="0" selected disabled>Chose</option>
						<?php 
						$Sellers_have_Array =array();
                        $Sellers_have_Array=$store->Sellers_have_stores();
                        //All Sellers
                        $allSellers=array();
                        $allSellers=$user->GetAllSellers();
                        $userArray=array();
                        foreach($allSellers as $key=>$value){
                        //Category Data
                        $sellerID=$allSellers[$key];
                        if(!array_key_exists($sellerID, $Sellers_have_Array)){
                        $userArray=$user->GetUserData($sellerID);
                        $SellerName=$userArray['UserName'];   ?>
                        <!-- Generate Element in Catogery List -->
                          <option value="<?php echo $sellerID; ?>" class="" ><?php echo $SellerName; ?></option>
                        <?php
                          }//end if
                     
                         }//end foreach
                        ?>
					 </select>
                </div>
				<!-- end  owner store -->
                  <!-- Available -->                        
                  <div class="custom-control custom-radio custom-control-inline mr-5 storeStatusRadio">
                  <input type="radio" class="custom-control-input storestatusRadio0" id="close" name="available" value="0" checked>
                  <label class="custom-control-label text-light" for="close">Close</label>
                 </div>
                <!--End Available -->
                <!-- Close -->
                <div class="custom-control custom-radio custom-control-inline storeStatusRadio">
                  <input type="radio" class="custom-control-input storestatusRadio1" id="open" name="available" value="1">
                  <label class="custom-control-label text-light" for="open">Open</label>
                </div>
                </div>
                <!-- End Close -->
                    <br>
                    
                  <!--End Close Status-->
                <!--end Status -->
                <input type="submit" value="Save" class="submit text-center add_store" name="add_store" id="add_store">
            <br>
			</form>	
	  </div>
 
    </div>
</div>
<!-- End store overlay  --> 