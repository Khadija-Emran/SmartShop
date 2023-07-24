<style>
    .seized::after {
    content: "#";
    font-size: 11px;
    position: absolute;
    top: 238px;
    left: 228px;
    height: auto;
    padding: 5px 9px !important;
    width: auto;
    background-color: #167b00;
    border-radius: 50%;
    }
</style>

<?php

session_start();
echo $_SESSION['User_name']; echo '<br>';
echo $_SESSION['UserID'];echo '<br>';
echo $_SESSION['cartID']; echo '<br>';
?>
<!-- Start Section -->
<section class="new-products">
  <!--  Container -->
      <div class="container"> 
<?php include 'temp/ini.php';
$ProductActionsPath;
include 'functions/ProductActions.php';
?>
<?php
 //Product Card 
          ProductObject($product,37);
          $ProID=37;
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
   
include 'Modal/Product/productOptions.php';
include 'Modal/Product/Product_Card.php';
$existImage="SELECT `Photo` FROM `product` WHERE `ProID`=$ProID";
          echo $existImage;
?>
    </div>
</section>
