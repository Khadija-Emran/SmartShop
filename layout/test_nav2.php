
<?php  
include 'temp/ini.php'; 
include 'functions/Store/StoreAction.php';
include 'functions/Catogery/CatogeryAction.php';
include 'Modal/confirm.php';
include 'Modal/delete_confrim.php';

//Define object from Catogery class
$category= new Category();
//Array To Storing Categories Data
$categoryArray=$category->GetAllCategory();
 $store=new Store();
//Array To Storing Stores Data
$storeArray=$store->GetAllStoresData();
//Define object from Catogery class

//Search Array 
$searchArray=array();
$itemSearchArray=array();
$itemCount=0;
?>
<head>
    <style>
        .search-div{
          position: absolute;
          top: 54px;
          background: #fff;
          display: none
        }
        .btn-search{
            background: #3fbbaa;
            color: #fff;
            border-bottom-left-radius: 1px;
            border-top-left-radius: 1px;
        }
        .input-group{
         border-radius: 5px;
         border: 1px solid #3fbbaa;
        }
        .cart-icon::after {
                content: "0";
                color: #fff;
                font-size: 2px;
                position: absolute;
                top: 7px;
                left: 9px;
                height: auto;
                padding: 0px 5px !important;
                width: auto;
                background-color: #dc3545;
                border-radius: 50%;
                    }
        
        .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #3fbbaa;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
         
</style>
</head>
<!-- start navbar -->

<nav class="navbar navbar-expand-md navbar-light fixed-top nav-menu justify-content-between" style="height: 61px !important;">
    <!-- start brand -->
        <!-- start Logo -->
        <a class="navbar-brand" href="#"><h2 class="text-light heading"><span class="o">SKA</span>SH<span class="cart-span"><i class="fa fa-shopping-cart o"></i></span>P</h2>
        </a>
        <!-- End Logo -->
        <!-- Start Icons -->
        <ul class="icon">
            <li class="icon-item nav-item li-search"><a class=" text-light" href="#"><i class="fa fa-search icon-items"></i>
                </a>
            </li>
     <!--Language link icon--> 
         <li class="dropdown icon-item nav-item" data-toggle="dropdown">
            <a class=" text-light dropdown-toggle mr-3"  href="#"><i class="fa fa-globe icon-items mr-0"></i></a>
            <div class="dropdown-menu" aria-labelledby="language">
                    <a class="dropdown-item" href="#">Arbic</a>
                    <a class="dropdown-item" href="#">English</a>
            </div>
         </li>
        <!--End Language link icon--> 
        <!-- User Account --> 
         <?php 
         //If has not an account
         if(!isset($_SESSION['UserID'])){
           ?>
            <li class="icon-item nav-item"><a class=" text-light" href="#" title="You Have Not An Account" data-toggle="modal" data-target="#confirm"><i class="fa fa-user icon-items"></i></a></li>
         <?php
         }//end if (has an account )
        else{
            ?>
           <li class="icon-item nav-item"><a class=" text-light" href="#" title="Go To Your Account"><i class="fa fa-user icon-items" style="border-radius: 50%;box-shadow: -1px 2px 5px 9px rgb(8 161 155);"></i></a></li>
            <?php
        }//end else  
        ?>
        <!-- End User Account -->
        <!-- Shopping cart icon -->
        <?php 
         //If There is not a cart
         if(!isset($_SESSION['cartID'])){
           ?>
            <head>
              <style>
                  .cart-icon::after {
                  content: "<?php echo 5 ;?>";
                  }
              </style>
            </head>
            <li class="icon-item nav-item" style="position: relative;" >
            <a class=" text-light cart-icon" 
               href="#" 
               title="You Have Not Cart Click To Create Cart"
               data-toggle="modal"
               data-target="#confirm">
              <i class="fa fa-shopping-cart icon-items"></i>
            </a>
            </li>
           <?php
         }//end if (There is a cart )
        else{
           ?>
            
            <li class="icon-item nav-item" style="position: relative;" >
            <a class=" text-light cart-icon" 
            href="ShoppingCart.php" 
            title="Go To Your Cart">
            <i class="fa fa-shopping-cart icon-items"></i>
            </a>
            </li>
        <?php
        }//end else
        ?>
        <!-- End Shopping cart icon -->
        <li class="icon-item nav-item" ><a class=" text-light" href="#"><i class="fa fa-map-marker icon-items mr-2"></i></a></li>
         <li class="icon-item nav-item" ><a class=" text-light" href="#"><i class="fa fa-angle-down slidBar mr-0 icon-items"></i></a></li>   
     </ul>
    <!-- End Icons -->
    <!-- End brand -->
</nav>
<div class="h-link-list wow bounceInDown">
            <!--Start nav link list -->
        <ul class="ul1">
            <li class="link-list nav-active">
                <a class="nav-link text-uppercase  mr-1" href="Home.php" >Home</a>
            </li>
            <li class="link-list"><a class="nav-link text-uppercase mr-1" href="ShowProducts.php" >Products</a></li>
               
            <li class="link-list"><a class="nav-link text-uppercase mr-1" href="#" >ِAbout</a></li>
            <li class="link-list"><a class="nav-link text-uppercase mr-1" href="#" >Contact</a></li>    
         </ul>
        <!--Start nav link list -->
</div>
<!-- Search Form  --> 


<div class="dropdown">
  <a class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="Login.php">HTML</a></li>
    <li><a href="Stores.php">CSS</a></li>
    <li><a href="ShowProducts.php">JavaScript</a></li>
  </ul>
</div>
<ul class="row">
 <li class="dropdown">
  <a class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example2222222222
  <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="Login.php">HTML</a></li>
    <li><a href="Stores.php">CSS</a></li>
    <li><a href="ShowProducts.php">JavaScript</a></li>
  </ul>
 </li>
  <li class="dropdown">
  <a class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example33333333
  <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="Login.php">HTML000000</a></li>
    <li><a href="Stores.php">CSS0000000</a></li>
    <li><a href="ShowProducts.php">JavaScript000000000</a></li>
  </ul>
 </li>
</ul>

<!-- Catogeries Link--> 
          <ul>
              ///////////
              
            <li class="dropdown link-list">
                <!--Generate Catogeries List--> 
                <a class="nav-link text-uppercase mr-1 dropdown-toggle" data-toggle="dropdown">Categories
                </a>
                <!--Dropdown list (Categories Names)-->
                    <ul class="dropdown-menu">
                        <?php
                        //Generate drowpdown from categories names 
                        foreach($categoryArray as $key=>$value){
                          //Category Data
                         $itemCount++;
                          $CategoryID=$categoryArray[$key];
                          CatogeryObject($category,$CategoryID);
                          $CategName=$category->getCatogName();
                          $CategDes=$category->getCatogDes();
                          $categorylink="Category.php?categoryID=$CategoryID";
                            
                          //add to search array 
                          
                          $itemSearchArray['itemID']=$CategoryID;
                          $itemSearchArray['type']='Category';
                          $itemSearchArray['itemName']=$CategName;
                          $itemSearchArray['itemDes']=$CategDes;
                          
                          $searchArray[$itemCount]=$itemSearchArray;
                        ?>
                        <li><a class="dropdown-item text-dark" href="<?php echo $categorylink ; ?>"><?php echo $CategName; ?></a></li>
                        <?php
                        }//end foreach
                        ?>
                      </ul>
                    </li>             
            <li class="dropdown link-list">
                <!--Generate Stores List--> 
                <a class="nav-link text-uppercase mr-1 dropdown-toggle" data-toggle="dropdown">Stores
                </a>
                <!--Dropdown list (Stores Names)-->
                    <ul class="dropdown-menu">
                        <?php
                        //Generate drowpdown from stores names 
                        foreach($storeArray as $key=>$value){
                            $itemCount++;
                          $storeID=$storeArray[$key];
                          StoreObject($store,$storeID);
                          $storeName=$store->getStoreName();
                          $storeDes=$store->getStoreDes();
                          $storelink="Show_Store.php?storeID=$storeID";
                          
                          //add to search array
                          
                          $itemSearchArray['itemID']=$storeID;
                          $itemSearchArray['type']='Store';
                          $itemSearchArray['itemName']=$storeName;
                          $itemSearchArray['itemDes']=$storeDes;
                          $searchArray[$itemCount]=$itemSearchArray;
                        ?>
                        <li><a class="dropdown-item text-dark" href="<?php echo $storelink ; ?>"><?php echo $storeName; ?></a></li>
                        <?php
                        }//end foreach
                        ?>
                      </ul>
                    </li>
              
              ///////////
                </ul>
    
                <!--End Dropdown list (Stores Names)-->
                <!--Generate stores List--> 
            <!-- Catogeries Link--> 















<div class="container-fluid search-div">
                <form>
                  <div class="input-group mt-1" style="box-shadow: 3px 3px 4px #eee;">
                    <input type="search" class="form-control inpu-search" placeholder="Search">
                      <!-- End Search Input -->
                      <!-- Submit Search Input -->
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-search" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <div class="input-group-btn">
                      <button class="btn btn-default text-danger" type="">
                        <i class="fa fa-close"></i>
                      </button>
                    </div>
                 <!--End Submit Search Input -->
                  </div>
                </form>
    <table class="table table-striped bg-light text-center">
        <tbody>
            <?php echo count($searchArray);
             
            foreach($searchArray as $key => $value){
                $itemID=$searchArray[$key]['itemID'];
                $type=$searchArray[$key]['type'];
                $itemName=$searchArray[$key]['itemName'];
                $itemDes=$searchArray[$key]['itemDes'];
              
            ?>
            <tr id="<?php echo $itemID?>">
                <td><?php echo $type ; ?></td>
                <td><?php echo $itemName ; ?></td>
                <td><?php echo $itemDes ; ?></td>
            </tr>
            <?php
            }//end foreach
            ?>
            
        </tbody>
    </table>
    </div>
<!-- End Search Form  --> 

    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="customRadio1" name="example2">
      <label class="custom-control-label" for="customRadio1">Custom radio</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="customRadio2" name="example2">
      <label class="custom-control-label" for="customRadio2">Custom radio</label>
    </div>
  <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="customRadio3" name="example2">
      <label class="custom-control-label" for="customRadio3">Custom radio</label>
    </div>

<div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>

<button class="show-lightbox">shpw lightBox</button>
<!-- Start overlay --> 
<div id="overlay" class="overlay overlay-product">
    <i class="fa fa-close close text-light mr-3 mt-4 fa-2x p-2"  id='Close' style="position: fixed;
    left: 84%;z-index: 10000000000;"></i>
    <div class="overlay-content">
        <div class="container-fluid">
    <h3 class="title-style">Add New Product</h3>
    <!-- form for add product-->
			  <form 
                    action="" 
                    method="post" class="product-add-form" enctype="multipart/form-data">
                  
               <input type="hidden" id="selectedID" name="selectedID">
                   <img 
                        src="images/img2.png" 
                        class="ImgUpload mt-4 mb-2"
                        id="ImgUpload">
                   <!-- Product Image -->
            
                  <div class="custom-file ">
                  <input type="file" class="custom-file-input ProImg ImgfileInput" 
                  id="customFile"
                  name="ProImg" 
                  required
                   >
                  <label class="custom-file-label" for="customFile">Choose Photo For Product <i class="fa fa-image"></i></label>
                  </div>
                <!-- end  Product Image -->
             	<!-- Product name -->
                <div class="input-div row mt-2">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Name</span>
                    <input type="text" 
                           placeholder="Product Name" 
                           name="proName" 
                           id="proName"
                           class="form-control product-input col col-sm-8 col-12 mb-2 mt-2" autocomplete="off" required> 
                </div>
				<!-- end  Product name -->
				<!-- Product Description -->
                <div class="input-div row">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Description</span>
                    <textarea  
                              placeholder="Product Description" name="proDes" 
                              id="proDes"
                              class="form-control product-input col col-sm-8 col-12 mb-2 mt-2" autocomplete="off" required></textarea>
                </div>
				<!-- end  Product Description -->
			    <!-- Product price -->
                <div class="input-div row ">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Name</span>
                    <input type="text" 
                           placeholder="Product Price" name="proPrice" 
                           id="proPrice"
                           class="form-control product-input col col-sm-8 col-12 mb-2 mt-2" autocomplete="off" required> 
                </div>
				<!-- end  Product price -->
			   <!-- Product Quantity -->
                <div class="input-div row">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Product Quantity</span>
                    <input type="text" 
                           placeholder="Quantity" 
                           name="proQuantity"
                           id="proQuantity"
                           class="form-control product-input col col-sm-8 col-12 mb-2 mt-2" autocomplete="off" required> 
                </div>
				<!-- end  Product Quantity -->

				<!-- Product Category -->
                  
                <div class="input-div row">
                    <span class="col col-sm-3 col-12 text-right span-info" style="">Chose Category</span>
                    <select  
                            name="categories" 
                            id="ProCategory" 
                            class="form-control product-input product-img col col-sm-8 col-12 mb-2 mt-2"  required>
						<option value="0" selected disabled>Chose</option>
                        <option value="1"  class="category_option" id="1"><button class="btn btn-danger">Add Catogery</button></option>
                        <option value="2"  class="category_option" id="2">one</option>
                        <option value="3"  class="category_option" id="3">two</option>
                        <option value="4"  class="category_option" id="4">three</option>
						<?php 
	                    $selectProduct="SELECT * FROM category";
						$resultProduct=mysqli_query($db,$selectProduct);
						if($resultProduct==TRUE){
							while($row=mysqli_fetch_assoc($resultProduct)){?>
							  <option value="<?php echo $row['CategoryID']?>"><?php echo $row['CategName'] ?></option>
						      <?php
							}//end while
						}//end if
						?>
					 </select>
                </div>
				<!-- end  Product Category -->
				<!-- submit Form -->
                  
				    <input 
                           type="submit" 
                           value="Add Product" 
                           class="submit text-center btn mt-3 mb-5" 
                           id="SubmitProForm" 
                           name="Add_Product">
                  <!--end submit Form -->
			</form>
			<!--end form for add product-->
    </div>
    </div></div>
<!-- End overlay --> 
<button class="show_user">show user</button>
<!-- overlay user -->
<!-- Start overlay --> 
<div id="overlay" class="overlay overlay-user">
    <i class="fa fa-close close text-light mr-3 mt-4 fa-2x p-2"  id='Close' style="position: fixed;
    left: 95%;z-index: 10000000000;"></i>
    <div class="overlay-content">
        <div class="login  text-center" >
			
         <h3 class="title-style " id="user_title">Create An Account</h3>
				<form action="" method="post" class="Reg-form" enctype="multipart/form-data">
                    <div class="content" style="width: 420px;margin: auto;">
			<div class="choose-Account">
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
                </div></div>
				<div>
                    <input type="hidden" id="selectedID" name="selectedID">
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
                  required
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
                    <input type="text" placeholder="Your Name" name="name" class="name" autocomplete="off" required id="userName"> 
                  
                    
					<p class="validate-text name-txt-error" >Please , enter your name </p>
                </div>
                </div>
				<!-- end  name -->
				<!-- full name -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info " style="">Full Name</span>
				<div class="input-div  col col-sm-8 col-12">
                    <span class="icon-span"><i class=" fa fa-user lock"></i></span>

                    <input type="text" placeholder="Your full Name" name="Fname" class="Fname"  >
					<p class="validate-text Fname-txt-error" >Please , enter your full name  </p> 
                </div>
                </div>
				<!-- end full name -->
				<!-- Address-->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info " style="">Address</span>
				<div class="input-div  col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-home lock"></i></span>
                    
                    <input type="text" placeholder="Your Address" name="Address" class="Address"  >
					<p class="validate-text Address-txt-error" >Please , enter your Address  </p> 
                </div>
                </div>
				<!-- end Address  -->
			    <!-- Phone Number -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info " style="">Phone Number</span>
				<div class="input-div  col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-phone lock "></i></span>
                    <input type="text" placeholder="Phone Number" name="phone" class="phone"  >
					<p class="validate-text phone-txt-error" >Please , enter your phone number  </p> 
                    </div>
                    </div>
				<!-- end Phone Number -->
				<!-- email -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Email</span>
                <div class="input-div col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-envelope envelope   "></i></span>
                    
                    <input type="email" placeholder="Your Email"  name="email" class="email" autocomplete="off" required>
					<p class="validate-text email-txt-error" >Please , enter your email </p>
                    </div>
                </div>
				<!-- end email -->
				<!-- password -->
                <div class="row">
                <span class="col col-sm-3 col-12 text-right span-info" style="">Password</span>
                <div class="input-div col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-lock lock"></i></span>
                    
                    <input type="password" placeholder="Your Password" name="pass" class="pass" required>
					<p class="validate-text pass-txt-error" >Please , enter password </p>
                    </div>
                </div>
				<!-- end password -->
				<!-- Confirmation Password password -->
                <div class="row disappear">
                <span class="col col-sm-3 col-12 text-right span-info disappear" style="">Confirmation Password</span>
				<div class="input-div disappear col col-sm-8 col-12">
                    <span class="icon-span"><i class="fa fa-lock lock "></i></span>
                    
                    <input type="password" placeholder="Confirmation Password" name="cpass" class="cpass" required >
					<p class="validate-text cpass-txt-error" >At First !!! Please , enter password  </p>
					<p class="validate-text not-C-txt-error" >Password Not Confirmation  </p>
                </div>
                </div>
             </div>
				<!--end  Confirmation Password password -->
                <input type="submit" value="SIGN IN" class="submit text-center signIn" name="sign">
            <br>
			<a href="Login.php" class="log_a">I Have account </a>
			</form>
	    </div>
    </div>
</div>
<!-- overlay user -->
<!-- End navbar -->
<div class="container">
  <h2>Toggleable Tabs</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>
<button class="delete_item_test" id="1" data-toggle="modal" data-target="#delete_confrim">Delete User</button>

<button class="delete_item_test" id="2" data-toggle="modal" data-target="#delete_confrim">Delete store</button>

<button class="delete_item_test" id="3" data-toggle="modal" data-target="#delete_confrim">Delete category</button>

<button class="delete_item_test" id="4" data-toggle="modal" data-target="#delete_confrim">Delete product</button>
<p id="p1">Hello World!</p>
<button class="change_p">Change</button>
<label class="switch">
  <input type="checkbox" checked class="check_active">
  <span class="slider round"></span>
</label>
<table class="table table-striped bg-light text-center">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>des</th>
        <th>photo</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Khadija</td>
        <td>hhhhhhhky8kko,mnnjk</td>
        <?php $img='images/upload/179.jpg'; ?>
        <td class="disappear"><?php echo $img ?></td>
        <td><img src="images/upload/179.jpg" ></td>
        <td><a 
                         class="delete_item"
                         data-toggle="modal"
                         data-target="#delete_confrim"
                         title="Delete this user" 
                         data-placement="top"
                         id="1"
                         >
                         <i class="fa fa-trash text-danger" style="font-size: 15px;">
                         </i>
                         </a></td>
    </tr>
</table>









<?php include 'temp/footer.php'?>
<script>
    /*
$('.delete_item').click(function(){
    var tr=$(this).closest('tr');
     var data=tr.children('td').map(function(){
     return $(this).text();
    }).get();
    console.log(data);
    var id =$(this).attr('id');
        if(id==1){
          $('.delete_img').prop('src',data[3]);
            $('#delete_ItemID').val(data[0]);
            document.getElementById("delete_title").innerHTML = "Delete User";
             document.getElementById("delete_name").innerHTML = data[1] ;
            document.getElementById("delete_message").innerHTML = "Do you want to delete this user ? ";
            $('.final_delete').prop('name','final_delet_user');
         console.log('delete user');
        }
    
    
    
    console.log('[0] '+data[0]);
    console.log('[1] '+data[1]);
    console.log('[2] '+data[2]);
    console.log('[3] '+data[3]);
    console.log('[4] '+data[4]);
});
$('.change_p').click(function(){
    document.getElementById("p1").innerHTML = "New text!";
     console.log('change');
});

    $('.delete_item_test').click(function(){
        var id =$(this).attr('id');
        if(id==1){
          $('.delete_img').prop('src','images/upload/book.jpg');
            $('#delete_ItemID').val(7);
            document.getElementById("delete_title").innerHTML = "Delete User";
             document.getElementById("delete_name").innerHTML = "Khadija";
            document.getElementById("delete_message").innerHTML = "Do you want to delete this user ? ";  
         console.log('delete user');
        }
        else if(id==2){
          $('.delete_img').prop('src','images/upload/choc.jpg');
            $('#delete_ItemID').val(8);
            document.getElementById("delete_title").innerHTML = "Delete Store";
             document.getElementById("delete_name").innerHTML = "Chockelet";
            document.getElementById("delete_message").innerHTML = "Do you want to delete this store ? ";  
         console.log('delete store');
        }
        else if(id==3){
          $('.delete_img').prop('src','images/upload/ele.jpg');
            $('#delete_ItemID').val(5);
            document.getElementById("delete_title").innerHTML = "Delete Category";
             document.getElementById("delete_name").innerHTML = "Elctronic";
            document.getElementById("delete_message").innerHTML = "Do you want to delete this category ? ";  
         console.log('delete category');
        }
        else if(id==4){
          $('.delete_img').prop('src','images/upload/star-earing.jpg');
            $('#delete_ItemID').val(9);
            document.getElementById("delete_title").innerHTML = "Delete Product";
             document.getElementById("delete_name").innerHTML = "Star Earing";
            document.getElementById("delete_message").innerHTML = "Do you want to delete this product ? ";  
         console.log('delete product');
        }
        
    });
    $('.show-lightbox').click(function(){
        $('.overlay-product').fadeIn();
    });
     $('.show_user').click(function(){
        document.getElementById("user_title").innerHTML = "Show User";
        $('.overlay-user').fadeIn();
        $('.choose-Account').hide();
        $('.signIn').hide();
        $('.log_a').hide();
        $('.custom-file').addClass('disappear');
        $('.name').prop('disabled','true');
        $('.pass').prop('disabled','true');
        $('.cpass').prop('disabled','true');
        $('.email').prop('disabled','true');
        $('.Fname').prop('disabled','true');
        $('.phone').prop('disabled','true');
        $('.Address').prop('disabled','true');
         
    });
    $('close').click(function(){
        $(this).parent().fadeOut(10);
        console.log('close');
    }); 
    $('.li-search').click(function(){
       $('.li-search a i').hide();
       $('.search-div').slideToggle(500);
    });
    $('.search-div .fa-close').click(function(){
       $('.search-div').fadeOut() ;
       $('.li-search a i').show();
    });
    /*
        //Submit  product add form
    $('.product-add-form').submit(function(event){
         //check if the user choose image for product 
         //if file do not selected
         if($('.ProImg')[0].files.length == 0){
          console.log('No file upload');
          $('.ProImg').insertAftern('<p class="p-3 bg-danger text-light">Please , Choose  Impage </p>');
          event.preventDefault();
          }//end if
    });

    
    //$('.check_active').cli
    // Add the following code if you want the name of the file appear on select
//$(".custom-file-input").on("change", function() {
 // var fileName = $(this).val().split("\\").pop();
  //$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
//});*/
</script>