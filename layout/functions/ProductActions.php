<?php 
 include 'functions/ProductClass.php';
require_once('functions/CartProductsClass.php');
include "functions/Check_errors/ckeck_image.php";
//Define object from Product class
$product= new Product();
//Define Object From CartProductsClass
$cartPro=new CartProducts();
//Define object from CkeckErrors class
$ckeckErrors= new CkeckErrors();

$coinsArray=array();
$coinsArray=['$'=>'Dolar','R.Y'=>'Rial Yemeni','R.S'=>'Rial Saudi','€'=>'Yoro'];
$quantityType=array();
$quantityType=['piece(s)','packet'];


//Product Data In Object
 function ProductObject($product,$productID){
       //Get Product Data Via Id
       //Get Image From Folder
       $imageURL = 'images/upload/';
       //Array To Storing Product Data
       $productArray=array();
       $productArray=$product->GetProductData($productID);
       //Product Data
       $product->setProName($productArray['ProName']);
       $product->setPrice($productArray['Price']);
       $product->setProImage($imageURL.$productArray['Photo']);
       $product->setProDes($productArray['ProDes']);
       $product->setQuantity($productArray['Quantity']);
       $product->setProStatus($productArray['ProStute']);
       $product->setProStoreId($productArray['StoreID']);
       $product->setProCatogeryID($productArray['CategoryID']);
       $product->setCoins($productArray['Coins']);
       $product->setQuntityType($productArray['Quantity_type']);
      
    return $product;
}//end function
//Function To get All Products Of Store
function Product_Of_Store($storeID){
    //Define object from ProductClass
     $product= new Product();
    //Array Of Store's Products
     $StoreProductArray=$product->GetProduct_Of_Store($storeID);
    //Array To Store Store's Category
    $categoryArray=array();
     foreach($StoreProductArray as $key=>$value){
          $productID=$StoreProductArray[$key];
          //Product Object To Get Its Data 
          ProductObject($product,$productID);
          //Product Catogery
          $proCategoryID =$product->getCatogeryID();
          //Store Category ID
          $categoryArray[$proCategoryID]=$proCategoryID;
     }//end foreach
    return $categoryArray;
}//end function
if ($_SERVER['REQUEST_METHOD']=='POST') {
    //Check Add Product Form 

    if (isset($_POST['Add_Product'])){
    //Storing value from form in varibles
	$name=filter_var($_POST['proName'], FILTER_SANITIZE_STRING);
	$des=filter_var($_POST['proDes'], FILTER_SANITIZE_STRING);
	$price=$_POST['proPrice'];	
	$quantity=$_POST['proQuantity'];        
	$categoryID=$_POST['categories'];
    $coins=$_POST['coins'];
    $quntityType=$_POST['quantityType'];
        
    $status=$_POST['status'];
     if(isset($_POST['Stores'])){
        $storeID=$_POST['Stores'];
    }//end if
     else if(isset($_POST['store'])){
        $storeID=$_POST['store'];
    }//end if
    if(isset($_SESSION['StoreID'])){
          $storeID=$_SESSION['StoreID'];
     }//end if  
        //Status value
    if($status=="1"){
        $statusVal="Available";
    }
     else if($status=="0"){
        $statusVal="Locked";
     }
      else if($status=="2"){
        $statusVal="Approved";
     }
        
    //value of image
    $image=$_FILES['ProImg'];
	$img_name=$image['name'];
	$img_error=$image['error'];
	$img_size=$image['size'];
	$temPath=$image['tmp_name'];
	$NewPath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';
    //if image do not upload
     if(!$ckeckErrors->ImageIsUploaded($img_error)){
        $img_name='img2.png'; 
     }//end if
    $ImageErrors=array();
    //Check Image Errors
     $ImageErrors=$ckeckErrors->CheckImageErrors($img_size,$img_name);
	if(empty($ImageErrors)){
    //Insert Values to Product Table
	$product->InsertProduct($name,$des,$price,$quantity,$img_name,$categoryID,$storeID,$status,$coins,$quntityType);
		//Upload Image to File
	    move_uploaded_file($temPath,$NewPath.$img_name);	 
	}//end if
	else{
	//print Errors
	$errorstore="";
	foreach($ImageErrors as $error){
		 $errorstore=$errorstore.'<br>'.$error;
	 }//end foreach
		//Print Errors
		$ckeckErrors->PrintInAlertDanger($errorstore);
	  }//end else
    }//end if
    //End Check Add Product Form 
    //Check Update Product Form 
	if (isset($_POST['Update_Product'])) { 
	//Storing value from form in varibles
	$name=filter_var($_POST['proName'], FILTER_SANITIZE_STRING);
	$des=filter_var($_POST['proDes'], FILTER_SANITIZE_STRING);
	$price=$_POST['proPrice'];	
	$quantity=$_POST['proQuantity'];
    $coins=$_POST['coins'];
    $quntityType=$_POST['quantityType'];   
	
	$categoryID=$_POST['categories'];
	$status=$_POST['status'];
	//Get value from session
	//$SelectedID = $_REQUEST["selectedID"];
	$SelectedID =$_POST['selectedID'];
    if(isset($_POST['Stores'])){
          $storeID=$_POST['Stores'];
     }//end if
     if(isset($_SESSION['StoreID'])){
          $storeID=$_SESSION['StoreID'];
     }//end if        
        
    $productArray=array();
    $productArray=$product->GetProductData($SelectedID);
    //To get existing image
    $existImage=$productArray['Photo'];
    //Status value
        if($status=="1"){
            $statusVal="Available";
        }
        else if($status=="0"){
            $statusVal="Locked";
     }
        else if($status=="2"){
            $statusVal="Approved";
     }
        
    if(isset($_FILES['ProImg'])){
    $image=$_FILES['ProImg'];
     //data of image
	$img_name=$image['name'];
	$img_error=$image['error'];
	$img_size=$image['size'];
	$temPath=$image['tmp_name'];
	$NewPath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';  
    //if image do not upload
        if(!$ckeckErrors->ImageIsUploaded($img_error)){
        $img_name=$existImage;
        }//end if
     //if(!$product->ImageIsUploaded($img_error)){
       // $img_name='img2.png'; 
    // }//end if
        
    $ImageErrors=array();
    //Check Image Errors
     $ImageErrors=$ckeckErrors->CheckImageErrors($img_size,$img_name);
	if(empty($ImageErrors)){
		//Update Values to Product Table
	$product->UpdateProduct($name,$des,$price,$quantity,$img_name,$status,$categoryID,$SelectedID,$coins,$quntityType);
		//Upload Image to File
	    move_uploaded_file($temPath,$NewPath.$img_name);	 
	}//end if
	else{
	//print Errors
	$errorstore="";
	foreach($ImageErrors as $error){
		 $errorstore=$errorstore.'<br>'.$error;
	 }//end foreach
		//Print Errors
		$ckeckErrors->PrintInAlertDanger($errorstore);
	  }//end else
    }
    
	 }//end if
    //End Check Add Update Form 
    //Delete Product
    if(isset($_POST['Delete_Product'])){
        $SelectedID = $_POST["delete_ItemID"];
        $cartPro->DelProductFromcarts($SelectedID);
        $product->DeleteProduct($SelectedID);
    }
    //End Delete Product
}//end if
?>                                                                    