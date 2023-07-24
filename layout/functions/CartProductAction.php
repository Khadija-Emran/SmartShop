<?php


///////////////////// have not used yet 

 include 'functions/CartProductAction.php';
//object from CartProductsClass
 $cartPro=new CartProducts();
if ($_SERVER['REQUEST_METHOD']=='POST') {
//Add Product To Cart
    if(isset($_POST['add_to_cart'])){
        //session_start();
        $action = isset($_GET['action']) ? $_GET['action'] : "action";
        echo $action;
        $cartID=$_SESSION['cartID'];
        $productID= $_POST['productID'];
        $price= $_POST['price'];
        if(isset($cartID)){
        //Get product of cart 
         cartProObject($cartPro,$cartID,$productID);
        //Get quantity of product in cart  
         $proCount=1;
         $QunPrice=$proCount*$price;
         $cartPro->AddToCart($cartID,$productID,$proCount,$QunPrice);
        }//end if
        echo $cartID;
    }//end if
    //End Add Product To Cart
}
//Get Product in cart Data Via Id 
function cartProObject($cartPro,$cartID,$productID){
 //Array To Storing Product in Cart Data
       $cartProArray=array();
       $cartProArray=$cart->GetCartData($cartID);
       //Product Data
       $cart->setCartID($cartProArray['CartID']);
       $cart->setProductID($cartProArray['ProductID']);
       $cart->setProCount($cartProArray['ProCount']);
       $cart->setQunPrice($cartProArray['TotalQunPrice']);
    return $cartPro;
}//end function

?>