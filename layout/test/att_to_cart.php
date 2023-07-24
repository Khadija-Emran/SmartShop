<?php
session_start();
if(!isset($_SESSION['item'])){
    $_SESSION['item'] = array();
}
$productID=$_GET['productID'];
$cart_item=array('productID'=>$productID);
// check if the item is in the array, if it is, do not add
if(array_key_exists($productID, $_SESSION['item'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: ../testCart.php?action=exists&productID='.$productID);
}
// else, add the item to the array
else{
    $_SESSION['item'][$productID]=$cart_item;
    // redirect to product list and tell the user it was added to cart
    header('Location: ../testCart.php?action=added');
}

?>