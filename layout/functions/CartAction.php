<?php
include $CartClassPath;
include $CartProductsClassPath;
include $ProductActionsPath;

//require_once('Modal/alert.php');
//Variables
//object from CartProductsClass
$cartPro=new CartProducts();
//object from CartClass
$cart=new Cart();
//Define object from ProductClass
$product= new Product();
//Array to store cart data
$cartArray=array();
//Array to store Product data
$allProducts=array();
$oneProduct=array();
//End Variables
//Functions
function SetCartData(){
    $cartArray=array();
    $cartArray['count']=count($_SESSION['cart']);
    $cartArray['subTotal']=0;
    $cartArray['total']=0;
    $subTotal=0;
    foreach($_SESSION['cart'] as $key=>$value){
       $TotalQunPrice=$_SESSION['cart'][$key]['TotalQunPrice'];
       $cartArray['subTotal']+=$TotalQunPrice;
    }//end foreach
       $cartArray['total']+=$cartArray['subTotal'];
    return $cartArray;
}//end function

//Get Cart Data Via Id
 function CartObject($cart,$cartID){
 //Array To Storing Cart Data
       $cartArray=array();
       $cartArray=$cart->GetCartData($cartID);
       //Product Data
       $cart->setCartID($cartArray['CartID']);
       $cart->setUserID($cartArray['UserID']);
       $cart->setSubTotal($cartArray['subTotal']);
       $cart->setTotalPrice($cartArray['TotalPrice']);
       $cart->setTotalProCount($cartArray['TotProCount']);
    return $cart;
}//end function
//save cart form 
if(isset($_POST['save_cart'])){
    $_SESSION['proQuan']=$_POST['product_count'];
    $_SESSION['quant_Price']=$_POST['quant_Price'];
    $_SESSION['cart_count']=$_POST['totProCount'];
    $_SESSION['cart_sub']=$_POST['subtotal'];
    $_SESSION['cart_total']=$_POST['total'];
    add_cart_to_db($_SESSION['cart']);
    $message="Saved";
    echo popMessage($message); 
}//end if
//end save cart form

//Remove product From cart (session)
    if(isset($_POST['del_cart_pro'])){
        $productID=$_POST['productID'];
        unset($_SESSION['cart'][$productID]);
        $message="Deleted";
        echo popMessage($message);
    }//end if
//Remove product From cart (session)
    
//Add products in cart to database 
function add_cart_to_db($cart){
    $cartID=$_SESSION['cartID'];
    $cart_in_DB=array();
    $cartPro=new CartProducts();
    $cart_in_DB=$cartPro->GetCartProducts($cartID);
    foreach($cart as $key=>$value){
       $productID=$cart[$key]['ProductID'];
        if(!array_key_exists($productID,$cart_in_DB)){
            //add cart to database
            $cartPro->AddToCart($cartID,$productID,$_SESSION['proQuan'],$_SESSION['quant_Price']);
            //update cart info
            //$cart->UpdateCartInfo($cartID,$_SESSION['cart_sub'],$_SESSION['cart_total'],$_SESSION['cart_count']);
        }//end if
        //otherwise if product exist in db and is not exist in cart session
        else{
            //check if product in db but is not in cart 
            foreach($cart_in_DB as $key=>$value){
             $productID=$cart_in_DB[$key]['ProductID']; 
              if(!array_key_exists($productID,$cart)){
                //Remove product from db
                $cartPro->DelProFcart($cartID,$productID);  
              }  //end if
            }//end foreach
        }
    }//end foreach
}//end function

//End Functions
?>