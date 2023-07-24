<?php  
session_start();
//session_start();
//Define Object From StoreClass
$store=new Store();
//Array To Storing Stores Data
$storeArray=$store->GetAllStoresData();
//Define object from Catogery class
$category= new Category();
//Array To Storing Categories Data
$categoryArray=$category->GetAllCategory();
//Define object from Product class
$product= new Product();
$allProducts=array();
$allProducts=$product->GetAllProduct();
$itemCount=0;
//Search Array 
$searchArray=array();
$itemSearchArray=array();

foreach($allProducts as $key=>$value){
$productID=$allProducts[$key];

  $itemCount++;
   //Product Object To Get Its Data 
  ProductObject($product,$productID);
   //Product Data
  $proName =$product->getProName();
  $proImage =$product->getProImage();
  $proDes =$product->getProDes();

   //add to search array

  $itemSearchArray['itemID']=$productID;
  $itemSearchArray['type']='Product';
  $itemSearchArray['photo']=$proImage;
  $itemSearchArray['itemName']=$proName;
  $itemSearchArray['itemDes']=$proDes;
  $searchArray[$itemCount]=$itemSearchArray;
}//end foreach
    


?>
<!-- start navbar -->
<nav class="navbar navbar-expand-md navbar-light fixed-top nav-menu justify-content-between" style="height: 61px !important;">
    <!-- start brand -->
        <!-- start Logo -->
        <a class="navbar-brand" href="#"><h2 class="text-light heading"><span class="o">SKA</span>SH<span class="cart-span"><i class="fa fa-shopping-cart o"></i></span>P</h2>
        </a>
        <!-- End Logo -->
        <!-- Start Icons -->
        <ul class="icon">
            <!-- Search -->
            <li class="icon-item nav-item li-search">
                <a class=" text-light"><i class="fa fa-search icon-items"></i>
                </a>
            </li>
         <!-- End search -->
         <!--Language link icon--> 
         <li class="dropdown icon-item nav-item" data-toggle="dropdown">
            <a class=" text-light dropdown-toggle"  href="#"><i class="fa fa-globe icon-items mr-3"></i></a>
            <div class="dropdown-menu" aria-labelledby="language">
                    <a class="dropdown-item" href="#">Arbic</a>
                    <a class="dropdown-item" href="#">English</a>
            </div>
         </li>
        <!-- User Account --> 
         <?php 
         //If has not an account
    
         if(!isset($_SESSION['UserID'])){
           ?>
            <li class="icon-item nav-item"><a class=" text-light"  title="You Have Not An Account" data-toggle="modal" data-target="#confirm"><i class="fa fa-user icon-items"></i></a></li>
         <?php
         }//end if (has an account )
        else{
            ?>
           <li class="icon-item nav-item"><a href="UserAccount.php" class=" text-light"  title="Go To Your Account"><i class="fa fa-user icon-items" style="border-radius: 50%;box-shadow: -1px 2px 5px 9px rgb(8 161 155);"></i></a></li>
            <?php
        }//end else  
        ?>
        <!-- End User Account --> 
        <!-- Shopping cart icon -->
        <?php 
         //If There is not a cart
         if(!isset($_SESSION['cartID'])){
           ?>
            <li class="icon-item nav-item" >
            <a class=" text-light" 
               href="#" 
               title="You Have Not Cart Click To Create Cart"
               data-toggle="modal"
               data-target="#confirm">
              <i class="fa fa-shopping-cart icon-items"></i>
            </a>
            </li>
           <?php
         }//end if (There is a cart )
        else{
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']=array();
                //store cart products
                $_SESSION['cart']=$cartPro->GetCartProducts($cartID);
             }//end if
           ?>
            <head>
              <style>
                  .cart-icon::after {
                  content: "<?php echo count($_SESSION['cart']) ;?>";
                  }
              </style>
            </head>
            <li class="icon-item nav-item" style="position: relative">
            <a class=" text-light cart-icon" 
            href="ShoppingCart.php" 
            title="Go To Your Cart">
            <i class="fa fa-shopping-cart icon-items"></i>
            </a>
            </li>
        <?php
        }//end else
        ?>
        <!-- End Shopping cart icon -->
        
        <li class="icon-item nav-item" ><a class=" text-light" href="#"><i class="fa fa-map-marker icon-items mr-2"></i></a></li>
         <li class="icon-item nav-item" ><a class=" text-light" href="#"><i class="fa fa-angle-down slidBar mr-0 icon-items"></i></a></li>   
     </ul>
    <!-- End Icons -->
    <!-- End brand -->
</nav>
<div class="h-link-list wow bounceInDown">
            <!--Start nav link list -->
        <ul class="ul1">
            <li class="link-list nav-active">
                <a class="nav-link text-uppercase  mr-1" href="Home.php" >Home</a>
            </li>
            <li class="link-list"><a class="nav-link text-uppercase mr-1" href="ShowProducts.php" >Products</a></li>
            
            <li class="dropdown link-list">
                <!--Generate Catogeries List--> 
                <a class="nav-link text-uppercase mr-1 dropdown-toggle text-light" data-toggle="dropdown">Categories
                </a>
                <!--Dropdown list (Categories Names)-->
                    <ul class="dropdown-menu">
                        <?php
                        //Generate drowpdown from categories names 
                        foreach($categoryArray as $key=>$value){
                          //Category Data
                          $itemCount++;
                          $CategoryID=$categoryArray[$key];
                          CatogeryObject($category,$CategoryID);
                          $CategName=$category->getCatogName();
                          $CategDes=$category->getCatogDes();
                          $CategPhoto=$category->getCatoPhoto(); 
                          $categorylink="Category.php?categoryID=$CategoryID";
                            
                            //add to search array 
                          
                          $itemSearchArray['itemID']=$CategoryID;
                          $itemSearchArray['type']='Category';
                          $itemSearchArray['photo']=$CategPhoto;
                          $itemSearchArray['itemName']=$CategName;
                          $itemSearchArray['itemDes']=$CategDes;
                          
                          $searchArray[$itemCount]=$itemSearchArray;
                        ?>
                        <li><a class="dropdown-item text-dark" href="<?php echo $categorylink ; ?>"><?php echo $CategName; ?></a></li>
                        <?php
                        }//end foreach
                        ?>
                      </ul>
                    </li>             
            <li class="dropdown link-list">
                <!--Generate Stores List--> 
                <a class="nav-link text-uppercase mr-1 dropdown-toggle text-light" data-toggle="dropdown">Stores
                </a>
                <!--Dropdown list (Stores Names)-->
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-dark" href="Stores.php" style="color: #3fbbaa !important;">All Stores</a></li>
                        <?php
                        //Generate drowpdown from stores names 
                        foreach($storeArray as $key=>$value){
                          $itemCount++;
                          $storeID=$storeArray[$key];
                          StoreObject($store,$storeID);
                          $storeName=$store->getStoreName();
                          $storeDes=$store->getStoreDes();
                          $storePhoto=$store->getStorePhoto();
                          $storelink="Show_Store.php?storeID=$storeID";
                            
                           //add to search array 
                          
                          $itemSearchArray['itemID']=$storeID;
                          $itemSearchArray['type']='Store';
                          $itemSearchArray['photo']=$storePhoto;
                          $itemSearchArray['itemName']=$storeName;
                          $itemSearchArray['itemDes']=$storeDes;
                          $searchArray[$itemCount]=$itemSearchArray;
                        ?>
                        <li><a class="dropdown-item text-dark" href="<?php echo $storelink ; ?>"><?php echo $storeName; ?></a></li>
                        <?php
                        }//end foreach
                        ?>
                      </ul>
                    </li>
              
              
            <li class="link-list"><a class="nav-link text-uppercase mr-1" href="#" >ِAbout</a></li>
            <li class="link-list"><a class="nav-link text-uppercase mr-1" href="#" >Contact</a></li>    
         </ul>
    
        
        <!--Start nav link list -->
</div>

<?php 
include 'Modal/search_div.php';
?>
<!-- End navbar -->

<script>
       $('.li-search').click(function(){
       $('.li-search a i').hide();
       $('.search-div').slideToggle(500);
    });
    $('.search-div .fa-close').click(function(){
       $('.search-div').fadeOut() ;
       $('.li-search a i').show();
    });
</script>