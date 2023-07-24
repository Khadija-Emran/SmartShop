<!-- Start Section -->
<section class="new-products">
  <!--  Container -->
      <div class="container">
<!--  Products Row--> 
        <div class="row mb-4 allProducts "> 
       <?php
    foreach($storeArray as $key=>$value){
      $storeID=$storeArray[$key];
      StoreObject($store,$storeID);
      $storeName=$store->getStoreName();
      $storeDes=$store->getStoreDes();
      $imageURL=$store->getStorePhoto();
      $sellerID=$store->getSellerID();
      $available=$store->getAvailable();
      $location=$store->getLocation();
      //User Object To Get User Data
      UserObject($user,$sellerID);
      //Store Owner Data 
      $sellerName=$user->getUserName();
      $phoneNo1=$user->getPhoneNo1();
      $phoneNo2=$user->getPhoneNo2();
        //Product Card 
        include 'Modal/Store/store_card.php';
    }//end foreach
    ?>
          </div>
  <!-- End Products Row-->
    </div>
  <!-- End Container -->
</section>
<!-- End Section -->