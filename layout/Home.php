<!--start Header -->
	<?php
	require_once('temp/Header.php');
    //require_once('functions/ProductActions.php');
	?>
<!--end Header -->

<!-- start Category Section -->
    <section class="category">
      <div class="container">
        <!-- title -->
        <div class="row">
          <div class="col text-center py-5">
            <h1 class="text-secondary text-uppercase font-italic cate-title">Category Section</h1>
          </div>
        </div>
        <!-- end of title -->
		  <!-- start row -->
        <div class="row mb-4 first-row align-items-end text-center">
            
            <?php
                  //Define object from Category class
                  $category= new Category();
                  $categoryArray=$category->GetAllCategory();
                  foreach($categoryArray as $key=>$value){
                  //Category Data
                  $CategoryID=$categoryArray[$key];
                  CatogeryObject($category,$CategoryID);
                  $CategName=$category->getCatogName();
                  $CategoryImg=$category->getCatoPhoto();
                  $CategoryDes=$category->getCatogDes();
                  ?>
                <div class="col-lg-3 col-sm-6 col-10 mx-auto mb-3">
                <a href="<?php echo $CategoryImg ; ?>" data-lightbox="library" data-title="<?php echo $CategoryDes ; ?>">
                  <img src="<?php echo $CategoryImg ;?>" class="img-thumbnail category-img">
                </a>
                <h3><?php echo $CategName?></h3>
                <a href="Category.php?categoryID=<?php echo $CategoryID?>" class="btn span-basal-color">
                    Show Category
                </a>
              </div>
            <?php
             }//end foreach
            ?>
          </div>
        <!-- start row -->
      </div>
    </section>
    <!-- end of Category -->

    <!--start new-products section -->
  
    <section class="new-products p-5">
      <div class="container">
        <!-- title -->
        <div class="row justify-content-around align-items-center">
            <div class="col text-center py-5">
              <h1 class="text-uppercase font-italic pro-title">The new products of this week</h1>
            </div>
          </div>
          <!-- end of title -->
          <?php
          
           $productArray=array();
           $count=0;
           foreach($allProducts as $key=>$value){
               $productID=$allProducts[$key];
               $productArray[$productID]=$allProducts[$key];
               $count++;
               if($count>3){
                  break; 
               }//end if
           }//end foreach
           
           include 'Modal/Product/product_card_row.php';
           
           ?>    
      </div>
    </section>

    <!--end new-products section -->
  <!-- mission -->
  <section class="p-5 mission">
    <div class="container-fluid">
      <!-- title -->
      <div class="row text-white text-center">
        <div class="col m-4 ">
          <h1 class="display-4 mb-4 miss-title">Our Mission</h1>
          <div class="underline mb-4"></div>
        </div>
      </div>
      <!-- end of title -->
      <div class="row my-5 mb-5">
        <div class="col-md-4 text-center  col-xl-3 col-lg-4 col-sm-8 miss-content">
          <i class="fa fa-money fa-3x mb-4 miss-icon"></i>
          <h4 class="mb-3">Shop in 3 <br>currencies</h4>
          <p class="text-muted">Lorem ipsum dolor</p>
        </div>
		          <div class="col-md-4 text-center col-xl-3 col-lg-4 col-sm-8 miss-content">
          <i class="fa fa-globe fa-3x mb-4 miss-icon"></i>
          <h4 class="mb-3">Shop in 2<br> language</h4>
          <p class="text-muted">Lorem ipsum dolor</p>
        </div>
		  <div class="col-md-4 text-center col-xl-3 col-lg-4 col-sm-8 miss-content">
          <i class="fa fa-cogs fa-3x mb-4 miss-icon"></i>
          <h4 class="mb-3">Creativity</h4>
          <p class="text-muted">Lorem ipsum dolor</p>
          </div>
        <div class="col-md-4 text-center col-xl-3 col-lg-4 col-sm-8  miss-content">
            <i class="fa fa-thumbs-up fa-3x  mb-4 miss-icon"></i>
            <h4 class="mb-3">Quality</h4>
            <p class="text-muted">Lorem ipsum dolor sit</p>
        </div>
      </div>
    </div>
  </section>
  <!-- end of mission -->
   <!-- Footer -->
	<?php
 include 'temp/footer.php';
	?>