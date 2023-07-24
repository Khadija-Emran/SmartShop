<?php
session_start();
//cart session
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}//end if
//Selected Product Data
$cartID=$_SESSION['cartID'];
$productID=$_GET['productID'];
$quantity=$_GET['qun'];
$price=$_GET['price'];
//Cart Variables
$_SESSION['ProductPrice']=$price;

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
    //add cart to session
    $_SESSION['cart'][$productID]=$cartProduct;
    // redirect to product list and tell the user it was added to cart
    header('Location: ../../ShowProducts.php?action=added');
}
?>