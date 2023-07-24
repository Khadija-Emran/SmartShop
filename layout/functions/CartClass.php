<?php
require_once('ConnectDB.php');
class Cart extends ConnectDB {
    //variables
	public $CartID;
	public $UserID;
	public $TotalPrice;
    public $TotalProCount;
    public $subTotal;
	//Functions 
    //Set Cart ID
	public function setCartID($CartID){
        $this->CartID=$CartID;
     }
	//Get Cart ID
	public function getCartID(){
        return $this->CartID;
    }
    //Set User ID
	public function setUserID($UserID){
        $this->UserID=$UserID;
     }
	//Get User ID
	public function getUserID(){
        return $this->UserID;
    }
    //Set subTotal Price
	public function setSubTotal($subTotal){
        $this->subTotal=$subTotal;
     }
	//Get subTotal Price
	public function getSubTotal(){
        return $this->subTotal;
    }
     //Set Total Price
	public function setTotalPrice($TotalPrice){
        $this->TotalPrice=$TotalPrice;
     }
	//Get Total Price
	public function getTotalPrice(){
        return $this->TotalPrice;
    }
    //Set Total Products Count
	public function setTotalProCount($TotalProCount){
        $this->TotalProCount=$TotalProCount;
     }
	//Get Total Products Count
	public function getTotalProCount(){
        return $this->TotalProCount;
    }
    //Work With Batabase
    //Create User Cart
    public function CreateUserCart($userID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to insert cart user
        $insertCartUser="INSERT INTO cart (UserID) VALUES ('$userID')";
        //execute query
		$resultCart=mysqli_query($db,$insertCartUser);
        //get id
        $cartID= mysqli_insert_id($db);
        if($resultCart===TRUE){
            return $cartID;
        }//end if
        else{
            echo "Error: " . $insertCartUser . "<br>" . $db->error;
            return 0;
        }//end else
    }//end function
    
    //Get Cart Data Via ID
    public function GetCartData($id){
		//Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
	    //Array To Store Fetched Data
		$cartArray=array();
		// query for get user data 
		$query_select = "SELECT * FROM cart WHERE CartID = $id ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from user table
			 $res=mysqli_fetch_assoc($result);			 
		     $cartArray['CartID']=$res['CartID'];
			 $cartArray['UserID']=$res['UserID'];
             $cartArray['subTotal']=$res['subTotal'];
			 $cartArray['TotalPrice']=$res['TotalPrice'];
		     $cartArray['TotProCount']=$res['TotProCount'];
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $cartArray;
        }//end function
    
     //Cart ID
    public function GetUserCartID($userID){
		//Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
		// query for get user data 
		$query_select = "SELECT CartID FROM cart WHERE UserID=$userID";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 $res=mysqli_fetch_assoc($result);			 
		     $cartID=$res['CartID'];
			 return $cartID;
			}//end if 
		 else{
             return 0;
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return 0;
        }//end function

    
       //Update cart info
    public function UpdateCartInfo($cartID,$subtotal,$totalPrice,$count){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to update cart info  
        $updateCartInfo="UPDATE cart SET subTotal ='".$subtotal."', TotalPrice = '".$totalPrice."' , TotProCount ='".$count."' WHERE CartID ='".$cartID."'";	

        //execute query
		$result=mysqli_query($db,$updateCartInfo);
        if($result===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $updateCartInfo . "<br>" . $db->error;
        }//end else
    }//end function
    
    //Delete cart 
    public function DeleteCart($cartID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to delete product from the cart  
        $delCart="DELETE FROM cart WHERE CartID=$cartID";
        //execute query
		$resDelCart=mysqli_query($db,$delCart);
        if($resDelCart===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $delCart . "<br>" . $db->error;
        }//end else
    }//end function
    //End Work With Database
}//End Class