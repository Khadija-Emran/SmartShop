<?php
require_once('CartClass.php');
require_once('ConnectDB.php');
class User extends ConnectDB {
	//variables
	public $UserID;
	public $UserName;
	public $Fullname;
	public $Password;
	public $Email;
	public $Address;
	public $PhoneNo1;
	public $PhoneNo2;
	public $Photo;
	public $Role;
	public $TrustStatus;
	public $RegStatus;
	public $GropID;
	
	//Set errors in array 
	public $errors;
    //Define object from Cart class
    public $cart;
    
	//functions 
	//Set User ID
	public function setUserID($UserID){
        $this->UserID=$UserID;
     }
	//Get User ID
	public function getUserID(){
        return $thid->UserID;
    }
	//Set User Name
    public function setUserName($UserName){
        $this->UserName=$UserName;
     }
	//Get User Name
     public function getUserName(){
        return $this->UserName;
    }
	//Set User Password
    public function setUserPassword($Password){
        $this->Password=$Password;
     }
	//Get User Password
     public function getUserPassword(){
        return $this->Password;
    }
    //Set Full Name
     public function setFullName($Fullname){
        $this->Fullname=$Fullname;
     }
	//Get Full Name
	public function getFullName(){
        return $this->Fullname;
    }
	//Set Email
	    public function setEmail($Email){
        $this->Email=$Email;
     }
	//Get Email
    public function getEmail(){
        return $this->Email;
    }
	
	//Set User Address
	public function setAddress($Address){
        $this->Address=$Address;
     }
	//Get User Address
    public function getAddress(){
        return $this->Address;
    }
	//Set User PhoneNo1
	public function setPhoneNo1($PhoneNo1){
        $this->PhoneNo1=$PhoneNo1;
     }
	//Get User PhoneNo1
    public function getPhoneNo1(){
        return $this->PhoneNo1;
    }
	//Set User PhoneNo2
	public function setPhoneNo2($PhoneNo2){
        $this->PhoneNo2=$PhoneNo2;
     }
	//Get User PhoneNo2
    public function getPhoneNo2(){
        return $this->PhoneNo2;
    }
	//Set User Photo
	public function setUserImg($Photo){
        $this->Photo=$Photo;
     }
	//Get User Photo
    public function getUserImg(){
        return $this->Photo;
    }
	//Set User Role
	public function setUserRole($Role){
        $this->Role=$Role;
     }
	//Get User Role
    public function getUserRole(){
        return $this->Role;
    }
	//Set User GropID
	public function setGropID($GropID){
        $this->GropID=$GropID;
     }
	//Get User GropID
    public function getGropID(){
        return $this->GropID;
    }
	//Set User TrustStatus
	public function setTrustStatus($TrustStatus){
        $this->TrustStatus=$TrustStatus;
     }
	//Get User TrustStatus
    public function getTrustStatus(){
        return $this->TrustStatus;
    }
	//Set User RegStatus
	public function setRegStatus($RegStatus){
        $this->RegStatus=$RegStatus;
     }
	//Get User RegStatus
    public function getRegStatus(){
        return $this->RegStatus;
    }
	//check 
//Check Image Is Uploaded
	public function ImageIsUploaded($img_error){
	//Check If Image Is Not Uploaded
	if($img_error==4){
		return false;
	 }//end if
     else
        return true;
	}//end function
	
	//Add Errors 
	public function addError($error){
		$this->$errors=$error;
	}//end function
	//Get Errors 
	public function getError(){
		return $this->$errors;
	}//end function
    
	
	//Check If Two Values Are Equal 
	public function AreEquals($value1,$value2){
		if($value1===$value1){
			return true;
		}//end if
		else{
			return false;
		}//end else
	}//end function 
	
	//Check IF Value is Exist in DB
	public function IsExist($value,$field){
		$db=$this->connectDB();
		$select="SELECT * FROM users";
        $result=mysqli_query($db,$select);
		if($result==TRUE){
		  while($row=mysqli_fetch_assoc($result)){
           $check_value=$row[$field];
		   if($value==$check_value){
				return true;
		     }//end if
		   }//end while
		}//end if
		$db->close();
	}//end function 
	
    //Insert User Data To DataBase
    public function InsertUser($name,$password,$email,$role,$img_name){
		//call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //object from CartClass
        $cart= new Cart();
		//Check Role
		// query for users table to insert user
	   $insertUser="INSERT INTO users (UserName , Password , Email , Role , GropID,Photo) VALUES ('$name','$password','$email','$role', 0,'$img_name')";
        //execute query
		$resultUser=mysqli_query($db,$insertUser);
			 if($resultUser===TRUE){
                 //get id
                 $id= mysqli_insert_id($db);
                 //Create User Cart
                 $cartID=$cart->CreateUserCart($id);
                 session_start();
                 $_SESSION['User_name']=$name;
				 $_SESSION['UserID']=$id;
                 $_SESSION['cartID']=$cartID;
				 header("location: ShowProducts.php");
                setcookie("User_Name",$name,time()+30*24*3600,"/");
				 session_start();
				 }//end if
              else{
				echo "Error: " . $insertUser . "<br>" . $db->error;
				  
		  }//end else
        }//end function
	//Insert Seller Data To DataBase
    public function InsertSeller($name,$fname,$address,$phone,$password,$email,$role,$img_name){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
        //object from CartClass
        $cart= new Cart();
		// query for users table to insert seller
	   $insertSeller="INSERT INTO users (UserName , Fullname , Address , PhoneNo1 ,  Password , Email , Role , GropID,Photo) VALUES ('$name','$fname','$address','$phone','$password','$email','$role', 1,'$img_name')";
        
        
		$resultSeller=mysqli_query($db,$insertSeller);
			 if($resultSeller===TRUE){
                 //get id
                 $id= mysqli_insert_id($db);
                 //Create User Cart
                 $cartID=$cart->CreateUserCart($id);
                 session_start();
				 $_SESSION['User_name']=$name;
				 $_SESSION['UserID']=$id;
                 $_SESSION['cartID']=$cartID;
				 header("location: StoreSignUp.php");
                 setcookie("User_Name",$name,time()+30*24*3600,"/");
				 }//end if
              else{
				echo "Error: " . $insertSeller . "<br>" . $db->error;
		  }//end else
        }//end function
    
    //Insert Seller Data To DataBase
    public function AddUser($name,$fname,$address,$phone,$password,$email,$role,$img_name,$gropID,$activeStatus){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
        //object from CartClass
        $cart= new Cart();
		// query for users table to insert seller
	   $insertSeller="INSERT INTO users (UserName , Fullname , Address , PhoneNo1 ,  Password , Email , Role ,Photo,GropID,TrustStatus) VALUES ('$name','$fname','$address','$phone','$password','$email','$role','$img_name', '$gropID','$activeStatus')";
        
        
		$resultSeller=mysqli_query($db,$insertSeller);
			 if($resultSeller===TRUE){
                 //get id
                 $id= mysqli_insert_id($db);
                 //Create User Cart
                 $cartID=$cart->CreateUserCart($id);
                 session_start();
				 $_SESSION['User_name']=$name;
				 $_SESSION['UserID']=$id;
                 $_SESSION['cartID']=$cartID;                setcookie("User_Name",$name,time()+30*24*3600,"/");
				 }//end if
              else{
				echo "Error: " . $insertSeller . "<br>" . $db->error;
		  }//end else
        }//end function
	
	//Check User To Login 
    public function LoginUser($email,$password){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
        //object from CartClass
        $cart= new Cart();
		// query for users table to check user
	   $select_user="SELECT * FROM users ";
		//check email and password exist 
         $resultUser=mysqli_query($db,$select_user);
	       //as user
		   if($resultUser==TRUE){
           while($row=mysqli_fetch_assoc($resultUser)){
           $check_email=$row['Email'];
		   $check_pass=$row['Password'];
		   if($email===$check_email && $password===$check_pass){
		    $id=$row['UserID'];
			$name=$row['UserName'];
			session_start();
            $_SESSION['GropID']=$row['GropID'];
            $cartID=$cart->GetUserCartID($id);
			$_SESSION['User_name']=$name;
			$_SESSION['UserID']=$id; 
            $_SESSION['cartID']=$cartID;
		    setcookie("User_Name",$name,time()+30*24*3600,"/");
		    return true;
             }//end if
             //if email existing and password not  
             //else if($email===$check_email && //$password!==$check_pass){ 
                 //return 'password';
               //} //end else if
               //if is not exist
			  }//end while
			 }//end if
              else{
				echo "Error: " . $select_user . "<br>" . $db->error;
               return false;
		  }//end else
		$db->close();
        }//end function
	
	//Update User Data
    public function UpdateUser($userID,$name,$fname,$address,$phone,$password,$email,$role,$img_name,$gropID,$activeStatus){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for update user data 
		$updateUser="UPDATE users SET UserName ='".$name."', Fullname = '".$fname."' , Password ='".$password."' , Email ='".$email."', Address ='".$address."',PhoneNo1='".$phone."' ,GropID='".$gropID."' ,Role='".$role."' ,Photo='".$img_name."' ,TrustStatus='".$activeStatus."' WHERE UserID ='".$userID."'";	
		 $result=mysqli_query($db,$updateUser);
		 if($result===TRUE){
			 $_SESSION['User_name']=$name;
			 return true;
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_update . "<br>" . $db->error .'</p>';
			 return false;
	      }//end else
		$db->close();
        }//end function
	
	//Get User Data Via ID
    public function GetUserData($id){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
	    //Array To Store Fetched Data
		$userArray=array();
		// query for get user data 
		$query_select = "SELECT * FROM users WHERE UserID = $id ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from user table
			 $res=mysqli_fetch_assoc($result);			 
		     $userArray['UserID']=$res['UserID'];
			 $userArray['UserName']=$res['UserName'];
			 $userArray['Fullname']=$res['Fullname'];
		     $userArray['Password']=$res['Password'];
			 $userArray['Email']=$res['Email'];
			 $userArray['Address']= $res['Address']; 
			 $userArray['PhoneNo1']=$res['PhoneNo1'];
			 $userArray['PhoneNo2']=$res['PhoneNo2'];
			 $userArray['Photo']=$res['Photo'];
			 $userArray['Role']=$res['Role'];
			 $userArray['TrustStatus']=$res['TrustStatus'];
			 $userArray['GropID']=$res['GropID'];
			 $userArray['RegStatus']=$res['RegStatus'];
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $userArray;
        }//end function
    
    //Get All Row of Users Data 
    public function GetAllUsers(){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		//Storing Data in Array
		$All_Row=array();
		// query for get User ID 
		$query_select = " SELECT UserID FROM users ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from users table
			 while($res=mysqli_fetch_assoc($result)){
				 $userID=$res['UserID'];
				 $All_Row[$userID]=$userID;
			 }//end while	 
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $All_Row;
        }//end function
    
    //Get All Row of Users Data 
    public function GetAllSellers(){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		//Storing Data in Array
		$All_Row=array();
		// query for get User ID 
		$query_select = " SELECT UserID FROM users WHERE GropID=1";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from users table
			 while($res=mysqli_fetch_assoc($result)){
				 $userID=$res['UserID'];
				 $All_Row[$userID]=$userID;
			 }//end while	 
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $All_Row;
        }//end function
    //Delete user 
    public function DeleteUser($userID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to delete product from the cart  
        $delUser="DELETE FROM users WHERE UserID=$userID";
        //execute query
		$resDelUser=mysqli_query($db,$delUser);
        if($resDelUser===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $delUser . "<br>" . $db->error;
        }//end else
    }//end function

}//end class

?>