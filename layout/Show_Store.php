
<?php
 include 'temp/ini.php' ;
 include $userActionPath;
 include $categoryActionPath;
 //include 'functions/ProductActions.php';
 //include 'functions/Catogery/CatogeryAction.php';
 //include 'functions/User/UserAction.php';
//If Store ID Send Via 'Get'
    if(isset($_GET['storeID'])){
     //Get Store ID From 'Get'
    $storeID=$_GET['storeID'];
 //Define object from ProductClass
  $product= new Product();
 //Define object from Catogery class
  $category= new Category();
 //Define object from Store class
  $store= new Store();
 //Array To Storing All Stores Data
  $storeArray=$store->GetAllStoresData();
  $title="Our Products";
  //store data
 StoreObject($store,$storeID);
 $storeImg=$store->getStorePhoto();
 $storeName=$store->getStoreName();
 $storeDes=$store->getStoreDes();
 $sellerID=$store->getSellerID();
 $avaliable=$store->getAvailable();
 $location=$store->getLocation();
 //Define Object From UserClass
 $user=new User();
 UserObject($user,$sellerID);
 $ownerStore=$user->getUserName();
 $ownerImag=$user->getUserImg();
?>

<div class="show-store">
<!-- Store Cover --> 
    <?php $cover="images/cart-com5.jpg"?>
    <div class="cover" 
         style="background-image: linear-gradient(rgba(0, 0, 0, .7),rgba(0, 0, 0, .7)),url(<?php echo $storeImg ;?>);">
        <!-- navbar -->
        <?php  include 'temp/Navbar.php' ;
         //Array To Storing  Category Of Store
          $categoryArray=array();
          $categoryArray=NULL;     
          $categoryArray=Product_Of_Store($storeID);
          $productArray=array();
          $productArray=NULL;   
          $productArray=$product->GetProduct_Of_Store($storeID);
        
        ?>
        <div class="mt-5">
            <div class="row text-center" style="display:block">
                <!-- Store Name -->
                <div class="text-center">
                <h6 class="title-style"><?php echo $storeName ;?><br><span class="grey-color banner-par lead"><span class="basal-color">FOR : </span><?php echo $storeDes ;?></span></h6><br>
                </div>
                <!--End Store Name -->
            </div>
            <!-- Store Logo -->
            <div class="row text-center mt-3">
                <div class="col">
                <img src="<?php echo $ownerImag ;?>" class="logo store-logo" style="width:50px;height:50px;border-radius:50%">
                <p>
                <small class="basal-color">For owner : 
                    <span class="grey-color"><?php echo ' '.$ownerStore ;?> </span>
                    </small>
                </p>
                </div>
                <div class="col mt-4">
                    <?php 
                     if($avaliable==0){
                         ?>
                        <span class="mr-1 bg-danger" style="padding: 0px 7px;border-radius: 50%;"></span><span>Close</span> 
                    <?php
                     }
                    else{
                     ?>
                    <span class="mr-1 bg-success" style="padding: 0px 7px;border-radius: 50%;"></span><span>Open</span> 
                    <?php
                    }
                    ?>
                </div>
                <div class="col mt-4">
                   <span><i class="fa fa-map-marker fa-lg mr-2 text-light"></i>
                    <?php echo $location;?></span> 
                </div>
            </div>
       </div> 
    </div>
<!-- End Store Cover -->
<!--  Store bar -->
        <div class="row float-right mt-3">
            <a href="#" class="link-style float-left link-style-active">Our Products</a>
                <!-- Catogery -->
                <div data-toggle="dropdown" >
                <a href="#" class="link-style dropdown-toggle float-left" data-toggle="dropdown">Our Categories</a>
                <!-- Catogery item -->
                    <ul class="dropdown-menu pl-2 pr-2">
                        <!-- Catogery List-->
                    <?php
                      if(count($categoryArray)==0){ ?>
                          <li><p class="">There is not any categories
                          </p></li>
                      <?php
                      }//end if
                      else{
                      foreach($categoryArray as $key=>$value){
                          //Category Data
                          $CategoryID=$categoryArray[$key];
                          CatogeryObject($category,$CategoryID);
                          $CategName=$category->getCatogName();
                          ?>
                          <!-- Generate Element in Catogery List -->
                          <li><a data-class=".<?php echo $CategoryID; ?>" class="" ><?php echo $CategName; ?>
                            </a></li>
                          <?php
                         }//end foreach
                        }//end else
                    ?>
                    <!--End Generate Catogery List--> 
                        </ul>
                </div>
                <!-- End Catogery -->
                <a href="#" class="link-style">About Store</a>
                <a href="#" class="link-style">Follow&nbsp;<i class="fa fa-plus-square"></i></a>
        </div>
 <!-- End Store bar -->
  <div class="pt-5">
    <?php 
    if(count($productArray)==0){
        echo '<br><br><br><br><br>';
        $message="There Is Not Any Products In This Store !";
        echo AlertInfo($message);             
    }//end if
    else{
    ?>
    <!-- Category Row -->
     <div style="/*margin-top:80px*/">
         <?php include 'Modal/Category/category_row.php'; ?>
     </div>
    <!--End Category Row -->
    <!-- Product Card Row -->
     <div>
         <?php include 'Modal/Product/product_card_row.php'; ?>
     </div>
    <!--End Product Card Row -->
</div>
<?php 
    }//end else?>
</div>
<!--End Show Store -->
<?php   include 'temp/footer.php'; ?>
  <?php
        
    }//end if
        else{
          echo "<div class='alert alert-info mt-10 text-center'>";
            echo "There Is Not Selected Store !";
            echo "</div>";
    }
    ?>

