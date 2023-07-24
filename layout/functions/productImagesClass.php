
<?php
require_once('ConnectDB.php');
class Product extends ConnectDB {
	//variables
	public $imageID;
	public $ProductID;
    public $imageName;
    
     //Set Product imageID
     public function setProductImageID($imageID){
        $this->imageID=$imageID;
     }
	//Get Product imageName
	public function getProductImageID(){
        return $this->imageID;
    
     //Set Product imageName
     public function setProductImage($imageName){
        $this->imageName=$imageName;
     }
	//Get Product imageName
	public function getProductImage(){
        return $this->imageName;
        
    
    
    //Work With DataBase
	
    //Insert Product Images Data To DataBase
    public function InsertProductImages($imageName , $ProductID){
		//call function to connected db from ConnectDB class
	   $db=$this->connectDB();
      $insertProduct ="INSERT INTO `product_images(imageName , ProductID) VALUES ('$imageName','$ProductID')";
        $ProductID= mysqli_insert_id($db);
		$resultProduct=mysqli_query($db,$insertProduct);
			 if($resultProduct===TRUE){
                 //get id
				  return true;
				 }//end if
              else{
				echo "Error: " . $insertProduct . "<br>" . $db->error;
                return false;
		  }//end else
		$db->close();
        }//end function
    
    //Get Product Images Via ID
    public function GetProductImages($ProductID){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
	    //Array To Store Fetched Data
		$productImagesArray=array();
		// query for get product images 
		$query_select = "SELECT * FROM product_images WHERE ProductID = $ProductID ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 $res=mysqli_fetch_assoc($result);			 
		     $productImagesArray['imageID']=$res['imageID'];
			 $productImagesArray['imageName']=$res['imageName'];
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $productImagesArray;
        }//end function
    
    
    //Update Product Images
    public function UpdateProductImages($imageName,$imageID){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for update product Images 
		$updateProduct="UPDATE product_images SET imageName ='".$imageName."WHERE ProID ='".$imageID."'";	
		 $result=mysqli_query($db,$updateProduct);
		 if($result===TRUE){
			 return true;
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $updateProduct . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
    
     //Delete Product Images
    public function DeleteِAllImages($ProductID){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for delete product Images 
		$deleteProduct="DELETE FROM product_images WHERE ProductID = $ProductID";	
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
}//end class
?>