<?php
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
//Selected Product Data
$cartID=$_SESSION['cartID'];
$productID=$_GET['productID'];
$quantity=$_GET['qun'];
$price=$_GET['price'];
//Add Product Data To CartArray
$cartProduct=array();
$cartProduct['ProductID']=$productID;
$cartProduct['ProCount']=$quantity;
$cartProduct['TotalQunPrice']=$price;

// check if the item is in the array, if it is, do not add
if(array_key_exists($productID, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: ../../ShowProducts.php?action=exists&productID='.$productID);
}
// else, add the item to the array
else{
    $_SESSION['cart'][$productID]=$cartProduct;
    // redirect to product list and tell the user it was added to cart
    header('Location: ../../ShowProducts.php?action=added');
}
?>
