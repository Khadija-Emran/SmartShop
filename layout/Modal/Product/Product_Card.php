<?php
//session_start();
?>
<!-- start column -->
    <div class="col-xl-3 col-lg-4 col-sm-6 col-6 product-col <?php echo $CategoryID?> ">
       <!-- Product Card--> 
      <div class="card text-center mb-4 product-card mx-auto product-card">
          <!-- Product Image-->
        <div class="card-body pro-card-body" style="padding : 0px">
          <img src="<?php echo $imageURL?>" class="img-fluid rounded pro-img">
          </div>
          <!--End Product Image-->
          <!-- Product ID-->
            <input type="hidden" class="productID" value="<?php echo $ProID;?> " >
          <!--End Product ID-->
          <!-- Product Name-->
      <div class="card-name">
          <h3 class="font-weight"> <?php echo $ProName?></h3>
          <!-- Angle Down To Show Product Description-->
          <span class="des-angle-down"><i class="fa fa-angle-down"></i></span>
          <!-- Angle Down-->
        </div>
        <!-- Product Description-->
        <div class="card-des disappear">
            <p class="lead text-left"><?php echo $ProDes?></p>
        </div>
        <!--End Product Description-->
        <!-- Product Price-->
        <div class="card-price " >
         <p class="lead text-left font-weight-bold">Price <span><?php echo $Price.' '.$coin?></span></p>
        </div>
        <!--End Product Price-->
        <!-- Estimate
         <div class="card-estimate">
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
        </div>-->
        <!-- Product Buttons-->
          <?php
      
                    echo "<div class='cart-buttons'>";
                           //If Have Not Cart
                           if(!isset($_SESSION['cartID'])){
                            echo "<button
                            class='add' 
                            title='You Have Not Cart'
                            data-toggle='modal'
                            data-target='#confirm'
                            >";
                            echo "<span><i class='fa fa-shopping-cart mr-1'></i>  </span>Add To Cart";
                            echo "</button>";
                            // Seize button
                            echo "<button
                            class='btn buy ml-2' 
                            title='You Have Not Cart'
                            data-toggle='modal'
                            data-target='#confirm'
                            >";
                            echo "Seize";
                            echo "</button>";
                              // buy button
                            echo "<button
                            style='width: 92%;background: #027162 !important;'
                            class='btn buy ml-2 mr-2 mt-2' 
                            title='You Have Not Cart'
                            data-toggle='modal'
                            data-target='#confirm'
                            >";
                            echo "Buy Now";
                            echo "</button>";
                            echo '<br>';
                        }//end if
                        else {
                            //Get cart product 
                            if(!isset($_SESSION['cart'])){
                                $_SESSION['cart']=array();
                                //store cart products
                                $_SESSION['cart']=$cartPro->GetCartProducts($cartID);
                            }//end if
                            //If Product Is Exists Show Update Cart Button
                            if(array_key_exists($ProID, $_SESSION['cart'])){
                            echo "<a href='ShoppingCart.php' class='add btn update-cart' data-toggle='tooltip' 
                            title='This Product Exists In The Cart Upade It'>";
                                echo "Update Cart";
                            echo "</a>";
                        }//end if
                        //Else , Show Add To Cart Button
                           else{
                            echo "<a href='Actions/cart/Add_to_cart.php?productID={$ProID}&qun=1&price={$Price}' 
                            class='add btn'><span><i class='fa fa-shopping-cart mr-1'></i>  </span>
                            Add to Cart</a>";                           
                        }//end else
                        if($Stute==0){
                          $disabled='disabled';
                          $tooltip='tooltip';
                          $class='seized';
                          $name='Seized';
                          $title='This Product is locked';
                        }//end if
                        else{
                          $disabled='';
                          $tooltip='tooltip';
                          $class='';
                          $name='Seize';
                          $title='This Product is available';
                        }//end else
                        echo "<button class='btn buy ml-2' $disabled data-toggle=$tooltip title='".$title."'>$name</button>";
                        // buy button
                            echo "<button
                            style='width: 92%;background: #027162 !important;'
                            class='btn buy ml-2 mr-2 mt-2 $class' 
                            $disabled data-toggle=$tooltip title='".$title."'>";
                            echo "Buy Now";
                            echo "</button>";
                    }//end else
                    echo "</div>"; 
              ?>
          <!-- Product Buttons-->
      </div>
        <!--End Product Card--> 
    </div>
<!-- end column -->