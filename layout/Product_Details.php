<?php
 include 'temp/ini.php' ;
 include $userActionPath;
 include $categoryActionPath;
 //Define Object From StoreClass
 $store=new Store();
 //sinclude 'Modal/confirm.php';
 //include 'functions/ProductActions.php';
 //include 'functions/Catogery/CatogeryAction.php';
 //include 'functions/User/UserAction.php';
 include 'temp/Navbar.php' ;
 
//Define object from ProductClass
$product= new Product();
//Define object from Catogery class
$category= new Category();

//If Product ID Send Via 'Get'
    if(isset($_GET['productID'])){
     //Get Product ID From 'Get'
     $productID=$_GET['productID'];
    //Product Object To Get Its Data (The Post Product)
     ProductObject($product,$productID);
     $ProName=$product->getProName();
     $Price=$product->getPrice();
     $BasalPhoto=$product->getProImage();
     $Stute=$product->getProStatus();
     $ProDes=$product->getProDes();
     $Quantity=$product->getQuantity();
     $proCatogeryID =$product->getCatogeryID();
     $storeID=$product->getStoreId();

     //Catogery Object To Get Its Data
     CatogeryObject($category,$proCatogeryID);
     //Catogery Name
     $catogeryName=$category->getCatogName();
     //Store Object To Get Store Data
     StoreObject($store,$storeID);
        
     //Store Name
     $storeName=$store->getStoreName();
     $storeDes=$store->getStoreDes();
     $storeLocat=$store->getLocation();
     $storePhoto=$store->getStorePhoto();
     //Store Owner 
       
     $seller=$store->getSellerID();

     //User Object To Get User Data
     UserObject($user,$seller);
     //User Data 
     $sellerName=$user->getUserName();
     $phoneNo1=$user->getPhoneNo1();
     $phoneNo2=$user->getPhoneNo2();
?>
<!--Details of product-->
<div class="product-details">
    <!--container-->
    <div class="container" style="max-width: 100%;">
        
        <!--Buttons Row-->
        
            <?php
            // add to cart button
            //echo "<div class='cart-button mb-2'>";
             $ProID=$_GET['productID'];
             include 'Modal/Product/productOptions.php';
            ?>
        <!--End Buttons Row-->
        <!--Product Detailes Row-->
        <div class="row mt-2">
            <!--Product Images -->
            <div class="col-xl-2 col-lg-2 col-sm-2 col-3 display-block mb-4">
                <!--First Image-->
                <a href="images/boo.jpg" data-lightbox="library" data-title="product Name">
                 <img src="images/boo.jpg" style="width: 100%;height: 109px;" class="mb-1 mt-1">
                </a>
                <!--End First Image-->
                <!--Second Image-->
                <a href="images/boo.jpg" data-lightbox="library" data-title="product Name">
                 <img src="images/boo.jpg" style="width: 100%;height: 109px;" class="mb-1 mt-1">
                </a>
                <!--End Second Image-->
                <!--Third Image-->
                <a href="images/boo.jpg" data-lightbox="library" data-title="product Name">
                 <img src="images/boo.jpg" style="width: 100%;height: 109px;" class="mb-1 mt-1">
                </a>
                <!--End Third Image-->
            </div>
            <!--End Product Images -->
            <!--Product Mean Image -->
            <div class="col-xl-3 col-lg-3 col-sm-3 col-9 display-block mb-4">
            <a href="<?php echo $BasalPhoto ;?>" data-lightbox="library" data-title="product Name">
              <img src="<?php echo $BasalPhoto ;?>" style="width: 100%;height: 80%;">
            </a>
            </div>
            <!--End Product Mean Image -->
            <!--Product Description -->
            <div class="col-xl-5 col-lg-5 col-sm-5 col-12 display-block mb-4">
                
                    <!--Product Name -->
                    <div>
                        <h6 class="basal-color">Name</h6>
                        <p><?php echo $ProName;?></p>
                    </div>
                    <!--End Product Name -->
                    <!--Product Price -->
                    <div>
                        <h6 class="basal-color">Price</h6>
                        <p><?php echo $Price ;?>$</p>
                    </div>
                    <!--End Product Price -->
                     <!--Product Quantity -->
                    <div>
                        <h6 class="basal-color">Quantity</h6>
                        <p><?php echo $Quantity ;?> pieces</p>
                    </div>
                    <!--End Product Description -->
                    <!--Product Quantity -->
                    <div>
                        <h6 class="basal-color">Description</h6>
                        <p><?php echo $ProDes ;?></p>
                    </div>
                    <!--End Product Description -->
                    <!--Product Catogery -->
                    <div>
                        <h6 class="basal-color">Catogery</h6>
                        <p><?php echo $catogeryName ;?></p>
                    </div>
                    <!--End Product Catogery -->               
            </div>
            <!--End Product Description -->
            <!--Product's Store info-->
            <div class="col-xl-2 col-lg-2 col-sm-2 col-12 display-block mb-4 store-info">
                <input type="hidden" class="storeID <?php echo $storeID?>" value="<?php echo $storeID?>">
                <h5 class="basal-color">Available By</h5>
                <!-- Store Logo-->
                <img src="<?php echo $storePhoto;?>" class="store-logo mb-3 mt-1">
                 <!--End Store Logo-->
                <!-- Store Name-->
                <h6 class="mb-3 basal-color store-name">Store </h6>
                <p><?php echo $storeName ;?>
                    <small class="more-icon ml-1" 
                           style="color: blue; font-style: italic;cursor: pointer;">
                        more<i class="fa fa-angle-down ml-1"></i></small>
                  </p>
                 <!--End Store Name-->
                <!--Store Description-->
                <div class="disappear store-des">
                    <h6 class="basal-color">Store Description</h6>
                    <small><?php echo $storeDes ;?></small>
                    <br>
                    <h6 class="basal-color">Location</h6>
                    <small><?php echo $storeLocat ;?></small>
                    <br>
                </div>
                <!--Store Description-->
                <!--Owner Store-->
                <h6 class="basal-color">Owner Store</h6>
                <small><?php echo $sellerName ;?></small>
                <br>
                <!--End Owner Store-->
                <!-- Store Phones-->
                <h6 class="basal-color">Enquiry : </h6>
                <p><i class="fa fa-phone mr-1"></i><?php echo $phoneNo1 ;?></p>
                <p><i class="fa fa-phone mr-1"></i><?php echo $phoneNo2 ;?></p>
                
                 <!--End Store Phones-->
            </div>
            <!--Product's Store info -->
        <!--End Product Detailes Row-->
    </div>
 </div>
</div>
<!--End Details of product-->
    <!--End container-->
    <!--Relative Products container-->
    <div  style="max-width: 100%;">   
        <h2 class="basal-color text-center text-uppercase font-italic title-style">Relative Products</h2>
        <?php
        
         //Get Product ID From 'Get'
          $productID=$_GET['productID'];
        //Product Object To Get Its Data (The Post Product)
         ProductObject($product,$productID);
        //Product Catogery
         $proCatogeryID =$product->getCatogeryID();
        //Get Products Via Category
         $productArray=$product->GetProViaCato($proCatogeryID); 
        //Products Card Row
        ?>
     <!--Product Card Row -->   
     <div>
         <?php include 'Modal/Product/product_card_row.php'; ?>
     </div>
    <!--End Product Card Row -->
    </div>
    <?php
        }//end if
        else{
          echo "<div class='alert alert-info mt-10 text-center'>";
            echo "There Is Not Selected Product !";
            echo "</div>";
        }
    ?>
   <!--End Relative Products container-->
<?php   include 'temp/footer.php'; ?>
    <script>
        //Show Store Description
        $('.more-icon').click(function(){
        $('.more-icon i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
        $(this).closest('.store-info').find('.store-des').slideToggle(1000);
        console.log('more');
        $(this).toggleClass('color-gray');
          });
    </script>