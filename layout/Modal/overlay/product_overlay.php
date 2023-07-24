<?php
require_once('functions/StoreClass.php');
$store=new Store();

?>
<!-- Start product overlay  --> 
<div id="overlay" class="overlay overlay-product">
    <i class="fa fa-close close text-light mr-3 mt-4 fa-2x p-2 close_overlay"  id='Close' style="position: fixed;
    left: 95%;z-index: 10000000000;"></i>
    <div class="overlay-content">
        <div class="container-fluid">
         <h3 class='title-style update-title' id="product_title">Update Product</h3>
    <!-- form for add product-->
			  <form 
                    enctype="multipart/form-data" 
                    action="" 
                    method="post" id="product-form" class="product-form">
                   <div class="">
                        <p id="owner" class="owner text-light font-weight-bold"></p>
                        <p id="proStatus" class="btn text-light" style=""></p>
                 
                    </div>
               <input type="hidden" id="selectedID" class="selectedID" name="selectedID" value="0">
                   <img 
                        src="images/img2.png" 
                        class="ImgUpload mt-4 mb-1"
                        id="ImgUpload">
                   <!-- Product Image -->
                 <input type="hidden" name="currentImg" value="img2.png" id="currentImg" >
                  
                  <div class="custom-file ">
                  <input 
                  type="file" 
                  class="custom-file-input ProImg ImgfileInput" 
                  id="customFile"
                  name="ProImg" 
                  
                   >
                  <label class="custom-file-label" for="customFile">Choose Photo For Product <i class="fa fa-image"></i></label>
                  </div>
               
                <!-- end  Product Image -->
             	<!-- Product name -->
                <div class="input-div row ">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Name</span>
                    <input type="text" 
                           placeholder="Product Name" 
                           name="proName" 
                           id="proName"
                           class="form-control product-input col col-sm-8 col-12 mb-2 mt-2" autocomplete="off" required> 
                </div>
				<!-- end  Product name -->
				<!-- Product Description -->
                <div class="input-div row">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Description</span>
                    <textarea  
                              placeholder="Product Description" name="proDes" 
                              id="proDes"
                              class="form-control product-input col col-sm-8 col-12 mb-2 mt-2" autocomplete="off" required></textarea>
                </div>
				<!-- end  Product Description -->
			    <!-- Product price -->
                <div class="input-div row ">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Price</span>
                    <div class="col col-sm-8 col-12 mb-2 mt-2 row">
                    <input type="number" 
                           placeholder="Product Price" name="proPrice" 
                           id="proPrice"
                           class="form-control product-input col col-sm-8 col-8 mb-2 mt-2" autocomplete="off" required>
                        <select name="coins" class="coins col col-sm-4 col-4 form-control mb-2 mt-2">
                            <?php
                            foreach($coinsArray as $key=>$value){
                                ?>
                            <option value="<?php echo $key.' '.'('.$value.')' ?>"><?php echo $key.' '.'('.$value.')' ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
				<!-- end  Product price -->
			   <!-- Product Quantity -->
                <div class="input-div row">
                    
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Quantity</span>
                    <div class="col col-sm-8 col-12 mb-2 mt-2 row">
                    <input type="number" 
                           placeholder="Quantity" 
                           name="proQuantity"
                           id="proQuantity"
                           class="form-control product-input col col-sm-8 col-8 mb-2 mt-2" autocomplete="off" required>
                          <select name="quantityType" class="col col-sm-4 col-4 form-control mb-2 mt-2">
                            <?php
                            foreach($quantityType as $key=>$value){
                                ?>
                            <option value="<?php echo '('.$value.')' ?>"><?php echo '('.$value.')' ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
				<!-- end  Product Quantity -->

				<!-- Product Category -->
                  
                <div class="input-div row">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Chose Category</span>
                    <select  
                            name="categories" 
                            id="ProCategory"
                            placeholder="Chose Category"
                            class="form-control product-input product-img col col-sm-8 col-12 mb-2 mt-2"  required>
						<option value="0" selected disabled>Chose Category</option>
						<?php 
						$categoryArray =array();
                        $categoryArray=$category->GetAllCategory();
                        foreach($categoryArray as $key=>$value){
                        //Category Data
                        $CategoryID=$categoryArray[$key];
                        CatogeryObject($category,$CategoryID);
                        $CategName=$category->getCatogName();
                         ?>
                          <!-- Generate Element in Catogery List -->
                          <option value="<?php echo $CategoryID; ?>" class="" ><?php echo $CategName; ?></option>
                          <?php
                         }//end foreach
                          ?>
					 </select>
                </div>
				<!-- end  Product Category -->
                  
                  <!-- Product Store -->
                  
                <div class="input-div row">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Chose Store</span>
                    <select  
                            name="Stores" 
                            id="ProStores"
                            placeholder="Chose Store"
                            class="StoreInput form-control product-input product-img col col-sm-8 col-12 mb-2 mt-2"  required >
						<option value="0" selected disabled>Chose Store</option>
						<?php 
						$storeArray =array();
                        $storeArray=$store->GetAllStoresData();
                        foreach($storeArray as $key=>$value){
                        //Category Data
                        $storeID=$categoryArray[$key];
                        $oneStoreArray=$store->GetStoreData($storeID);
                        $StoreName=$oneStoreArray['StoreName']
                         ?>
                          <!-- Generate Element in Catogery List -->
                          <option value="<?php echo $storeID; ?>" class="" ><?php echo $StoreName; ?></option>
                          <?php
                         }//end foreach
                          ?>
					 </select>
                </div>
				<!-- end  Product Store -->
                  <!-- Available -->               
                  
                  <div class="custom-control custom-radio custom-control-inline mr-5 productStatusRadio">
                  <input type="radio" class="custom-control-input productStatusRadio1" id="avl" name="status" value="1" checked>
                  <label class="custom-control-label text-light" for="avl">Avaliable</label>
                 </div>
                <!--End Available -->
                <!-- Approved -->
                <div class="custom-control custom-radio custom-control-inline productStatusRadio">
                  <input type="radio" class="custom-control-input productStatusRadio2" id="Approved" name="status" value="2">
                  <label class="custom-control-label text-light" for="Approved">Approved</label>
                </div>
                
                <!-- End Approved -->
                  <!--  Locked -->
                  <div class="custom-control custom-radio custom-control-inline productStatusRadio">
                  <input type="radio" class="custom-control-input productStatusRadio0" id="Locked" name="status" value="0">
                  <label class="custom-control-label text-light" for="Locked">Locked</label>
                </div>
                  
                  <!-- End Locked -->
                    <br>
				<!-- submit Form -->
                  
				    <input 
                           type="submit" 
                           value="Add Product" 
                           class="submit text-center btn mt-3 mb-5" 
                           id="SubmitProForm" 
                           name="Add_Product">
                  <!--end submit Form -->
			</form>
			<!--end form for add product-->
        </div>
    </div>
</div>
<!-- End product overlay  --> 