
<?php 
 include 'temp/ini.php' ;
 include $userActionPath;
 include $categoryActionPath;
 //include 'functions/CartAction.php';
 //include 'Modal/confirm.php';
 //include 'functions/Catogery/CatogeryAction.php';
 include 'temp/Navbar.php' ;
 //Define object from ProductClass
  $product= new Product();
 //Define object from Catogery class
  $category= new Category();
 //Array To Storing  Category Of Store
  $categoryArray=$category->GetAllCategory();
   $title="Our Product";
?>
<?php
//Show Message Based On Actions

$action = isset($_GET['action']) ? $_GET['action'] : "";
echo "<div class='col-md-12'>";
    //Show Added Message 
    if($action=='added'){
        $message=' Product was added to your cart!';
        echo popMessage($message);
    }
    //Show Exists Message 
    if($action=='exists'){
        echo "<div class='alert alert-info action-message'>";
            echo "Product already exists in your cart!";
        echo "</div>";
    }
echo "</div>";

?>
 <!--start products section -->
<?php
include 'Modal/Category/category_row.php';
?>    
 <!-- Row of Product Cards -->         
<?php
   $productArray=$product->GetAllProduct();
   include 'Modal/Product/product_card_row.php';
 ?>
<!-- End Container -->
<?php   include 'temp/footer.php'; ?>
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
        });
        //Show Catogery Ana All Products
        $('.allCatogery').click(function(){
            $('.allCatogery i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
            $('.catogeries').slideToggle(1000);
            $('.product-col').slideDown(2000);    
            console.log('all');
        });
        //Show Description
        $('.angle-down').click(function(){
            $('.angle-down i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
            $(this).closest('.card').find('.card-des').slideToggle(100);
        });
       //Coloring Estimate
        $('.card-estimate span').click(function(){
            $(this).toggleClass('color-gray');
        });
        $('.card-body').click(function(){
          Redirect_Product_details($(this));
        });
         $('.card-name h3').click(function(){
          Redirect_Product_details($(this));
        });
        //function To Redirect Tp Product_Details Page
        function Redirect_Product_details(item){
          var productID=item.closest('.card').find('.productID').val();
          window.location.replace("Product_Details.php?productID=" + productID);  
        }//end function
    });
</script>