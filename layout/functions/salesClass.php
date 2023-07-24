
<?php
require_once('ConnectDB.php');
class Category extends ConnectDB {
    //variables
	public $productID;
	public $customerID;
	public $sale_date;
	public $sale_price;
    
    
    //functions 
	//Set Product ID
	public function setProductID($productID){
        $this->productID=$productID;
     }
	//Get Product ID
	public function getProductID(){
        return $this->productID;
    }
    //Set customerID 
	public function setcustomerID($customerID){
        $this->customerID=$customerID;
     }
	//Get customerID
	public function getcustomerID(){
        return $this->customerID;
    }
     //Set customerID 
	public function setcustomerID($customerID){
        $this->customerID=$customerID;
     }
	//Get customerID
	public function getcustomerID(){
        return $this->customerID;
    }
    //Set sale_date 
	public function setSale_date($sale_date){
        $this->sale_date=$sale_date;
     }
	//Get sale_date
	public function getSale_date(){
        return $this->sale_date;
    }
    //Set sale_price
	public function setSale_price($sale_price){
        $this->sale_price=$sale_price;
     }
	//Get sale_price
	public function getSale_price(){
        return $this->sale_price;
    }
    
    //work with database
    //Save sold product 
    public function SaveSoldProduct($productID,$customerID,$storeID,$sale_date,$sale_price){ 
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
		// query for category table to insert user
	    $insert="INSERT INTO sales (productID , storeID , sale_date,customerID,sale_price) VALUES ('$productID','$customerID','$storeID','$sale_date','$sale_price')";
		$result=mysqli_query($db,$insert);
			 if($result===TRUE){
				 return true;
				 }//end if
              else{
				echo "Error: " . $insert . "<br>" . $db->error;
				 return false;
		  }//end else
		$db->close();
    }//end function
    
    //Get sold product of store
    public function GetSold_product_of_store($storeID){
		//Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
	    //Array To Store Fetched Data
		$soldProductArray=array();
		// query for get sold product data 
		$query_select = "SELECT * FROM sales WHERE storeID = $storeID ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 $res=mysqli_fetch_assoc($result);			 
		     $soldProductArray['productID']=$res['productID'];
			 $soldProductArray['storeID']=$res['storeID'];
			 $soldProductArray['sale_date']=$res['sale_date'];
		     $soldProductArray['customerID']=$res['customerID'];
             $soldProductArray['sale_price']=$res['sale_price'];
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $soldProductArray;
        }//end function
}//end class


?>