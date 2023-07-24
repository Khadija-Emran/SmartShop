<?php 
 if (isset($_POST['selectedID'])){
    $selectedID=$_POST['selectedID'];
    echo $selectedID;
}
$Selected_ID=1;
?>
<?php
require_once('ConnectDB.php');
class Product extends ConnectDB {
	//variables
	public $ProductID;
	public $proName;
	public $proDes;
	public $Price;
	public $proQuantity;
	public $proImage;
   
	//Set errors in array 
	public $errors=array();

	//functions 
	//Set Product ID
	public function setProductID($ProductID){
        $this->ProductID=$ProductID;
     }
	//Get User ID
	public function getProductID(){
        return $ProductID;
    }
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
		return false;
	 }//end if
     else
        return true;
	}//end function
	
	//Check Image Size
	public function ImageSize($img_size){
	if($img_size>60000000000000){
		return false;
	 }//end if
    else
        return true;
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
		return false;
	  }//end if
    else
        return true;
	}//end function 
   //Check Image Errors
    public function CheckImageErrors($img_error,$img_size,$img_name){
        $ImageErrors=array();
        //check image uploading
        if(!$this->ImageIsUploaded($img_error)){
            $ImageErrors[]="Image Dose Not Uploaded";
        }
        //check image size
        if(!$this->ImageSize($img_size)){
            $ImageErrors[]="Image Is Too Big";
        }
        //check image extension
        if(!$this->AllowImageExten($img_name)){
            $ImageErrors[]="Image Extension Not Valid Your Extension Image Must Be jpg or jpeg or png";
        }
        return $ImageErrors;        
    }	
	
	//Create Row of Product
	public function CreateProductRow($i,$photo,$ProName,$Price,$ProID){
        $Selected_ID=$ProID;
		  echo'<tr>' ;
			 echo'<th>'.$i.'</th>' ;
		     echo'<th><img src='.$photo.' width=60 height=60/></th>' ;
			 echo'<th>'.$ProName.'</th>' ;
	         echo'<th>'.$Price.'</th>' ;
	         echo '<td>
			 <a 
			 data-toggle="modal"
			 data-target="#update-product"
			 title="edit this product" 
			 data-placement="top"
             id="'.$ProID.'"
             >
			 <i class="fa fa-edit fa-lg text-success">
			 </i>
			 </a>
			 </td>';
		     echo 
            '<td>
			 <a
             class="deleteButton"
             data-toggle="modal"
			 title="delete this product" 
			 data-placement="top" 
			 data-target="#delete-product"
             id="'.$ProID.'"
             >
			 <i class="fa fa-trash fa-lg text-danger" >
			 </i>
			 </a>
			 </td>';
		   echo'</tr>';
		  
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
	
	//Print Errors In Alert-Success Div
	public function PrintInAlertSuccess($success){
		echo '<div class="error alert alert-success  alert-dismissible " role="start">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">';
		echo'<span aria-hidden="true">&times;</span>';
		echo '</button>';
		echo $success; 
		echo'</div>';
	}//end function
	
	//Work With DataBase
	
    //Insert Product Data To DataBase
    public function InsertProduct($proName , $proDes ,$Price ,$proQuantity , $proImage,$categoryID,$storeID){
		//call function to connected db from ConnectDB class
	   $db=$this->connectDB();
      $insertProduct ="INSERT INTO product (ProName , ProDes , Price , Quantity , Photo , CategoryID ,StoreID) VALUES ('$proName','$proDes','$Price',2,'".$proImage."',$categoryID,1)";
		$resultProduct=mysqli_query($db,$insertProduct);
			 if($resultProduct===TRUE){
				  //get id
				 $ProductID= mysqli_insert_id($db);
				 $_SESSION['Product_name']=$proName;
				 $_SESSION['ProductID']=$ProductID;
				 }//end if
              else{
				echo "Error: " . $insertProduct . "<br>" . $db->error;
		  }//end else
		$db->close();
        }//end function
	
	//Get Product Data Via ID
    public function GetProductData($id){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
	    //Array To Store Fetched Data
		$productArray=array();
		// query for get user data 
		$query_select = "SELECT * FROM product WHERE ID = $id ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from user table
			 $res=mysqli_fetch_assoc($result);			 
		     $productArray['ProID']=$res['ProID'];
			 $productArray['ProName']=$res['ProName'];
			 $productArray['ProDes']=$res['ProDes'];
		     $productArray['Price']=$res['Price'];
			 $productArray['Quantity']=$res['Quantity'];
			 $productArray['Photo']=$res['Photo'];
			 $productArray['CategoryID']=$res['CategoryID']; 
			 $productArray['StoreID']=$res['StoreID'];
			 $productArray['ProStute']=$res['ProStute'];
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $productArray;
        }//end function
	
	//Update Product
    public function UpdateProduct($name,$des,$price,$quantity,$photo,$stute,$id){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for update product data 
		$updateProduct="UPDATE product SET ProName ='".$name."', ProDes = '".$des."' , Price ='".$price."' , Quantity ='".$quantity."', Photo ='".$photo."',ProState='".$stute."' WHERE ProID ='".$id."'";	
		 $result=mysqli_query($db,$updateProduct);
		 if($result===TRUE){
			 $_SESSION['User_name']=$name;
			 return true;
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $updateProduct . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
	
	//Count Row Of table in DB
    public function GetProductCount(){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for get user data 
		$query_select = " SELECT * FROM product ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from user table
			 $countRow=0;
			 while($res=mysqli_fetch_assoc($result)){
				$countRow++; 
			 }//end while		 
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $countRow;
        }//end function
	
	//Get All Row of Product Data 
    public function GetAllProduct(){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		//Storing Data in Array
		$All_Row=array();
		$one_Row=array();
		//Row Number
		$row_num=0;
		// query for get user data 
		$query_select = " SELECT * FROM product ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from user table
			 while($res=mysqli_fetch_assoc($result)){
				 $one_Row=null;
				 $row_num=$row_num+1;
				 $one_Row['ProID']=$res['ProID'];
				 $one_Row['ProName']=$res['ProName'];
				 $one_Row['ProDes']=$res['ProDes'];
				 $one_Row['Price']=$res['Price'];
				 $one_Row['Quantity']=$res['Quantity'];
				 $one_Row['Photo']=$res['Photo'];
				 $one_Row['CategoryID']=$res['CategoryID']; 
				 $one_Row['StoreID']=$res['StoreID'];
				 $one_Row['ProStute']=$res['ProStute'];
				 $All_Row[$row_num]=$one_Row;
			 }//end while	
			 
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $All_Row;
        }//end function
    
    //Delete Product
    public function DeleteProduct($id){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for delete product data 
		$deleteProduct="DELETE FROM product WHERE ProID=$id";	
		 $result=mysqli_query($db,$deleteProduct);
		 if($result===TRUE){
			 return true;
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $deleteProduct . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
    public function GetSelectedID(){
    if (isset($_POST['selectedID'])){
    $selectedID=$_POST['selectedID'];
        return $selectedID;
     }       
      else{
         return 'null';
     }
    }//end function
	//End Work With DataBase
	}//end class

?>