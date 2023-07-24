<title>Login Up</title>
<?php
include 'temp/ini.php';
include $userActionPath;
include $categoryActionPath;
//include 'functions/User/UserAction.php';
//include 'temp/Navbar.php' ;
?>

  <header class="log-header">
      <?php include 'temp/Navbar.php' ; 
      ?>
		<div class="text-light" ></div>
        <div class="login  text-center  ">
			<h3 class="title-style">Login to Account</h3><br>
			 <!-- login form   -->
            
            <form action="" method="post" class="log-form">
                <div class="content  ">
				<!-- loain as -->
				<div class="choose-Account">
				<h6 class="text-center wow bounceIn" data-wow-duration="2s">Choose kind of Account</h6>
				<div class="row">
					<div class="col">
						<a href="#" class="asUser" data-wow-duration="2s" data-wow-delay="2s">As User</a>
						<input type="radio" name="ChooseR" class="radio r-user" checked="true" value="user">
					</div>
					<div class="col">
						<a href="#" class="asSeller"> As Seller</a>
						<input type="radio" name="ChooseR" class="radio r-seller" value="seller" >
					</div>
					<div class="col">
						<a href="#" class="asAdmine">As Admine</a>
						<input type="radio" name="ChooseR" class="radio r-company" value="admine">
					</div>
				</div>
                </div>
                </div>
				
                <div class="container-fluid"> 
                    <!-- email -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Email</span>
                <div class="input-div col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-envelope envelope   "></i></span>
                    
                    <input 
                           type="email" 
                           placeholder="Your Email" 
                           name="email" 
                           class="email"
                           value="<?php if(isset($email)){echo $email ;} ?>"
                           autocomplete="off" required>
					<p class="validate-text email-txt-error" >Please , enter your email </p>
                    </div>
                </div>
				<!-- end email -->
				<!-- password -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Password</span>
                <div class="input-div col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-lock lock"></i></span>
                    <input 
                           type="password" 
                           placeholder="Your Password" name="pass" 
                           value="<?php if(isset($password)){echo $password ;} ?>"
                           class="pass" required>
					<p class="validate-text pass-txt-error" >Please , enter password </p>
                    </div>
                </div>
				<!-- end password -->
                </div>
				<a href="#">Forget Password </a><br>
                <input type="submit" value="Login" class="submit text-center" name="login">
                
            </form>
			 <!-- end login form   -->
			<a href="SignUp.php">Create Account  </a>
				<!-- print error message -->
				<?php if(isset($log_error)){ 
					    echo '<div class="error alert alert-danger alert-dismissible " role="start">';
						echo '<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">';
						echo'<span aria-hidden="true">&times;</span>';
						echo '</button>';
                        echo $log_error; 
						echo'</div>';
						} 
				?>
				<!-- end print error message -->
	  </div>
 </header>

<?php   include 'temp/footer.php'; ?>
	
