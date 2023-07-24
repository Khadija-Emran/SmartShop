
<?php
require_once('functions/StoreClass.php');
require_once('functions/ProductActions.php');
//require_once('Modal/alert.php');
//Define Object From StoreClass
 $store=new Store();
//Define object from CkeckErrors class
$ckeckErrors= new CkeckErrors();
//Create store
 if(isset($_POST['add_store'])) {
    //get data from session
     if(isset($_POST['storeOwner'])){
         $sellerID=$_POST['storeOwner'];
     }//end if
	//value from form
     
	$Sname=filter_var($_POST['Sname'], FILTER_SANITIZE_STRING);
	$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
	$location=filter_var($_POST['location'], FILTER_SANITIZE_STRING);	
	$available=$_POST['available'];
	//value from form
	 // available value
	 if($available=="0"){
		 $aval=0;
	 }
		 else if($available=="1"){
		 $aval=1; 
		 }
	 // end available value
	 //insert Store Data
	 //$insertStore=$store->InsertStore($sellerID,$Sname,$des,$aval,$location,$photo);
	 //if($insertStore){
		// echo 'seccess';
	 //}//end if
	// else{
		 //echo 'fail';
	 //}//end else
    
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
		//insert Store Data
	 $insertStore=$store->InsertStore($sellerID,$Sname,$des,$aval,$location,$img_name);
		//Upload Image to File
	    move_uploaded_file($temPath,$NewPath.$img_name);
        if(isset($_SESSION['UserID'])){
          header("location: SellerDashboard.php");
     }//end if
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

//delete store
 if(isset($_POST['final_delet_store'])){
    $selectID=$_POST['delete_ItemID'];
    if($product->DeleteProduct_of_Store($selectID)){
            if(!$store->DeleteStore($selectID)){
              $message="Can Not Delete Store";
              echo AlertDanger($message);  
            }//end if
          }//end if
            else{
              $message="Can Not Delete Products Of The Store";
              echo AlertDanger($message);   
            }
 }//end if

if(isset($_POST['update_store'])){
    
    if(isset($_POST['storeOwner'])){
         $sellerID=$_POST['storeOwner'];
     }//end if
     if(isset($_POST['selectedID'])){
         $storeID=$_POST['selectedID'];
     }//end if
    /*
    $storeID=$_POST['selectedID'];
    $sellerID=$_POST['storeOwner'];
    */
    echo '$storeID'.$storeID.' $sellerID'.$sellerID;
    $Sname=filter_var($_POST['Sname'], FILTER_SANITIZE_STRING);
    $des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
	$location=filter_var($_POST['location'], FILTER_SANITIZE_STRING);	
	$available=$_POST['available'];
    
    //value of image
    $image=$_FILES['ProImg'];
	$img_name=$image['name'];
	$img_error=$image['error'];
	$img_size=$image['size'];
	$temPath=$image['tmp_name'];
	$NewPath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';
    $storeArray=array();
    $storeArray=$store->GetStoreData($storeID);
    //To get existing image
    $existImage=$storeArray['StorePhoto'];
    //if image do not upload
        if(!$ckeckErrors->ImageIsUploaded($img_error)){
        $img_name=$existImage;
        }//end if
    
    $ImageErrors=array();
    //Check Image Errors
     $ImageErrors=$ckeckErrors->CheckImageErrors($img_size,$img_name);
	if(empty($ImageErrors)){
		//insert Store Data  
	 $UpdateStore=$store->UpdateStore($storeID,$sellerID,$Sname,$des,$available,$location,$img_name);
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
//Store Data In Object
 function StoreObject($store,$storeID){
       //Get Category Data Via Id
       //Get Image From Folder
       $imageURL = 'images/upload/';
       //Array To Storing Store Data
       $storeArray=array();
       $storeArray=$store->GetStoreData($storeID);
       //Product Data
       $store->setStoreID($storeArray['StoreID']);
       $store->setSellerID($storeArray['SellerID']);
       $store->setStorePhoto($imageURL.$storeArray['StorePhoto']);
       $store->setStoreName($storeArray['StoreName']);
       $store->setStoreDes($storeArray['StoreDes']); 
       $store->setAvailable($storeArray['Available']); 
       $store->setLocation($storeArray['Location']); 
    return $store;
}//end function
?>