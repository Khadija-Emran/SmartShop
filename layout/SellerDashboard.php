<title>Seller Dashboard</title>
<?php 
//require_once('functions/User/UserAction.php');
//require_once('functions/ProductActions.php');
//require_once('functions/Catogery/CatogeryAction.php');
//include 'functions/Check_errors/ckeck_image.php';
session_start();
//if UserID is existing
if(isset($_SESSION['UserID'])&&isset($_SESSION['StoreID'])){
include 'temp/userHeader.php';
//require_once ('Modal/delete_confrim.php');

//Define object from Catogery class
 $category= new Category();
?>


    <!-- cards -->
    <section class="mt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
			<!--Store -->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-line-chart fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h5>Chart</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
				<!--end store card -->
				<!--likes -->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-thumbs-up fa-3x" style="color: #7fc99f!important"></i>
                      <div class="text-right text-secondary">
                        <h5>Likes</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
				<!--end likes-->
				<!--sales-->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-shopping-cart fa-3x text-warning"></i>
                      <div class="text-right text-secondary">
                        <h5>Sales</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
				<!--end sales-->
                <!--Visitors-->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-users fa-3x basal-color"></i>
                      <div class="text-right text-secondary">
                        <h5>Visitors</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
			<!--Visitors-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of cards -->

    <!-- tables -->
    <section>
      <div class="container-fluid">
        <div class="row mb-5">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-6 col-12 mb-4 mb-xl-0 pl-0 pr-0" style="border-radius: 5px;
               box-shadow: 1px 2px 5px #999;">
                <h3 class="text-muted text-center mb-3 mt-2">Your Products</h3>
                <div class="pb-2 pl-2 pr-2 mb-2 justify-content-between" style="display: flex;">
                    <?php
                     //StoreID
                      $storeID=$_SESSION['StoreID'];
					  //Array To Storing Product Data
					  $allRows=array();
					  $allRows=$product->GetProduct_Of_Store($storeID);
                    ?>
                    <button class="btn show-add-overlay dark-basal-color"><i class="fa fa-plus pr-2"></i>Add Product</button>
                    <input type="text" class="text-light btn" value="<?php echo count($allRows).'  Products';?>" disabled style="background: #3fbbaa !important;">
                </div>
                <div style="max-height: 75vh; overflow: auto;">
                <table class="table table-striped bg-light text-center">
                <?php
                      //if store is empty
                    if(count($allRows)==0){
                        $message='Your Store Is Empty  !';
                        echo AlertInfo($message);
                    }//end if
                     //otherwise if store has products
                     else{
                 ?>
                  <thead>
                    <tr class="text-muted">
                      <th>#</th>
                      <th class="disappear">ProductID</th>
                      <th>Photo</th>
                      <th class="disappear"></th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th class="disappear">Description</th>
                      <th class="disappear">Catogery</th>
                      <th class="disappear">Quantity</th>
                    <th colspan="2">Action</th>
                    <th class="disappear">store</th>
                    <th class="disappear">stutusID</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                      $rowCount=0;
					  foreach($allRows as $key=>$value){
                          $rowCount++;
                          //Product ID
                         $productID=$allRows[$key];
                          //Product Object To Get Its Data 
                         ProductObject($product,$productID);
						  //Product Data
                         $proName =$product->getProName();
                         $proImage =$product->getProImage();
                         $proDes =$product->getProDes();
                         $proPrice =$product->getPrice();
                         $proQuntity =$product->getQuantity();
                         $proStatus =$product->getProStatus();
                         $proCatogery =$product->getCatogeryID();
                         $proStore =$product->getStoreId();
                          
                          if($proStatus==1){
                              $productStatus="<span class='span-basal-color '>Avaliable</span>";
                          }
                          else if($proStatus==0){
                              $productStatus="<span class='text-light span-basal-color  bg-danger'>Locked</span>";
                          }
                           else if($proStatus==2){
                              $productStatus="<span class='span-basal-color dark-basal-color'>Approved</span>";
                          }
                          
                         //End Product Data
						  //$product->CreateProductRow($rowCount,$proImage,$proName,$proPrice,$productID,$proStatus,$proDes,$proQuntity,$proCatogery); 
                         echo'<tr>' ;
                         echo'<td>'.$rowCount.'</td>' ;
                         echo'<td class="disappear">'.$productID.'</td>' ;
                         echo'<td><img src='.$proImage.' width=60 height=60/><span class="disappear">'.$proImage.'</span></td>' ;
                         echo'<td class="disappear"></td>' ;
                         echo'<td>'.$proName.'</td>' ;
                         echo'<td>'.$proPrice.'</td>' ;

                        //hidden field
                        echo'<td>'.$productStatus.'</td>' ;
                        echo'<td class="disappear">'.$proDes.'</td>' ;
                        echo'<td class="disappear">'.$proCatogery.'</td>' ;
                        echo'<td class="disappear">'.$proQuntity.'</td>' ;
                        echo '<td>
                         <a 
                         class="updateButton"
                         data-toggle="modal"
                         data-target="#update-product"
                         title="edit this product" 
                         data-placement="top"
                         id="'.$productID.'"
                         >
                         <i class="fa fa-edit fa-lg text-success">
                         </i>
                         </a>
                         </td>';
                          echo '<td>
                         <a
                         class="delete_product"
                         data-toggle="modal"
                         data-target="#delete_confrim"
                         title="Delete this product" 
                         data-placement="top"
                         >
                         <i class="fa fa-trash fa-lg text-danger" >
                         </i>
                         </a>
                         </td>';
                          echo'<td class="disappear">'.$proStore.'</td>' ;
                          echo'<td class="disappear">'.$proStatus.'</td>' ;
                       echo'</tr>';
            }//end for
         }//end else		  
      ?>
                </tbody>
                </table>

                <!-- pagination -->
               <!-- <nav>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>&laquo;;</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a href="#" class="page-link py-2 px-3">
                        1
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        2
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        3
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- end of pagination -->

                </div></div>
              <div class="col-xl-6 col-12">
                <h3 class="text-muted text-center mb-3">Recent Payments</h3>
                <table class="table table-dark table-hover text-center">
                  <thead>
                    <tr class="text-muted">
                      <th>#</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>1</th>
                      <td>Monica</td>
                      <td>$2000</td>
                      <td>25/05/2020</td>
                      <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                    </tr>
                  </tbody>
                </table>
                 <!-- pagination -->
                 <nav>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>Previous</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a href="#" class="page-link py-2 px-3">
                        1
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        2
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        3
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- end of pagination -->
              </div>
            
                </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of tables -->
   
    <!-- progress / task list -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row mb-4 align-items-center">
              <div class="col-xl-6 col-12 mb-4 mb-xl-0">
                <div class="bg-dark text-white p-4 rounded">
                  <h4 class="mb-5">Coversion Rates</h4>
                  <h6 class="mb-3">Google Chrome</h6>
                  <div class="progress mb-4" style="height: 20px">
                    <div class="progress-bar progress-bar-striped font-weight-bold" style="width: 91%">
                      91%
                    </div>
                  </div>
                  <h6 class="mb-3">Mozilla Firefox</h6>
                  <div class="progress mb-4" style="height: 20px">
                    <div class="progress-bar progress-bar-striped font-weight-bold bg-success" style="width: 82%">
                      82%
                    </div>
                  </div>
                  <h6 class="mb-3">Safari</h6>
                  <div class="progress mb-4" style="height: 20px">
                    <div class="progress-bar progress-bar-striped font-weight-bold bg-danger" style="width: 67%">
                      67%
                    </div>
                  </div>
                  <h6 class="mb-3">IE</h6>
                  <div class="progress mb-4" style="height: 20px">
                    <div class="progress-bar progress-bar-striped font-weight-bold bg-info" style="width: 10%">
                      10%
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-12">
                <h4 class="text-muted p-3 mb-3">Tasks:</h4>
                <div class="container-fluid bg-white">
                  <div class="row py-3 mb-4 task-border align-items-center">
                    <div class="col-1">
                      <input type="checkbox" checked>
                    </div>
                    <div class="col-sm-9 col-8">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>edit</h6>" data-html="true" data-placement="top"><i class="fa fa-edit fa-lg text-success mr-2"></i></a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fa fa-trash fa-lg text-danger"></i></a>
                    </div>
                  </div>
                </div>
                <div class="container-fluid bg-white">
                  <div class="row py-3 mb-4 task-border align-items-center">
                    <div class="col-1">
                      <input type="checkbox" checked>
                    </div>
                    <div class="col-sm-9 col-8">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>edit</h6>" data-html="true" data-placement="top"><i class="fa fa-edit fa-lg text-success mr-2"></i></a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fa fa-trash fa-lg text-danger"></i></a>
                    </div>
                  </div>
                </div>
                <div class="container-fluid bg-white">
                  <div class="row py-3 mb-4 task-border align-items-center">
                    <div class="col-1">
                      <input type="checkbox" checked>
                    </div>
                    <div class="col-sm-9 col-8">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>edit</h6>" data-html="true" data-placement="top"><i class="fa fa-edit fa-lg text-success mr-2"></i></a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fa fa-trash fa-lg text-danger"></i></a>
                    </div>
                  </div>
                </div>
                <div class="container-fluid bg-white">
                  <div class="row py-3 mb-4 task-border align-items-center">
                    <div class="col-1">
                      <input type="checkbox" checked>
                    </div>
                    <div class="col-sm-9 col-8">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>edit</h6>" data-html="true" data-placement="top"><i class="fa fa-edit fa-lg text-success mr-2"></i></a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fa fa-trash fa-lg text-danger"></i></a>
                    </div>
                  </div>
                </div>
                <div class="container-fluid bg-white">
                  <div class="row py-3 mb-4 task-border align-items-center">
                    <div class="col-1">
                      <input type="checkbox" checked>
                    </div>
                    <div class="col-sm-9 col-8">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>edit</h6>" data-html="true" data-placement="top"><i class="fa fa-edit fa-lg text-success mr-2"></i></a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>delete</h6>" data-html="true" data-placement="top"><i class="fa fa-trash fa-lg text-danger"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of progress / task list -->

    <!-- activities / quick post -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center mb-5">
              <div class="col-xl-7">
                <h4 class="text-muted mb-4">Recent Customer Activities</h4>
                <div id="accordion">
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseOne">
                        <img src="images/cart-com3.jpg" width="50" class="mr-3 rounded">
                        John posted a new comment
                      </button>
                    </div>
                    <div class="collapse show" id="collapseOne" data-parent="#accordion">
                      <div class="card-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum modi delectus fugiat consectetur eaque harum obcaecati, saepe id vitae, dolore aliquam! Quos, doloribus quisquam.
                      </div>                      
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseTwo">
                        <img src="images/cart-com3.jpg" width="50" class="mr-3 rounded">
                        Mark posted a new comment
                      </button>
                    </div>
                    <div class="collapse" id="collapseTwo" data-parent="#accordion">
                      <div class="card-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum modi delectus fugiat consectetur eaque harum obcaecati, saepe id vitae, dolore aliquam! Quos, doloribus quisquam.
                      </div>                      
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseThree">
                        <img src="images/cart-com3.jpg" width="50" class="mr-3 rounded">
                        Monica posted a new comment
                      </button>
                    </div>
                    <div class="collapse" id="collapseThree" data-parent="#accordion">
                      <div class="card-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum modi delectus fugiat consectetur eaque harum obcaecati, saepe id vitae, dolore aliquam! Quos, doloribus quisquam.
                      </div>                      
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFour">
                        <img src="images/cart-com3.jpg" width="50" class="mr-3 rounded">
                        Vivien posted a new comment
                      </button>
                    </div>
                    <div class="collapse" id="collapseFour" data-parent="#accordion">
                      <div class="card-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum modi delectus fugiat consectetur eaque harum obcaecati, saepe id vitae, dolore aliquam! Quos, doloribus quisquam.
                      </div>                      
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFive">
                        <img src="images/cart-com3.jpg" width="50" class="mr-3 rounded">
                        Nick posted a new comment
                      </button>
                    </div>
                    <div class="collapse" id="collapseFive" data-parent="#accordion">
                      <div class="card-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum modi delectus fugiat consectetur eaque harum obcaecati, saepe id vitae, dolore aliquam! Quos, doloribus quisquam.
                      </div>                      
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseSix">
                        <img src="images/cart-com3.jpg" width="50" class="mr-3 rounded">
                        Ann posted a new comment
                      </button>
                    </div>
                    <div class="collapse" id="collapseSix" data-parent="#accordion">
                      <div class="card-body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis earum modi delectus fugiat consectetur eaque harum obcaecati, saepe id vitae, dolore aliquam! Quos, doloribus quisquam.
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-5 mt-5">
                <div class="card rounded">
                  <div class="card-body">
                    <h5 class="text-muted text-center mb-4">Quick Status Post</h5>
                    <ul class="list-inline text-center py-3">
                      <li class="list-inline-item mr-4">
                        <a href="#">
                          <i class="fa fa-pencil text-success"></i>
                          <span class="h6 text-muted">Status</span>
                        </a>
                      </li>
                      <li class="list-inline-item mr-4">
                        <a href="#">
                          <i class="fa fa-camera text-info"></i>
                          <span class="h6 text-muted">Photo</span>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-map-marker text-primary"></i>
                          <span class="h6 text-muted">Check-in</span>
                        </a>
                      </li>
                    </ul>
                    <form>
                      <div class="form-group">
                        <input type="text" class="form-control py-2 mb-3" placeholder="What's Your Status...">
                        <button type="button" class="btn btn-block text-uppercase font-weight-bold text-light btn-info  py-2 mb-5">Submit Post</button>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col-6">
                        <div class="card bg-light">
                          <i class="fa fa-calendar fa-8x text-warning d-block m-auto py-3"></i>
                          <div class="card-body">
                            <p class="card-text text-center font-weight-bold text-uppercase">Mon, may 26</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="card bg-light">
                          <i class="fa fa-clock-o fa-8x text-danger d-block m-auto py-3"></i>
                          <div class="card-body">
                            <p class="card-text text-center font-weight-bold text-uppercase">3:50 am</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- end of activities / quick post -->
<!--product overlay-->
<?php require_once ('Modal/overlay/product_overlay.php'); ?>
<!--end product overlay-->
<!--start footer -->
	<?php
	//include 'include/Admin-footer.php';
	?>
<!--end footer -->
<?php

}//end if (UserID is existing)
//otherwise if UserID is not existing
else{
    $alertTitle='You Have Not Permission To Enter To This Page !';
    $question='Do You Want To Create  A Seller Account ?';
    $yesLink='SignUp.php';
    $NoLink='#';
    echo AlertMessage($alertTitle,$question,$yesLink,$NoLink);
}//end else
?>
<script>  
    //Close  Overlay 
     $('#Close').click(function(){
        $(this).parent().fadeOut(10);
        console.log('close');
    });
    //Show Add overlay
    $('.show-add-overlay').click(function(){
        $('.overlay-product').fadeIn(1000);
        console.log('open');
        //input value
        $('.StoreInput').hide();
        $('.update-title').css('display','none');
        $('.add-title').css('display','block');
        $('.ImgfileInput').prop('required',true);
        $('#product-form').removeClass('product-update-form');
        $('#product-form').addClass('product-add-form');
        //to uploade Image
        $('#ProImg').prop('name','ProImg');
        $('#selectedID').val("");
        $('#ImgUpload').prop('src',"images/img2.png");
        $('#proName').val("");
        $('#proPrice').val("");
        $('#proDes').val("");
        $('#ProCategory').val("");
        $('#proQuantity').val("");
        $('.ImgUpload').css('opacity','.5');
        $('#SubmitProForm').prop('value','Add Product');
        $('#SubmitProForm').prop('name','Add_Product');
    });
    
    
    //Show selected raw in modal and send id via Update Button
	$('.updateButton').click(function(){
        $('.StoreInput').hide();
        $('.overlay-product').fadeIn(1000);
        $('#product-form').addClass('product-update-form');
        $('#product-form').removeClass('product-add-form');
        $('.add-title').css('display','none');
        $('.update-title').css('display','block');
        $('.ImgfileInput').prop('required',false);
        var selectedID=$(this).attr('id');
        var tr=$(this).closest('tr');
        var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           var data=tr.children('td').map(function(){
               return $(this).text();
           }).get();
            console.log(data);
          //to uploade Image
           $('.selectedID').val(data[1]);
           $('.ImgUpload').prop('src',data[2]);
           $('.currentImg').val(data[2]);
           $('#proName').val(data[4]);
           $('#proPrice').val(data[5]);
           $('#proDes').val(data[7]);
           $('#ProCategory').val(data[8]);
           $('#proQuantity').val(data[9]);
           $('#store').val(data[11]);
           
           
           //$('#product-action').modal();
           $('.ImgUpload').css('opacity','1');
           $('#booked').prop('disabled',false);
           $('#SubmitProForm').prop('value','Update Product');
           $('#SubmitProForm').prop('name','Update_Product');
          console.log(selectedID);
         }//end if
    };
    xmlhttp.open("GET", "functions/ProductActions.php?selectedID=" + selectedID, true);
    xmlhttp.send();
  });
 //End Show selected raw in modal and send id via Update Button
  //Show selected raw in modal and send id via Delete Button
    
	/*$('.deleteButton').click(function(){
        var selectedID=$(this).attr('id');
        var tr=$(this).closest('tr');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           
           var data=tr.children('td').map(function(){
               return $(this).text();
           }).get();
            console.log(data);
          //send id 
           $('#selectedIDD').val(data[0]);
          
            //show modal
           //$('#delete_product').modal();
          console.log(selectedID);
          
         }
    };
    xmlhttp.open("GET", "functions/ProductActions.php?selectedID=" + selectedID, true);
    xmlhttp.send();
  });*/
    
     //delete product
    $('.delete_product').click(function(){
        deleteProduct($(this));
    });//end delete product
 //End Show selected raw in modal and send id via Delete Delete
    function filePreview(input){
            if(input.files&&input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('.form +img').remove();
                    $('.ImgUpload').prop('src',e.target.result);
                     $('.ImgUpload').css('opacity','1');
                    
                };
                reader.readAsDataURL(input.files[0]);
            }//end if
        }//end function
        $('.ImgfileInput').change(function(){
        filePreview(this); 
        console('preview');
        });
    //Submit  product  form
    /*$('.product-form').submit(function(event){
         //check if the user choose image for product 
         //if file do not selected
         if($('.ProImg')[0].files.length == 0){
          console.log('No file upload');
          $('.ProImg').prop('name','existing');
          //event.preventDefault();
          }//end if
          //otherwise if file selected
          else{
          $('.ProImg').prop('name','ProImg');
         }//end else
    });*/
    function deleteProduct(item){
        var data=getDataFromRow(item);
          console.log(data);
           $('.delete_img').prop('src',data[2]);
           $('#delete_ItemID').val(data[1]);
            document.getElementById("delete_title").innerHTML = "Delete Product";
             document.getElementById("delete_name").innerHTML = data[4] ;
            document.getElementById("delete_message").innerHTML = "Do you want to delete this product ? ";
            $('.final_delete').prop('name','Delete_Product');
         console.log('delete product'); 
    }//end function
    
    function getDataFromRow(item){
    var tr=item.closest('tr');
    var data=tr.children('td').map(function(){
     return $(this).text();
    }).get();
   return data;
}//end function
    
     //Submit  product add form
   /* $('.product-add-form').submit(function(event){
         //check if the user choose image for product 
         //if file do not selected
         if($('.ProImg')[0].files.length == 0){
          console.log('No file upload');
          $('.ProImg').insertAftern('<p class="p-3 bg-danger text-light">Please , Choose  Impage </p>');
          event.preventDefault();
          }//end if
    });*/
    
</script>
