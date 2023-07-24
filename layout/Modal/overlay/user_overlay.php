<!-- Start user overlay  --> 
<div id="overlay" class="overlay overlay-user">
    <i class="fa fa-close close text-light mr-3 mt-4 fa-2x p-2 close_overlay"  id='Close' style="position: fixed;
    left: 95%;z-index: 10000000000;"></i>
    <div class="overlay-content">
        <div class="login  text-center" >
         <h3 class="title-style " id="user_title">Create An Account</h3>
       <form action="" method="post" class="Reg-form" enctype="multipart/form-data">
           <!-- As User -->                        
                  <div class="custom-control custom-radio custom-control-inline mr-5 accountStatusRadio">
                  <input type="radio" class="custom-control-input activeStatusRadio0" id="user" name="ChooseR" value="user" checked>
                  <label class="custom-control-label text-light" for="user">As User</label>
                 </div>
                <!--End User -->
                <!-- As Seller -->                        
                  <div class="custom-control custom-radio custom-control-inline mr-5 accountStatusRadio">
                  <input type="radio" class="custom-control-input activeStatusRadio1" id="seller" name="ChooseR" value="seller" >
                  <label class="custom-control-label text-light" for="seller">As Seller</label>
                 </div>
                <!--End Seller -->
                <!-- As Admine -->                        
                  <div class="custom-control custom-radio custom-control-inline mr-5 accountStatusRadio">
                  <input type="radio" class="custom-control-input activeStatusRadio2" id="company" name="ChooseR" value="admine" disabled>
                  <label class="custom-control-label text-light" for="company">As Admine</label>
                 </div>
                <!--End company -->
         <div class="content" style="width: 420px;margin: auto;">
             <div class="float-right mt-4 ">
                 <p id="userRole" class="text-light font-weight-bold">role</p>
                  <p id="userStatus" class="btn text-light" style=""></p>
                 
             </div>
            <!--<div class="choose-Account">
				<h6 class="text-center wow bounceIn" data-wow-duration="2s">Choose kind of Account</h6>
				<div class="row">
					<div class="col">
						<span class="choose-span spanAsUser wow rotateInDownRight" data-wow-duration="2s" data-wow-delay=".2s" data-toggle="asUser" title="As User"><i class="fa fa-user"></i></span><br><br>
						<a href="#" class="asUser" data-wow-duration="2s" data-wow-delay="2s">As User</a>
						<input type="radio" name="ChooseR" class="radio r-user" checked="true" value="user">
						
					</div>
					<div class="col">
						<span 
                              class="choose-span spanAsSeller wow rotateInDownRight" 
                              data-wow-duration="2s" 
                              data-wow-delay=".4s">
                            <i class="fa fa-user" 
                               data-toggle="asSeller" 
                               title="As Seller" >
                            </i></span><br><br>
						<a href="#" class="asSeller"> As Seller</a>
						<input type="radio" name="ChooseR" class="radio r-seller" value="seller" >
					</div>
					<div class="col">
						<span class="choose-span  spanAsCompany wow rotateInDownRight" data-wow-duration="2s" data-wow-delay=".6s" data-toggle="asCompany" title="As Company"><i class="fa fa-user"></i></span><br><br>
						<a href="#" class="asCompany">As Company</a>
						<input type="radio" name="ChooseR" class="radio r-company" value="company">
					</div>
                </div></div>-->
             
             
				<div>
                    <input type="hidden" id="selectedID" class="selectedID" name="selectedID">
                   <img 
                        src="images/img2.png" 
                        class="ImgUpload mt-4 mb-2"
                        id="ImgUpload"
                        style="border-radius:50%">
                   <!-- Product Image -->
            
                  <div class="custom-file " style="width:100% !important">
                  <input type="file" class="custom-file-input ProImg ImgfileInput" 
                  id="customFile"
                  name="ProImg" 
                  
                   >
                  <label class="custom-file-label" for="customFile">Choose Photo For Your Account <i class="fa fa-image"></i></label>
                  </div>
                </div>
                    </div>
                <div class="container-fluid">    
				<!-- name -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">User Name</span>
                <div class="input-div mt-3 col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-user user"></i></span>  
                    <input 
                           type="text" 
                           placeholder="Your Name" 
                           name="name" 
                           class="name" 
                           autocomplete="off" 
                           required id="name"> 
                  
                    
					<p class="validate-text name-txt-error" >Please , enter your name </p>
                </div>
                </div>
				<!-- end  name -->
				<!-- full name -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info " style="">Full Name</span>
				<div class="input-div  col col-sm-8 col-12">
                    <span class="icon-span"><i class=" fa fa-user lock"></i></span>

                    <input 
                           type="text" 
                           placeholder="Your full Name" 
                           name="Fname" 
                           class="Fname"
                           id="Fname" 
                           >
					<p class="validate-text Fname-txt-error" >Please , enter your full name  </p> 
                </div>
                </div>
				<!-- end full name -->
				<!-- Address-->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info " style="">Address</span>
				<div class="input-div  col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-home lock"></i></span>
                    
                    <input 
                           type="text" 
                           placeholder="Your Address" 
                           name="Address" 
                           class="Address"
                           id="Address" 
                           >
					<p class="validate-text Address-txt-error" >Please , enter your Address  </p> 
                </div>
                </div>
				<!-- end Address  -->
			    <!-- Phone Number -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info " style="">Phone Number</span>
				<div class="input-div  col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-phone lock "></i></span>
                    <input 
                           type="text" 
                           placeholder="Phone Number" 
                           name="phone" 
                           class="phone"
                           id="phone"
                           >
					<p class="validate-text phone-txt-error" >Please , enter your phone number  </p> 
                    </div>
                    </div>
				<!-- end Phone Number -->
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
                           id="email" 
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
                           placeholder="Your Password" 
                           name="pass" 
                           class="pass"
                           id="pass" 
                           required>
					<p class="validate-text pass-txt-error" >Please , enter password </p>
                    </div>
                </div>
				<!-- end password -->
				<!-- Confirmation Password password -->
                <div class="row disappear">
                <span class="col col-sm-3 col-12 text-right span-info " style="">Confirmation Password</span>
				<div class="input-div  col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-lock lock "></i></span>
                    
                    <input 
                           type="password" 
                           placeholder="Confirmation Password" 
                           name="cpass" 
                           class="cpass" 
                           id="cpass"
                           required >
					<p class="validate-text cpass-txt-error" >At First !!! Please , enter password  </p>
					<p class="validate-text not-C-txt-error" >Password Not Confirmation  </p>
                </div>
                </div>
             </div>
                 <!-- Active -->                        
                  <div class="custom-control custom-radio custom-control-inline mr-5 activeStatusRadio">
                  <input type="radio" class="custom-control-input activeStatusRadio1" id="active" name="activeStatus" value="1" checked>
                  <label class="custom-control-label text-light" for="active">Active</label>
                 </div>
                <!--End Active -->
                <!-- Inactive -->                        
                  <div class="custom-control custom-radio custom-control-inline mr-5 activeStatusRadio">
                  <input type="radio" class="custom-control-input activeStatusRadio0" id="inactive" name="activeStatus" value="0" >
                  <label class="custom-control-label text-light" for="inactive">Inactive</label>
                 </div>
                  <br>
                <!--End Inactive -->
				<!--end  Confirmation Password password -->
                <input type="submit" value="SIGN IN" class="submit text-center signIn" name="add_user">
               <br>
               <br>
			<a href="Login.php" class="log_a">I Have account </a>
			</form>
	    </div>
    </div>
</div>
<!--End user overlay  -->