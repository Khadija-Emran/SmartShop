<?php ;
//include 'functions/User/UserAction.php';
include 'temp/ini.php';
session_start();
//if UserID is existing
if(isset($_SESSION['UserID'])){
include 'temp/UserHeader.php';
//Define Object From UserClass
 $user=new User();
//Define Object From CartClass
 $cart=new Cart();
?>
<!--Sign out  modal -->
    <div class="modal fade " id="sign-out">
      <div class="modal-dialog">
        <div class="modal-content signoutModle">
          <div class="modal-header">
            <h4 class="modal-title">Want to leave?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            Press logout to leave
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
			<a href="Home.php" class="btn btn-danger" >Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!--end Sign out modal -->
 
    <!--profile  modal -->
    <div class="modal fade " id="profile">
      <div class="modal-dialog">
        <div class="modal-content profile-model">
          <div class="modal-header">
            <h4 class="modal-title text-center">Your profile</h4>
            <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body text-center">
            <img src="images/profile.png" class="pro-img">
			<br>
			 <!-- get user data from database -->
			  <?php
	          // if($_SERVER['REQUEST_METHOD']=='POST'){
						$userData=array();
						$userData=$user->GetUserData($id);
						//User Data
			             $ID=$userData['UserID'];
						 $name=$userData['UserName'];
						 $fullname=$userData['Fullname'];
						 $pass=$userData['Password'];
						 $email=$userData['Email'];
						 $address=$userData['Address'];
						 $phone=$userData['PhoneNo1'];
						// $userArray['Photo'];
						 
			            //End User Data
					 // end  get user data from database 

					 //save changes 

						 if (isset($_POST['Save_Changes'])) { 
							//value from form
							$name=$_POST['name'];
							$fullname=$_POST['Fname'];
							$Newpass=$_POST['newpass'];
							$oldpass=$_POST['oldpass'];
							$Cpassword=$_POST['cpass'];
							$email=$_POST['email'];
							$address=$_POST['address'];
							$phone=$_POST['phone'];						 
							 //error array
							 $formError=array();
							 //check old password
							 if(!$user->AreEquals($oldpass,$pass)){
								$formError[]="Password you entered is not true" ;
							 }
						     //end check old password
						     //confirm  password
							 if(!$user->AreEquals($Newpass,$Cpassword)){
								$formError[]="Password you entered is not confirm" ;
							 }
						//end confirm password
						 if($user->AreEquals($oldpass,$pass)){
							 $result=$user->UpdateUser($name,$fullname,$Newpass,$email,$address,$phone,$id);
							 if($result===TRUE){
								 $success='Update Successfully<i class="fa fa-ok"></i>';
								}//end if 
							 else{
								echo "<p class='text-light'>Error: " . $query_update . "<br>" . $db->error .'</p>';
						   }
						 }//end if	 
							 else{
								$formError[]="The password is false" ;
							 }	 
						}//end if 
				  
			   //}
			  ?>
			 <!--end  save changes -->
			  
			 <!-- form to edit user data and  -->
		<div class="text-center  login">
            <form action="" method="post" class="Reg-form">
				<!--success message-->
					<?php if(isset($success)){ ?>
					<div class="error alert alert-success alert-dismissible " role="start">
						<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">
						   <span aria-hidden="true">&times;</span>
						</button>
					   	<?php echo $success ; ?>
						</div>
						<?php } ?>
				<!--end success message-->
				<!-- name -->
                <div class="input-div">
                    <span class="icon-span"><i class="fa fa-user user"></i></span>
                    <input type="text" 
						   placeholder="Your Name" 
						   name="name" value="<?php if(isset($name)){echo $name ;} ?>" 
						   class="name" autocomplete="off" required> 
					<p class="validate-text name-txt-error" >Please , enter your name </p>
                </div>
				<!-- end  name -->
				<!-- full name -->
				<div class="input-div ">
                    <span class="icon-span"><i class="fa fa-user lock "></i></span>
                    <input type="text" 
						   placeholder="Your full Name" 
						   name="Fname" 
						   class="Fname" 
						   value="<?php if(isset($fullname)){echo $fullname ; }?>"  >
					<p class="validate-text Fname-txt-error" >Please , enter your full name  </p> 
                </div>
				<!-- end full name -->
				<!-- Address-->
				<div class="input-div ">
                    <span class="icon-span"><i class="fa fa-home lock"></i></span>
                    <input type="text" 
						   placeholder="Your Address" 
						   value="<?php if(isset($address)){echo $address ;} ?> " 
						   name="address" 
						   class="address">
					<p class="validate-text Address-txt-error" >Please , enter your Address  </p> 
                </div>
				<!-- end Address -->
			    <!-- Phone Number -->
				<div class="input-div ">
                    <span class="icon-span"><i class="fa fa-phone lock"></i></span>
                    <input type="text" 
						   placeholder="Phone Number" 
						   name="phone" 
						   value="<?php if(isset($phone)){ echo $phone ; } ?>" 
						   class="phone" >
					<p class="validate-text phone-txt-error" >Please , enter your phone number  </p> 
                </div>
				<!-- end Phone Number -->
				<!-- email -->
                <div class="input-div">
                    <span class="icon-span"><i class="fa fa-envelope envelope "></i></span>
                    <input type="email" 
						   placeholder="Your Email"  
						   name="email"  
						   value="<?php if(isset($email)){ echo $email ;} ?>" 
						   class="email" autocomplete="off" required>
					<p class="validate-text email-txt-error" >Please , enter your email </p>
                </div>
				<!-- end email -->
				<p class="change-pass">Do you want to change password ? </p>
				<!-- print error of password from php -->
				<?php if(!empty($formError)){ ?>
					<div class="error alert alert-danger alert-dismissible " role="start">
						<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">
						   <span aria-hidden="true">&times;</span>
						</button>
					   	<?php
							foreach($formError as $error){
								echo $error .'<br>';
							} ?>
						</div>
						<?php } ?>
				<!-- end print error of password from php -->
			    <!-- old password -->
                <div class="input-div disappear">
                    <span class="icon-span"><i class="fa fa-lock lock"></i></span>
                    <input type="password" 
						   placeholder="Your old Password" 
						   name="oldpass" class="oldpass" required>
					<p class="validate-text pass-txt-error" >Please , enter password </p>
                </div>
				<!-- end old password -->
				<!-- New password -->
                <div class="input-div disappear">
                    <span class="icon-span"><i class="fa fa-lock lock"></i></span>
                    <input type="password" placeholder="Your New Password" name="newpass" class="pass" required>
					<p class="validate-text pass-txt-error" >Please , enter password </p>
                </div>
				<!-- end New password -->
				<!-- Confirmation Password password -->
				<div class="input-div disappear">
                    <span class="icon-span"><i class="fa fa-lock lock"></i></span>
                    <input type="password" placeholder="Confirmation Password" name="cpass" class="cpass" required >
					<p class="validate-text cpass-txt-error" >At First !!! Please , enter password  </p>
					<p class="validate-text not-C-txt-error" >Password Not Confirmation  </p>
                </div>
				<!--end  Confirmation Password password -->
                <input type="submit" value="Save Changes" class="submit text-center" name="Save_Changes">
            </form>
	       </div>
			  <!-- end  form to edit user data and -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!--profile out modal -->

<!--cart  modal -->
    <div class="modal fade " id="cart-modal">
      <div class="modal-dialog">
        <div class="modal-content signoutModle">
          <div class="modal-header">
            <h4 class="modal-title">Your Cart</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body text-center ">
            <img src="images/cart.jpg" class="pro-img">
			  <p class="text-left text-danger">Your Cart</p>
			  <table class="count-price">
				<tr>
				  <th>Protuct Count</th>
				  <th>Price Total</th>
				</tr>
				<tr>
					<td>15</td>
				    <td>100$</td>
				</tr>
			  </table>
			  <!--protuct data show-->
				<div class="error alert alert-danger alert-dismissible " role="start">
				<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">
				   <span aria-hidden="true">&times;</span>
				</button> 
                    <?php 
					  //Array To Storing Cart Data
					  $cartArray=array();
                      $cartArray=$cart->GetCartData($cartID);
                      //Cart Data
						  $UserID=$cartArray['UserID']; 
                          $TotalPrice=$cartArray['TotalPrice'];
						  $TotProCount=$cartArray['TotProCount'];
                    ?>
					<table>
						<tr>
					     <td> <img src="images/cart.jpg" class="pro-img"></td>
						 <td><span class="light-text"><?php echo $TotalPrice ?></span></td>
						 <td><span><?php echo $TotProCount ?></span></td>
				    	</tr>
				    </table>
				</div>
	           <!--end protuct data show-->

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
          </div>
        </div>
      </div>
    </div>
    <!--end cart  modal -->

    <!--procurement  modal -->
    <div class="modal fade " id="Procurement-modal">
      <div class="modal-dialog">
        <div class="modal-content signoutModle">
          <div class="modal-header">
            <h4 class="modal-title">Your Cart</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body text-center ">
            <img src="images/cart.jpg" class="pro-img">
			<p>Your Cart </p>
			  <p class="text-left text-danger">Your Block Protucts</p>
			  
			   <!--protuct data show-->
				<div class="error alert alert-danger alert-dismissible " role="start">
				<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">
				   <span aria-hidden="true">&times;</span>
				</button> 
					<table>
						<tr>
					     <td> <img src="images/cart.jpg" class="pro-img"></td>
						 <td><span>nice</span></td>
						 <td><span>200$</span></td>
				    	</tr>
				    </table>
				</div>
	           <!--end protuct data show-->
			  <!--protuct data show-->
				<div class="error alert alert-danger alert-dismissible " role="start">
				<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">
				   <span aria-hidden="true">&times;</span>
				</button> 
					<table>
						<tr>
					     <td> <img src="images/cart.jpg" class="pro-img"></td>
						 <td><span>nice</span></td>
						 <td><span>200$</span></td>
				    	</tr>
				    </table>
				</div>
	           <!--end protuct data show-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
          </div>
        </div>
      </div>
    </div>
    <!--end procurement  modal -->

    <!--favourite  modal -->
    <div class="modal fade " id="favourite-modal">
      <div class="modal-dialog">
        <div class="modal-content signoutModle">
          <div class="modal-header">
            <h4 class="modal-title">Your Cart</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body text-center ">
            <img src="images/cart.jpg" class="pro-img">
			<p>Your Cart </p>
			  <p class="text-left text-danger">Your Block Protucts</p>
			  
			   <!--protuct data show-->
				<div class="error alert alert-danger alert-dismissible " role="start">
				<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">
				   <span aria-hidden="true">&times;</span>
				</button> 
					<table>
						<tr>
					     <td> <img src="images/cart.jpg" class="pro-img"></td>
						 <td><span>nice</span></td>
						 <td><span>200$</span></td>
				    	</tr>
				    </table>
				</div>
	           <!--end protuct data show-->
			  <!--protuct data show-->
				<div class="error alert alert-danger alert-dismissible " role="start">
				<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">
				   <span aria-hidden="true">&times;</span>
				</button> 
					<table>
						<tr>
					     <td> <img src="images/cart.jpg" class="pro-img"></td>
						 <td><span>nice</span></td>
						 <td><span>200$</span></td>
				    	</tr>
				    </table>
				</div>
	           <!--end protuct data show-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
          </div>
        </div>
      </div>
    </div>
    <!--end favourite  modal -->
<?php
}//end if (userID existing )
//otherwise if UserID is not existing
else{
    $alertTitle='You Have Not Permission To Enter To This Page !';
    $question='Do You Want To Create  Account ?';
    $yesLink='SignUp.php';
    $NoLink='#';
    echo AlertMessage($alertTitle,$question,$yesLink,$NoLink);
}//end else
?>