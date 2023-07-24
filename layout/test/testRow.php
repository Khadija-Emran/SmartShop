<?php 
 include 'functions/CatogeryActions.php';
 include 'temp/UserHeader.php' ;

?>
 <!--start new-products section -->
  
    <section class="new-products">
      <div class="container">
        <!-- title -->
                                
        <div class="row justify-content-around align-items-center">
            <div class="col text-center ">
              <h1 class="text-uppercase font-italic pro-title">The new products of this week</h1>
                
                <form>
                  <div class="input-group">
                      <span 
                            data-id="#allCatogery" 
                            class="allCatogery"
                            
                            >All&nbsp;<i class="fa fa-angle-down"></i></span>
                    <input type="search" class="form-control inpu-search" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-search" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
                <ul class="list-unstyled row catogeries" >
                    <!--Generate Catogery List-->
                    <?php
                    //Count Row
					  $countRow=$category->GetCategoryCount();
                      $allRows=null;
                      $oneRow=null;
                      $allRows=$category->GetAllCategory();
                      for($i=1;$i<=$countRow;$i++){
                          $oneRow=$allRows[$i];
                          //Category Data
                          $CategoryID=$oneRow['CategoryID'];
                          $CategName=$oneRow['CategName'];
                          $CategDes=$oneRow['CategDes'];
                          $Photo=$oneRow['Photo'];
                          //Get Image From Folder
                          $imageURL = 'images/upload/'.$Photo;
                          //End Category Data
                          ?>
                          <!-- Generate Element in Catogery List -->
                          <li data-class=".<?php echo $CategoryID; ?>" class="col-md catogery-ele" ><?php echo $CategName; ?></li>
                          <?php
                         }//end for
                      
                    ?>
                    <!--End Generate Catogery List-->
                    
             </ul>
            </div>
          </div>
 <!-- end of title -->
 <!-- Row of Product Cards -->         
<?php
    $allRows=null;
    $oneRow=null;
    //Count Row
    $countRow=$product->GetProductCount();
    $allRows=$product->GetAllProduct();
        ?>
         <!-- Row of Product Cards -->
        <!-- Create Row -->
        <div class="row mb-4 allProducts "> 
       <?php
    for($i=1;$i<=$countRow;$i++){
     $oneRow=$allRows[$i];   
      //Product Data
      $ProID=$oneRow['ProID'];
      $ProName=$oneRow['ProName'];
      $Price=$oneRow['Price'];
      $Photo=$oneRow['Photo'];
      $Stute=$oneRow['ProStute'];
      $ProDes=$oneRow['ProDes'];
      $Quantity=$oneRow['Quantity'];
      $CategoryID=$oneRow['CategoryID'];
      //Get Image From Folder
      $imageURL = 'images/upload/'.$Photo;
  ?>
                        <!-- start first column -->
                        <div class="col-xl-3 col-lg-4 col-sm-8 rotate product-col <?php echo $CategoryID?> ">
                          <div class="card text-center mb-4 product-card mx-auto">
                            <div class="card-body">
                              <img src="<?php echo $imageURL?>" class="img-fluid rounded pro-img">
                            </div>
                          <div class="card-name">
                              <h3 class="font-weight"> <?php echo $ProName?></h3>
                            </div>
                            <div class="card-des">
                             <p class="lead text-left"><?php echo $ProDes?></p>
                            </div>
                             <div class="store-name">
                              <h3 class="font-weight"><span>By </span>&nbsp; Stars Store</h3>
                            </div>
                            <div class="back">
                              <div class="back-content">
                                <h1 class="text-uppercase font-weight-light font-italic">Only for</h1>
                                <h3 class="mb-3"><?php echo $Price?></h3>
                                <p><del>$100</del></p>
                                <a href="#" class="btn btn-buy px-4">Buy Now</a>
                                 <a href="#" class="btn btn-add px-4">Add To Cart</a>
                                <a href="#" class="btn btn-book px-4">Book</a>
                                  <br><br>
                                 <a href="#" class="more"> More </a> 
                              </div>
                            </div>
                          </div>
                        </div>
	               <!-- end first column -->
                <?php
                }
              ?>
          </div>
        </div>
          <!-- End Row of Product Cards -->
    
</section>


<script>
    $(function(){
        //Show product that belong to specific catogery 
        $('.catogery-ele').click(function(){
            var catogerID=$(this).data('class');
            $(this).addClass('active').siblings().removeClass('active');
            if(catogerID==0){
                $('.product-col').slideDown(1000);
            }//end if
            else{
              $('.product-col').slideUp(1000);
              $(catogerID).slideDown(2000);
            }//end else
            
            console.log($(this).data('class'));
           
        });
        $('.allCatogery').click(function(){
            $('.allCatogery i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
            $('.catogeries').slideToggle(1000);
            $('.product-col').slideDown(2000);
            
    
            console.log('all');
        });
    });
</script>