<?php
require_once('../ConnectDB.php');
class Store extends ConnectDB {
	//variables
	public $StoreID;
	public $SellerID;
	public $StoreName;
	public $StoreDes;
    public $storePhoto;
	public $Available;
	public $Location;
	//Set errors in array 
	public $errors=array();
	
	//functions 
	
	//Set Store ID
	public function setStoreID($StoreID){
        $this->StoreID=$StoreID;
     }
	//Get Store ID
	public function getStoreID(){
        return $StoreID;
    }
    //Set Seller ID
	public function setSellerID($SellerID){
        $this->SellerID=$SellerID;
     }
	//Get Seller ID
	public function getSellerID(){
        return $SellerID;
    }
	//Set Store Name 
	public function setStoreName($StoreName){
        $this->toreName=$StoreName;
     }
	//Get Store Name
	public function getStoreName(){
        return $StoreName;
    }
	//Set Store Description 
	public function setStoreDes($StoreDes){
        $this->StoreDes=$StoreDes;
     }
	//Get Store Description
	public function getStoreDes(){
        return $StoreDes;
    }
    //Set Store Photo 
	public function setStorePhoto($storePhoto){
        $this->storePhoto=$storePhoto;
     }
	//Get Store Photo
	public function getStorePhoto(){
        return $storePhoto;
    }
	//Set Store Available 
	public function setAvailable($Available){
        $this->Available=$Available;
     }
	//Get Store Available
	public function getAvailable(){
        return $Available;
    }
	//Set Store Location 
	public function setLocation($Location){
        $this->Location=$Location;
     }
	//Get Store Location
	public function getLocation(){
        return $Location;
    }
	//Work With DataBase
	//Insert Store Data To DataBase
    public function InsertStore($sellerID,$Sname,$email,$des,$aval,$location){
		//call function to connected db from ConnectDB class
	    $db=$this->connectDB();
		// query for users table to insert user
	    $insertStore="INSERT INTO store (SellerID , StoreName , StoreDes , Available , Location) VALUES ('$sellerID','$Sname','$des','$aval','$location')";
		$resultStore=mysqli_query($db,$insertStore);
			 if($resultStore===TRUE){
				 header("location: SellerDashboard.php");
				 setcookie("User_Name",$name,time()+30*24*3600,"/");
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
	//End Work With DataBase
}//end class