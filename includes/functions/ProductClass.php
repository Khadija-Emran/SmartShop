<?php

class Product{
	//variables
	public $ProductID;
	public $proName;
	public $proDes;
	public $Price;
	public $proQuantity;
	public $proImage;
	//Set errors in array 
	public $errors=array();

	//Constructor
	  function __construct($proName, $proDes ,$Price , $proQuantity , $proImage) {
		$this->proName=$proName;
		$this->proDes=$proDes;
		$this->Price=$Price;
	    $this->proQuantity=$proQuantity;
		$this->proImage=$proImage;
      }
	//functions 
	//Set Product Name
	public function setProName($proName){
        $this->proName=$proName;
     }
	//Get Product Name
	public function getProName(){
        return $proName;
    }
	//Set Product Description
    public function setProDes($proDes){
        $this->proDes=$proDes;
     }
	//Get Product Description
     public function getProDes(){
        return $proDes;
    }
    //Set Product Price
     public function setPrice($Price){
        $this->Price=$Price;
     }
	//Get Product Price
	public function getPrice(){
        return $Price;
    }
	//Set Product Quantity
	    public function setQuantity($proQuantity){
        $this->proQuantity=$proQuantity;
     }
	//Get Product Quantity
    public function getQuantity(){
        return $proQuantity;
    }
	//Set Product Image
	public function setProImage($proImage){
        $this->proImage=$proImage;
     }
	//Get Product Image
    public function getProImage(){
        return $proImage;
    }
	//Check Image Is Uploaded
	public function ImageIsUploaded($img_error){
	//Check If Image Is Not Uploaded
	if($img_error==4){
        $errors[]="Image Dose Not Uploaded";
		return false;
	 }//end if
	}//end function
	
	//Check Image Size
	public function ImageSize($img_size){
	if($img_size<1000000){
		$errors[]="Image Is Too Big";
		return false;
	 }//end if
	}//end function
	
	//Check Allow Images Extensions
	public function AllowImageExten($img_name){
	//Set Allow Images Extensions
	$allowed_extension=array('jpg','jpeg','png');
	//Get Image Extension
	$extension=explode('.', $img_name );
	$Img_extension=strtolower(end($extension));
	//Check If Extension Is Not Valid
	  if(!in_array($Img_extension,$allowed_extension)){
		$errors[]="Image Extension Not Valid Your Extension Image Must Be jpg or jpeg or png";  
	  }//end if
	else{
         return true;
	 }//end else
	}//end function 
    
	//Print Errors In Alert-Danger Div
	public function PrintInAlertDanger($error){
		echo '<div class="error alert alert-danger alert-dismissible " role="start">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">';
		echo'<span aria-hidden="true">&times;</span>';
		echo '</button>';
		echo $error; 
		echo'</div>';
	}//end function
	
    //Insert Product Data To DataBase
    public function InsertProduct($proName , $proDes ,$Price ,$proQuantity , $proImage,$categoryID,$storeID){
      $insertProduct ="INSERT INTO product (ProName , ProDes , Price , Quantity , Photo , CategoryID ,StoreID,uploaded_on) VALUES ( '$proName','$proDes','$Price','$proQuantity','".$proImage."',$categoryID,$storeID,NOW())";
		$resultProduct=mysqli_query($db,$insertProduct);
			 if($resultProduct===TRUE){
				 setcookie("User_Name",$name,time()+30*24*3600,"/");
				  //get id
				 $ProductID= mysqli_insert_id($db);
				 session_start();
				 $_SESSION['Product_name']=$proName;
				 $_SESSION['ProductID']=$ProductID;
				 }//end if
    }

}

?>