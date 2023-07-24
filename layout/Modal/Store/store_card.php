<!-- start column -->
    <div class="col-xl-3 col-lg-4 col-sm-8 col-s-6 product-col <?php //echo //$CategoryID 
    ?> ">
       <!-- Product Card--> 
      <div class="card text-center mb-4 product-card mx-auto product-card">
          <!-- Store Image-->
        <div class="card-body store-card-body" style="padding : 0px">
          <img src="<?php echo $imageURL?>" class="img-fluid rounded pro-img">
          </div>
          <!--End Store Image-->
          <!-- Store ID-->
            <input type="hidden" class="storeID" value="<?php echo $storeID;?> ">
          <!--End Store ID-->
          <!-- Store Name-->
      <div class="card-name">
          <h3 class="font-weight"> <?php echo $storeName?></h3>
          <!-- Angle Down To Show Store Description-->
          <span class="angle-down"><i class="fa fa-angle-down"></i></span>
          <!-- Angle Down-->
        </div>
        <!-- Store Description-->
        <div class="card-des disappear">
            <p class="lead text-left"><?php echo $storeDes?></p>
            <p class="text-left">Location</p>
            <!-- Store Phones-->
            <p class="basal-color lead text-left">Enquiry : </p>
            <p class="lead text-left"><i class="fa fa-phone mr-1"></i><?php echo $phoneNo1 ?></p>
            <p class="lead text-left"><i class="fa fa-phone mr-1"></i><?php echo $phoneNo2 ?></p>
            <!--End Store Phones-->
        </div>
        <!--End Store Description-->
        <!-- Store Owner-->
        <div class="card-price">
         <p class="lead text-left font-weight-bold">Owner : <span><?php echo $sellerName?>$</span></p>
        </div>
        <!--End Store Owner-->
        <!-- Estimate -->
         <div class="card-estimate">
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
        </div>
        <!-- Product Buttons-->
          <?php
                  // add to cart button
                    echo "<div class='cart-buttons'>";
                            echo "<button
                            class='add' 
                            title='You Have Not Cart'
                            data-toggle='modal'
                            data-target='#confirm'
                            >";
                            echo "<span><i class='fa fa-shopping-cart fa-lg mr-1'></i>  </span>Shop in it";
                            echo "</button>";
                            // buy button
                            echo "<button
                            class='favorit ml-1' 
                            title='You Have Not Cart'
                            data-toggle='modal'
                            data-target='#confirm'
                            >";
                            echo "<span><i class='fa fa-heart fa-lg mr-1'></i>  </span>";
                            echo "</button>";
                            echo '<br>';
                    echo "</div>"; 
              ?>
          <!-- Product Buttons-->
      </div>
        <!--End Product Card--> 
    </div>
<!-- end column -->