<?php

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

<!-- top-nav -->
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top top-navbar">
              <div class="row pt-2 pb-2">
                <div class="col">
                  <h4 class="basal-color text-uppercase mb-0"><?php echo $Name ;?></h4>
                </div>                
                <div class="col" style="display: flex;justify-content: flex-end;">
                  <ul class="icon" style="margin-bottom: 0px !important;">
                      <!-- Search -->
                      <li class="icon-item nav-item li-search"><a class=" text-light" ><i class="fa fa-search icon-items"></i>
                        </a>
                      </li>
                      <!-- End Search -->
                      <!-- language -->
                      <li class="dropdown icon-item nav-item" data-toggle="dropdown">
                        <a class=" text-light dropdown-toggle"  href="#"><i class="fa fa-globe icon-items mr-0"></i></a>
                        <div class="dropdown-menu" aria-labelledby="language">
                                <a class="dropdown-item" href="#">Arbic</a>
                                <a class="dropdown-item" href="#">English</a>
                        </div>
                     </li>
                      <!-- End language -->
                      <!-- Map Marker --> 
                      <li class="icon-item nav-item" ><a class=" text-light" href="#"><i class="fa fa-map-marker icon-items"></i></a></li>
                      <!--End Map Marker --> 
                      <!-- Bell--> 
                      <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fa fa-bell text-light fa-lg"></i></a></li>
                      <!--End Bell --> 
                      <!-- Sign out--> 
                      <li class="icon-item nav-item" ><a class=" text-light" href="Home.php"><i class="fa fa-sign-out icon-items text-danger"></i></a></li>
                      <!--End Sign ou --> 
                  </ul>
                    <!-- Search Form  --> 
                     <?php include 'Modal/search_div.php'; ?>
                    <!-- End Search Form  --> 
                </div>
              </div>
            </div>
            <!-- end of top-nav -->
    <!-- End sidebar -->
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