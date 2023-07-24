
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
    public $Status;
    public $catogeryID;
    public $storeId;
    public $coins;
    public $quntityType;
   
	//Set errors in array 
	public $errors=array();

	//functions 
	//Set Product ID
	public function setProductID($ProductID){
        $this->ProductID=$ProductID;
     }
	//Get Product ID
	public function getProductID(){
        return $this->ProductID;
    }
	//Set Product Name
	public function setProName($proName){
        $this->proName=$proName;
     }
	//Get Product Name
	public function getProName(){
        return $this->proName;
    }
	//Set Product Description
    public function setProDes($proDes){
        $this->proDes=$proDes;
     }
	//Get Product Description
     public function getProDes(){
        return $this->proDes;
    }
    //Set Product Price
     public function setPrice($Price){
        $this->Price=$Price;
     }
	//Get Product Price
	public function getPrice(){
        return $this->Price;
    }
	//Set Product Quantity
	    public function setQuantity($proQuantity){
        $this->proQuantity=$proQuantity;
     }
	//Get Product Quantity
    public function getQuantity(){
        return $this->proQuantity;
    }
	//Set Product Image
	public function setProImage($proImage){
        $this->proImage=$proImage;
     }
	//Get Product Image
    public function getProImage(){
        return $this->proImage;
    }
    //Set Product Status
	public function setProStatus($Status){
        $this->Status=$Status;
     }
	//Get Product Status
    public function getProStatus(){
        return $this->Status;
    }
    //Set Product Catogery
	public function setProCatogeryID($catogeryID){
        $this->catogeryID=$catogeryID;
     }
	//Get Product Catogery
    public function getCatogeryID(){
        return $this->catogeryID;
    }
    //Set Product Store
	public function setProStoreId($storeId){
        $this->storeId=$storeId;
     }
	//Get Product Store
    public function getStoreId(){
        return $this->storeId;
    }
    //Set Coins
	public function setCoins($coins){
        $this->coins=$coins;
     }
	//Get Coins
    public function getCoins(){
        return $this->coins;
    }
    
    //Set quntityType
	public function setQuntityType($quntityType){
        $this->quntityType=$quntityType;
     }
	//Get quntityType
    public function getQuntityType(){
        return $this->quntityType;
    }
   
	//Work With DataBase
	
    //Insert Product Data To DataBase
    public function InsertProduct($proName , $proDes ,$Price ,$proQuantity , $proImage,$categoryID,$storeID,$status, $coins,$quntityType){
		//call function to connected db from ConnectDB class
	   $db=$this->connectDB();
      $insertProduct ="INSERT INTO product (ProName , ProDes , Price , Quantity , Photo , CategoryID ,StoreID,ProStute,Coins,Quantity_type) VALUES ('$proName','$proDes','$Price','$proQuantity','".$proImage."',$categoryID,$storeID,$status,'".$coins."','".$quntityType."')";
        $ProductID= mysqli_insert_id($db);
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
		// query for get product data 
		$query_select = "SELECT * FROM product WHERE ProID = $id ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 $res=mysqli_fetch_assoc($result);
             //if($res['ProStute']!=2){
		     $productArray['ProID']=$res['ProID'];
			 $productArray['ProName']=$res['ProName'];
			 $productArray['ProDes']=$res['ProDes'];
		     $productArray['Price']=$res['Price'];
			 $productArray['Quantity']=$res['Quantity'];
			 $productArray['Photo']=$res['Photo'];
			 $productArray['CategoryID']=$res['CategoryID']; 
			 $productArray['StoreID']=$res['StoreID'];
			 $productArray['ProStute']=$res['ProStute'];
             $productArray['Quantity_type']=$res['Quantity_type'];
			 $productArray['Coins']=$res['Coins'];
             //}//end if
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $productArray;
        }//end function
	
	//Update Product
    public function UpdateProduct($name,$des,$price,$quantity,$photo,$stute,$categoryID,$id,$coins,$quntityType){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for update product data 
		$updateProduct="UPDATE product SET ProName ='".$name."', ProDes = '".$des."' , Price ='".$price."' , Quantity ='".$quantity."', Photo ='".$photo."',ProStute='".$stute."' ,CategoryID='".$categoryID."' ,Coins='".$coins."'  ,Quantity_type='".$quntityType."'  WHERE ProID ='".$id."'";	
		 $result=mysqli_query($db,$updateProduct);
		 if($result===TRUE){
			 return true;
			}//end if 
		 else{
			echo "<p class='text-danger'>Error: " . $updateProduct . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
	
	//Count Row Of table in DB
    public function GetProductCount(){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for get product data 
		$query_select = " SELECT * FROM product ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
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
		// query for get product ID 
		$query_select = " SELECT ProID FROM product ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 while($res=mysqli_fetch_assoc($result)){
                 //if($res['ProStute']!=2){
				 $productID=$res['ProID'];
				 $All_Row[$productID]=$productID;
                // }//end if
			 }//end while	 
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $All_Row;
        }//end function
    
    
    //Get All Row of Products Via Catogery
    public function GetProViaCato($CategoryID){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		//Storing Data in Array
		$All_Row=array();
		// query for get product data 
		$query_select = " SELECT ProID FROM product WHERE CategoryID = $CategoryID";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 while($res=mysqli_fetch_assoc($result)){
                // if($res['ProStute']!=2){
				 $productID=$res['ProID'];
				 $All_Row[$productID]=$productID;
                // }//end if
			 }//end while	
			 
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $All_Row;
        }//end function
    
    //Get Products of Store
    public function GetProduct_Of_Store($storeID){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		//Storing Data in Array
		$All_Row=array();
		// query for get product data 
		$query_select = " SELECT ProID FROM product WHERE StoreID = $storeID";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 while($res=mysqli_fetch_assoc($result)){
                 //if($res['ProStute']!=2){
				 $productID=$res['ProID'];
				 $All_Row[$productID]=$productID;
                 //}//end if
			 }//end while	
			 
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $All_Row;
        }//end function 
    
    //Delete Product
    public function DeleteProduct($id){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for delete product data 
		$deleteProduct="DELETE FROM product WHERE ProID = $id";	
		 $result=mysqli_query($db,$deleteProduct);
		 if($result==TRUE){
			 return true;
			}//end if 
		 else{
			echo "<p class='text-danger'>Error: " . $deleteProduct . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
     
    
    //Delete Product Of Store
    public function DeleteProduct_of_Store($storeID){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for delete product data 
		$deleteProduct="DELETE FROM product WHERE StoreID = $storeID";	
		 $result=mysqli_query($db,$deleteProduct);
		 if($result==TRUE){
			 return true;
			}//end if 
		 else{
			echo "<p class='text-danger'>Error: " . $deleteProduct . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
    
     //Delete Product Of Store
    public function DeleteProduct_of_Category($category){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for delete product data 
		$deleteProduct="DELETE FROM product WHERE CategoryID = $category";	
		 $result=mysqli_query($db,$deleteProduct);
		 if($result==TRUE){
			 return true;
			}//end if 
		 else{
			echo "<p class='text-danger'>Error: " . $deleteProduct . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
    
    
	//End Work With DataBase
	}//end class

?>