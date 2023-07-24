<?php
 include 'temp/ini.php' ;
 include $userActionPath;
 include $categoryActionPath;
 //include 'functions/ProductActions.php';
 //include 'functions/Catogery/CatogeryAction.php';		
 include 'temp/Navbar.php' ;
        
 //Define object from Catogery class
  $category= new Category();
 //Get category ID 
 $categoryID=$_GET['categoryID'];
 //Selected category Array
 $oneCategory=$category->GetCatogeryData($categoryID);
 //All categories array 
 $categoryArray=array();
 $categoryArray=NULL;
 $categoryArray[$categoryID]=$categoryID;
 //Category Name
  $categoryName=$oneCategory['CategName'];
 //Define object from ProductClass
  $product= new Product();
 //Array To Storing  Products Data
  $productArray=$product->GetProViaCato($categoryID);
  $title=$categoryName;

?>
<!-- Category Row -->
     <div style="margin-top:80px">
         <?php include 'Modal/Category/category_row.php'; ?>
     </div>
    <!--End Category Row -->
    <!-- Product Card Row -->
     <div>
         <?php include 'Modal/Product/product_card_row.php'; ?>
     </div>
    <!--End Product Card Row -->
<?php   include 'temp/footer.php'; ?>