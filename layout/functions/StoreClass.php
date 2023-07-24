<?php
require_once('ConnectDB.php');
class Store extends ConnectDB {
	//variables
	public $StoreID;
	public $SellerID;
	public $StoreName;
	public $StoreDes;
    public $storePhoto;
	public $Available;
	public $Location;
    
	//functions 
	//Set Store ID
	public function setStoreID($StoreID){
        $this->StoreID=$StoreID;
     }
	//Get Store ID
	public function getStoreID(){
        return $this->StoreID;
    }
    //Set Seller ID
	public function setSellerID($SellerID){
        $this->SellerID=$SellerID;
     }
	//Get Seller ID
	public function getSellerID(){
        return $this->SellerID;
    }
	//Set Store Name 
	public function setStoreName($StoreName){
        $this->StoreName=$StoreName;
     }
	//Get Store Name
	public function getStoreName(){
        return $this->StoreName;
    }
	//Set Store Description 
	public function setStoreDes($StoreDes){
        $this->StoreDes=$StoreDes;
     }
	//Get Store Description
	public function getStoreDes(){
        return $this->StoreDes;
    }
    //Set Store Photo 
	public function setStorePhoto($storePhoto){
        $this->storePhoto=$storePhoto;
     }
	//Get Store Photo
	public function getStorePhoto(){
        return $this->storePhoto;
    }
	//Set Store Available 
	public function setAvailable($Available){
        $this->Available=$Available;
     }
	//Get Store Available
	public function getAvailable(){
        return $this->Available;
    }
	//Set Store Location 
	public function setLocation($Location){
        $this->Location=$Location;
     }
	//Get Store Location
	public function getLocation(){
        return $this->Location;
    }
	//Work With DataBase
	//Insert Store Data To DataBase
    public function InsertStore($sellerID,$Sname,$des,$aval,$location,$photo){
		//call function to connected db from ConnectDB class
	    $db=$this->connectDB();
		// query for users table to insert user
	    $insertStore="INSERT INTO store (SellerID , StoreName , StoreDes , StorePhoto , Available , Location ) VALUES ('$sellerID','$Sname','$des','$photo','$aval','$location')";
		$resultStore=mysqli_query($db,$insertStore);
			 if($resultStore===TRUE){
				 //header("location: SellerDashboard.php");
				  //get id
				 $StoreID= mysqli_insert_id($db);
				 session_start();
				 $_SESSION['store_name']=$Sname;
				 $_SESSION['StoreID']=$StoreID;
				 return true;
				 }//end if
              else{
				echo "Error: " . $insertStore . "<br>" . $db->error;
                  
				 return false;
		  }//end else
		$db->close();
        }//end function
    
    
    
    //Get Store Data Via ID
    public function GetStoreData($storeID){
		//Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
	    //Array To Store Fetched Data
		$storeArray=array();
		// query for get product data 
		$query_select = "SELECT * FROM store WHERE StoreID = $storeID ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 $res=mysqli_fetch_assoc($result);			 
		     $storeArray['StoreID']=$res['StoreID'];
			 $storeArray['SellerID']=$res['SellerID'];
			 $storeArray['StoreName']=$res['StoreName'];
		     $storeArray['StoreDes']=$res['StoreDes'];
             $storeArray['StorePhoto']=$res['StorePhoto'];
             $storeArray['Available']=$res['Available'];
		     $storeArray['Location']=$res['Location'];
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $storeArray;
        }//end function
	//Get All Stores Data
    public function GetAllStoresData(){
        //Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
	    //Array To Store Fetched Data
		$storeArray=array();
		// query for get product data 
		$query_select = "SELECT * FROM store";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from store table		 
			 while($res=mysqli_fetch_assoc($result)){
               $storeID=$res['StoreID']; 
               $storeArray[$storeID]=$storeID;
             }//end while
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $storeArray;
    }//end function
    
    //Get All Stores Data
    public function Sellers_have_stores(){
        //Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
	    //Array To Store Fetched Data
		$sellerArray=array();
		// query for get product data 
		$query_select = "SELECT SellerID FROM store";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from store table		 
			 while($res=mysqli_fetch_assoc($result)){
               $sellerID=$res['SellerID']; 
               $sellerArray[$sellerID]=$sellerID;
             }//end while
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $sellerArray;
    }//end function
    
    //Get StoreID Via SellerID
    public function GetStoreIdViasellerID($sellerID){
       //Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
		// query for get product data 
		$query_select = "SELECT StoreID FROM store WHERE SellerID=$sellerID";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
             //fetch values from store table
             $res=mysqli_fetch_assoc($result);
               $storeID=$res['StoreID']; 
               return $storeID;
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
            return 0;
	      }//end else
		$db->close();
    }//end function
    
     //Delete store 
    public function DeleteStore($storeID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to delete product from the cart  
        $delStore="DELETE FROM store WHERE StoreID=$storeID";
        //execute query
		$resDelStore=mysqli_query($db,$delStore);
        if($resDelStore===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $delStore . "<br>" . $db->error;
        }//end else
    }//end function
    
    //Update Store
    public function UpdateStore($storeID,$sellerID,$Sname,$des,$aval,$location,$img_name){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to update cart info  
        $update="UPDATE store SET SellerID ='".$sellerID."', StoreName = '".$Sname."' , StoreDes ='".$des."' , StorePhoto = '".$img_name."' , Available = '".$aval."' , Location = '".$location."' WHERE StoreID ='".$storeID."'";	

        //execute query
		$result=mysqli_query($db,$update);
        if($result===TRUE){
            return true;
        }//end if
        else{
            echo "Error: " . $update . "<br>" . $db->error;
        }//end else
    }//end function
    
   
    //End Work With DataBase
     
}//end class