<?php 
 include 'temp/ini.php' ;
 include $userActionPath;
 include $categoryActionPath; 
 //include 'functions/CartAction.php';
 //include 'Modal/confirm.php';
 //include 'functions/Catogery/CatogeryAction.php';
 //include 'functions/Store/StoreAction.php';
 //include 'functions/User/UserAction.php';
 include 'temp/Navbar.php' ;
    //Define object from ProductClass
     $product= new Product();
    //Define object from Catogery class
     $category= new Category();
    //Define Object From StoreClass
     $store=new Store();
    //Array To Storing  Category Of Store
     $categoryArray=$category->GetAllCategory();
    //Array To Storing Stores Data
     $storeArray=$store->GetAllStoresData();
     $title="The Stores";
    //Include Catogeries Row
    include "Modal/Category/category_row.php" ; 
    //Include Stores Row
    include "Modal/Store/store_card_raw.php" ;

?>
<?php   include 'temp/footer.php'; ?>