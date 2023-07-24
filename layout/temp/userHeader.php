 <?php 
    include 'temp/ini.php';
    include $userActionPath;
    include $categoryActionPath;
    $userName = $_SESSION['User_name'];
	$id=$_SESSION['UserID'];
    $cartID=$_SESSION['cartID']; 
    //Define Object From UserClass
    $user=new User();
    UserObject($user,$id);
    $userImg=$user->getUserImg();
    $Name="User Account";
    if(isset($_SESSION['StoreID'])){
        $storeID=$_SESSION['StoreID'];
               //Store Data
        //Define Object From StoreClass
        $store=new Store();
        StoreObject($store,$storeID);
        $storeImg=$store->getStorePhoto();
        $Name=$store->getStoreName();
        $storeDes=$store->getStoreDes();
    }//end if
    include 'temp/slider1.php';
    include 'temp/top_nav.php';
    //include 'functions/ProductActions.php'; 
    require_once ('Modal/delete_confrim.php');
    require_once ('Modal/overlay/user_overlay.php');
    require_once ('Modal/overlay/store_overlay.php');
?> 

<table class="disappear">
    <tbody>
        <?php
        //user 
        $rowCount=1;
              //User ID
             $userID=$id;
              //User Object To Get Its Data 
             UserObject($user,$userID);
             //User Data
              $userName=$user->getUserName();
              $userPhoto=$user->getUserImg();
              $userFullName=$user->getFullName();
              $userEmail=$user->getEmail();
              $userAddress=$user->getAddress();
              $userPass=$user->getUserPassword();
              $userPhone1=$user->getPhoneNo1();
              $userPhone2=$user->getPhoneNo2();
              $role=$user->getUserRole();
              $gropID=$user->getGropID();
              $regStatus=$user->getRegStatus();
              if($role=="seller"){
                  $role="<span class='span-basal-color'>$role</span>";
              }
              else if($role=="user"){
                  $role="<span class='span-basal-color bg-danger'>$role</span>";
              }
              else if($role=="admin"){
                  $role="<span class='span-basal-color dark-basal-color'>$role</span>";
              }
              $statusID=$user->getTrustStatus();
              if($statusID==0){
                  $status="<span class='span-basal-color bg-danger'>inactive</span>";
              }
              else if($statusID==1){
                  $status="<span class='span-basal-color '>active</span>";
              }
              //end user
            ?>
            <!--user -->
            <tr>
              <td><?php echo $rowCount ;?></td>
              <td class="disappear"><?php echo $userID;?></td>
              <td class="disappear"><?php echo $userPhoto;?></td>
              <td><img src="<?php echo $userPhoto ;?>"  style="    
                border-radius: 50%;
                width: 40px !important;
                height: 40px;"></td>
              <td><?php echo $userName ;?></td>
              <td><?php echo $userEmail ;?></td>
              <td><?php echo $userPhone1 ;?></td>
              <td><?php echo $role ;?></td>
              <td><?php echo $status ;?></td>
              <td>
            <a 
             class="show_user"

             title="Show this user" 
             data-placement="top"
             >
             <i class="fa fa-eye  grey-color mr-2" style="font-size: 15px;">
             </i>
             </a>
            <a 
             class="update_user"
             title="edit this user" 
             data-placement="top"

             >
             <i class="fa fa-edit  basal-color mr-2" style="font-size: 15px;">
             </i>
             </a>
              <a 
             class="delete_user"
             data-toggle="modal"
             data-target="#delete_confrim"
             title="Delete this user" 
             data-placement="top"

             >
             <i class="fa fa-trash text-danger" style="font-size: 15px;">
             </i>
             </a>
            </td>
            <td class="disappear"><?php echo $userFullName ?></td>
            <td class="disappear"><?php echo $userPhone2 ?></td>
            <td class="disappear"><?php echo $userAddress ?></td>
            <td class="disappear"><?php echo $gropID ?></td>
            <td class="disappear"><?php echo $statusID ?></td>
            <td class="disappear"><?php echo $userPass ?></td>
            </tr>
            <!--end user -->
    </tbody>
</table>
 <?php 
    if(isset($_SESSION['StoreID'])){
?>
<table class="disappear">
                
  <tbody>
    <?php
     $rowCount=1;
          //Store Object To Get Its Data 
          StoreObject($store,$storeID);
         //Store Data
          $storeName=$store->getStoreName();
          $storePhoto=$store->getStorePhoto();
          $storeDes=$store->getStoreDes();
          $storeOwner=$store->getSellerID();
          //User Object To Get Its Data 
          UserObject($user,$storeOwner);
          //Store owner name
          $storeOwnerName=$user->getUserName();
          $storeLocation=$store->getLocation();
          $avaliable=$store->getAvailable();

          if($avaliable==0){
              $storeStatus="<span class='span-basal-color bg-danger'>Close</span>";
          }
          else if($avaliable==1){
              $storeStatus="<span class='span-basal-color '>Open</span>";
          }
        ?>
        <tr>
          <td><?php echo $rowCount ;?></td>
          <td class="disappear"><?php echo $storeID ;?></td>
           <td class="disappear"><?php echo $storePhoto ;?></td>
          <td><img src="<?php echo $storePhoto ;?>"  style="    
            border-radius: 50%;
            width: 40px !important;
            height: 40px;"></td>
          <td><?php echo $storeName ;?></td>
          <td><?php echo $storeOwnerName ;?></td>
          <td><?php echo $storeLocation ;?></td>
          <td><?php echo $storeStatus ;?></td>
          <td>
              <a 
         class="show_store"
         title="Show this store" 
         data-placement="top"
         >
         <i class="fa fa-eye  grey-color mr-2" style="font-size: 15px;">
         </i>
         </a>
        <a 
         class="update_store"
         title="edit this store" 
         data-placement="top"

         >
         <i class="fa fa-edit  basal-color mr-2" style="font-size: 15px;">
         </i>
         </a>
          <a 
         class="delete_store"
         data-toggle="modal"
         data-target="#delete_confrim"
         title="Delete this store" 
         data-placement="top"

         >
         <i class="fa fa-trash text-danger" style="font-size: 15px;">
         </i>
         </a>
        </td>
        <td class="disappear"><?php echo $storeDes ;?></td>
        <td class="disappear"><?php echo $avaliable ;?></td>
        </tr>

    
  </tbody>

</table>
<?php
}//end if
?>


