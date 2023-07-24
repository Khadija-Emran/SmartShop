<!-- Start Section -->
<section class="new-products">
  <!--  Container -->
      <div class="container">
<!--  Products Row--> 
        <div class="row mb-4 allProducts "> 
       <?php
    //if there is not any products
    if(count($productArray)==0){
        $message="<div class='alert alert-info alert-dismissible text-center row' role='start' style='display: block;'>
        There IS Not Any Products 
        </div>";
        echo $message;
    }//end if   
    else{
    foreach($productArray as $key=>$value){
          $ProID=$productArray[$key];
          ProductObject($product,$ProID);
          $ProName=$product->getProName();
          $Price=$product->getPrice();
          $coin=$product->getCoins();
          $imageURL=$product->getProImage();
          $Stute=$product->getProStatus();
          $ProDes=$product->getProDes();
          $Quantity=$product->getQuantity();
          $quntityType=$product->getQuntityType();
          $CategoryID =$product->getCatogeryID();
          $storeID=$product->getStoreId();
            //Product Card 
            include 'Modal/Product/Product_Card.php';
        }//end foreach
    }//end else
    ?>
          </div>
  <!-- End Products Row-->
    </div>
  <!-- End Container -->
</section>
<!-- End Section -->