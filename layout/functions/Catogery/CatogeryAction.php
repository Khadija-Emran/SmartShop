<?php
include 'functions/CatogeryClass.php';
//Define object from Category class
 $category= new Category();
if(isset($_POST['add_category'])) {
    $name=filter_var($_POST['Sname'], FILTER_SANITIZE_STRING);
	$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
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
     $ImageErrors=$category->CheckImageErrors($img_error,$img_size,$img_name);
	if(empty($ImageErrors)){
     //insert Store Data
	 $addCategory=$category->AddCategory($name,$des,$img_name);
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
		$category->PrintInAlertDanger($errorstore);
	  }//end else	
}//end if
if(isset($_POST['update_category'])) {
    $name=filter_var($_POST['Sname'], FILTER_SANITIZE_STRING);
	$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
    $categoryID=$_POST['selectedID'];
	//value of image
    $image=$_FILES['ProImg'];
	$img_name=$image['name'];
	$img_error=$image['error'];
	$img_size=$image['size'];
	$temPath=$image['tmp_name'];
	$NewPath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';
          $categoryArray=array();
          $categoryArray=$user->GetUserData($categoryID);
           //To get existing image
          $existImage=$categoryArray['Photo'];
          //if image do not upload
        if(!$ckeckErrors->ImageIsUploaded($img_error)){
        $img_name=$existImage;
        }//end if
    $ImageErrors=array();
    //Check Image Errors
     $ImageErrors=$ckeckErrors->CheckImageErrors($img_size,$img_name);
	if(empty($ImageErrors)){
     //insert Store Data
	 $updateCategory=$category->UpdateCategory($categoryID,$name,$des,$img_name);
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
		$category->PrintInAlertDanger($errorstore);
	  }//end else	
}//end if

//delete category
 if(isset($_POST['final_delet_category'])){
    $selectID=$_POST['delete_ItemID'];
    if($product->DeleteProduct_of_Category($selectID)){
            if(!$category->DeleteCategory($selectID)){
              $message="Can Not Delete Store";
              echo AlertDanger($message);  
            }//end if
          }//end if
            else{
              $message="Can Not Delete Products Of The Store";
              echo AlertDanger($message);   
            }
 }//end if
//Category Data In Object
 function CatogeryObject($category,$categoryID){
       //Get Category Data Via Id
       //Get Image From Folder
       $imageURL = 'images/upload/';
       //Array To Storing Category Data
       $categoryArray=array();
       $categoryArray=$category->GetCatogeryData($categoryID);
       //Product Data
       $category->setCatogeryID($categoryArray['CategoryID']);
       $category->setCatogName($categoryArray['CategName']);
       $category->setCatoPhoto($imageURL.$categoryArray['Photo']);
       $category->setCatogDes($categoryArray['CategDes']);      
    return $category;
}//end function
?>