
<?php
include 'functions/UserClass.php';
require_once('functions/CartClass.php');
require_once('functions/ProductActions.php');
require_once('functions/CartProductsClass.php');
include 'functions/Store/StoreAction.php';
include 'Modal/alert.php';
//Define Object From UserClass
 $user=new User();
//Define Object From CartProductsClass
 $cartPro=new CartProducts();
//Define Object From CartClass
 $cart=new Cart();
//Define Object From Store
 $store=new Store();
//Define Object From Store
 $product=new Product();
//Check If Value Come From Form
if ($_SERVER['REQUEST_METHOD']=='POST') {
	//Login 
	 if (isset($_POST['login'])) { 
		//value from form
		$password=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$radio=$_POST['ChooseR'];
         //Check if email and password is existing
         if($user->LoginUser($email,$password)===TRUE){
            $GropID=$_SESSION['GropID'];
		   //As user
		   if($radio=="user"){
               if($GropID==0){
                 header("location: ShowProducts.php");
               }//end if
			   else{
                 $message='Error You Are Not User';
                 echo AlertDanger($message);
               }//end else
		    }//end if
            //As Admine
		   if($radio=="admine"){
               if($GropID==2){
                 $_SESSION['admineID']=$_SESSION['UserID'];
                 header("location: AdminDashboard.php");
               }//end if
			   else{
                 $message='Error You Are Not Admine';
                 echo AlertDanger($message);
               }//end else
		    }//end if
		    //As Seller
		    else if($radio=="seller"){
                if($GropID==1){
                    //Get Store ID
                     $store=new Store();
                     $storeID=$store->GetStoreIdViasellerID($_SESSION['UserID']);
                     //check if there is real store 
                     if($storeID==0){
                        $alertTitle='You Have Not Permission To Enter To This Page ! You Have Not Store ';
                        $question='Do You Want To Create  A Store ?';
                        $yesLink='StoreSignUp.php';
                        $NoLink='#';
                        echo AlertMessage($alertTitle,$question,$yesLink,$NoLink); 
                     }//end if
                    else{
                       $_SESSION['StoreID']=$storeID;
                       header("location:  SellerDashboard.php"); 
                    }//end else 
                }//end if
			    else{
			    $message='Error You Are Not Seller <br> You Are User ';
                echo AlertDanger($message);
		     }//end else
		    }//end if
         }//end if 
         //if email existing and password not 
        // else if($checkLogin=='password'){
             //$message="Your Password Is Not True !<br>Try Again ";
             //echo AlertDanger($message);
        // }
        // otherwise if email and password is not existing
		else{
            $alertTitle='You Have Not Account ! ';
            $question='Do You Want To Create Account?';
            $yesLink='SignUp.php';
            $NoLink='#';
        echo AlertMessage($alertTitle,$question,$yesLink,$NoLink);         
        }
	}//end if 
    //Sign up
	 if (isset($_POST['sign'])) { 
		//value from form
		$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$fname=filter_var($_POST['Fname'], FILTER_SANITIZE_STRING);
		$address=filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
		$phone=filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		$Cpassword=filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$role=$_POST['ChooseR'];
         //value of image
        $image=$_FILES['ProImg'];
        $img_name=$image['name'];
        $img_error=$image['error'];
        $img_size=$image['size'];
        $temPath=$image['tmp_name'];
        $NewPath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';
         //if image do not upload
         if(!$ckeckErrors->ImageIsUploaded($img_error)){
            $img_name='profile.png'; 
         }//end if
         $ImageErrors=array();
       //Check Image Errors
       $ImageErrors=$ckeckErrors->CheckImageErrors($img_size,$img_name);
	   //check email exist 
	   if(!$user->IsExist($email,'Email')) {
		  //Check Password
		   if($user->AreEquals($password,$Cpassword)){
			   //As User
			   if($role=="user"){
                   if(empty($ImageErrors)){
                    //insert User Data
                     $user->InsertUser($name,$password,$email,$role,$img_name);
                        //Upload Image to File
                        move_uploaded_file($temPath,$NewPath.$img_name);	 
                    }//end if
				   
			   }//end if
			   //As Seller
			   else if($role=="seller"){
                   
                   if(empty($ImageErrors)){
                    //insert User Data
                     $user->InsertSeller($name,$fname,$address,$phone,$password,$email,$role,$img_name);
                        //Upload Image to File
                     move_uploaded_file($temPath,$NewPath.$img_name);	 
                    }//end if
				   
			   }//end else if
		   }//end if
		   else{
             $message="Password Not Identical";
             echo AlertDanger($message);
			 //$error='Password Not Conforming';  
             //$user->addError($error);
		   }//end else 
	   }//end if
         
	   else{
         $message="Email Is Exist , Please  Change it And Try Again ";
         echo AlertDanger($message);
		 //$error='Email Is Exist';
		 //$user->addError($error);
	   }//end else
	 }//end if 
	//End Get Values From Form
    //Add User
	 if (isset($_POST['add_user'])) { 
		//value from form
        
		$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$fname= filter_var($_POST['Fname'], FILTER_SANITIZE_STRING);
		$address=filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
		$phone=filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		$Cpassword=filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$role=$_POST['ChooseR'];
         //value of image
        $image=$_FILES['ProImg'];
        $img_name=$image['name'];
        $img_error=$image['error'];
        $img_size=$image['size'];
        $temPath=$image['tmp_name'];
        $activeStatus=$_POST['activeStatus'];
        $NewPath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';
         //if image do not upload
         if(!$ckeckErrors->ImageIsUploaded($img_error)){
            $img_name='profile.png'; 
         }//end if
         $ImageErrors=array();
       //Check Image Errors
       $ImageErrors=$ckeckErrors->CheckImageErrors($img_size,$img_name);
	   //check email exist 
	   if(!$user->IsExist($email,'Email')){
		  //Check Password
		   if($user->AreEquals($password,$Cpassword)){
			   //As seller 
               if($role=="seller"){
                   $gropID=1;
               }//end if
               //As user
			   else if($role=="user"){
                   $gropID=0;
               }//end else
               //As admine
               else if($role=="admine"){
                   $gropID=2;
               }//end else
                   if(empty($ImageErrors)){
                    //insert User Data
                     $user->AddUser($name,$fname,$address,$phone,$password,$email,$role,$img_name,$gropID,$activeStatus);
                        //Upload Image to File
                     move_uploaded_file($temPath,$NewPath.$img_name);	 
                    }//end if
			   }//end else if
		   else{
             $message="Password Not Identical";
             echo AlertDanger($message);
			 //$error='Password Not Conforming';  
             //$user->addError($error);
		   }//end else 
     }//end if
         
	   else{
         $message="Email Is Exist , Please  Change it And Try Again ";
         echo AlertDanger($message);
		 //$error='Email Is Exist';
		 //$user->addError($error);
	   }//end else
     }//end if     
    //End Add User    
    if(isset($_POST['final_delet_user'])){
        $selectID=$_POST['delete_ItemID'];
        $cartID=$cart->GetUserCartID($selectID);
        //if there is a cart
        if($cartID!=0){
           if($cartPro->DelAllProFcart($cartID)){
             $cart->DeleteCart($cartID);
           }//end if
           else{
             $message="Can Not Delete Cart";
             echo AlertDanger($message);
            }//end else           
        }//end if
        //if there is a store
        $storeID=$store->GetStoreIdViasellerID($selectID);
        if($storeID!=0){
            if($product->DeleteProduct_of_Store($storeID)){
            if(!$store->DeleteStore($storeID)){
              $message="Can Not Delete Store";
              echo AlertDanger($message);  
            }//end if
          }//end if
            else{
              $message="Can Not Delete Products Of The Store";
              echo AlertDanger($message);   
            }
        }//end if
        if(!$user->DeleteUser($selectID)){
           $message="Can Not Delete User";
           echo AlertDanger($message);  
        }//end if
    }//end if
    
     //Add User
	 if (isset($_POST['update_user'])) { 
		//value from form
		$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$fname=filter_var($_POST['Fname'], FILTER_SANITIZE_STRING);
		$address=filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
		$phone=filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		$Cpassword=filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$role=$_POST['ChooseR'];
        $userID=$_POST['selectedID'];
        $activeStatus=$_POST['activeStatus'];
         
         //value of image
        $image=$_FILES['ProImg'];
        $img_name=$image['name'];
        $img_error=$image['error'];
        $img_size=$image['size'];
        $temPath=$image['tmp_name'];
        $NewPath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';
          $userArray=array();
          $userArray=$user->GetUserData($userID);
           //To get existing image
          $existImage=$userArray['Photo'];
          //if image do not upload
        if(!$ckeckErrors->ImageIsUploaded($img_error)){
        $img_name=$existImage;
        }//end if
         $ImageErrors=array();
       //Check Image Errors
       $ImageErrors=$ckeckErrors->CheckImageErrors($img_size,$img_name);
	   //check email exist 
	   if(!$user->IsExist($email,'Email')){
           
		  //Check Password
		   if($user->AreEquals($password,$Cpassword)){
			   //As user
               if($role=="seller"){
                   $gropID=1;
               }//end if
			   else if($role=="user"){
                   $gropID=0;
               }//end else
                   if(empty($ImageErrors)){
                    //insert User Data
                     $user->UpdateUser($userID,$name,$fname,$address,$phone,$password,$email,$role,$img_name,$gropID,$activeStatus);
                        //Upload Image to File
                    move_uploaded_file($temPath,$NewPath.$img_name);	 
                    }//end if
			   }//end else if
		   else{
             $message="Password Not Identical";
             echo AlertDanger($message);
			 //$error='Password Not Conforming';  
             //$user->addError($error);
		   }//end else 
     }//end if
         
	   else{
         $message="Email Is Exist , Please  Change it And Try Again ";
         echo AlertDanger($message);
		 //$error='Email Is Exist';
		 //$user->addError($error);
	   }//end else
     }//end if
    
    
}//end if
//User Data In Object
 function UserObject($user,$userID){
       //Get User Data Via Id
       //Get Image From Folder
       $imageURL = 'images/upload/';
       //Array To Storing User Data
       $userArray=array();
       $userArray=$user->GetUserData($userID);
       //Product Data
       $user->setUserID($userArray['UserID']);
       $user->setUserName($userArray['UserName']);
       $user->setUserImg($imageURL.$userArray['Photo']);
       $user->setFullName($userArray['Fullname']);
       $user->setUserPassword($userArray['Password']); 
       $user->setEmail($userArray['Email']); 
       $user->setAddress($userArray['Address']);
       $user->setPhoneNo1($userArray['PhoneNo1']);
       $user->setPhoneNo2($userArray['PhoneNo2']); 
       $user->setUserRole($userArray['Role']);
       $user->setTrustStatus($userArray['TrustStatus']);
       $user->setGropID($userArray['GropID']);
       $user->setRegStatus($userArray['RegStatus']);
    return $user;
}//end function
?>