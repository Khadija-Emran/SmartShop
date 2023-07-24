<!-- Start category overlay  --> 
<div id="overlay" class="overlay overlay-category">
    <i class="fa fa-close close text-light mr-3 mt-4 fa-2x p-2 close_overlay"  id='Close' style="position: fixed;
    left: 95%;z-index: 10000000000;"></i>
    <div class="overlay-content">
        <div class="login  text-center">
            <h3 class="title-style" id="category_title">Category</h3>
				<br>
				<form action="" method="post" class="" enctype="multipart/form-data">
                <div class="content">
                    <input type="hidden" id="selectedID"  class="selectedID" name="selectedID">
                   <img 
                        src="images/img2.png" 
                        class="ImgUpload mb-2"
                        id="ImgUpload">
                   <!-- Product Image -->
            
                  <div class="custom-file " style="width:100% !important">
                  <input type="file" class="custom-file-input ProImg ImgfileInput" 
                  id="customFile"
                  name="ProImg" 
                  
                   >
                  <label class="custom-file-label" for="customFile">Choose Photo For Category <i class="fa fa-image"></i></label>
                  </div>
                </div>  
				<!-- category name -->
                <div class="container-fluid">    
				<!-- name -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Category Name</span>
                <div class="input-div mt-4 col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-user user"></i></span>
                    <input 
                           type="text" 
                           placeholder="Category Name" 
                           name="Sname" class="Sname" 
                           id="Cname" autocomplete="off" required> 
					<p class="validate-text Sname-txt-error" >Please , enter category name </p>
                </div>
                </div>
				<!-- end category name -->
				<!-- category des-->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Category Description</span>
				<div class="input-div col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-user lock"></i></span>
                    <input type="text" placeholder="Category Description" name="des" class="des" id="Cdes" >
					<p class="validate-text Dname-txt-error" >Please , enter category description  </p> 
                </div>
                </div>
				<!-- end category des -->
                </div>
                <!-- End Close -->
                <br>
                  <!--End Close Status-->
                <!--end Status -->
                <input type="submit" value="Add Category" class="submit text-center add_category" name="add_category" id="add_category">
            <br>
			</form>	
	  </div>
 
    </div>
</div>
<!-- End category overlay  --> 