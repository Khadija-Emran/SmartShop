
<head>
         <style>
             th{
              font-size: 12px;
              color: #239c8b;
             }
             td{
                font-size: 13px !important;
             }
             .span-basal-color {
                 background: #3fbbaa;
                 color: #fff;
                 padding: 4px 6px;
                 border-radius: 5px;
             }
             .dark-basal-color{
                 background: #16574c! important;
             }
           </style>
    
<script src="js/dashboard.js"></script>
</head>

<?php
require_once ("temp/ini.php");
//require_once ('Modal/alert.php');
session_start();
if(isset($_SESSION['admineID'])){
 include "temp/adminHeader.php" ;
 $userArray=array();
 $userArray=$user->GetAllUsers();
 $storeArray=array();
 $storeArray=$store->GetAllStoresData();
 $categoryArray=array();
 $categoryArray=$category->GetAllCategory();
 $productArray=array();
 $productArray=$product->GetAllProduct();
 
//user table
include 'Modal/tables/user_table.php';
//store table
include 'Modal/tables/store_table.php';
//category table
include 'Modal/tables/category_table.php';
//product table
include 'Modal/tables/product_table.php';
 }//end mine if
   
//otherwise if UserID is not existing
else{
    $message='You Have Not Permission To Enter To This Page !';
    echo AlertDanger($message);
}//end else
?>
