<?php
 include "adminHeader.php" ;
 $userArray=array();
 $userArray=$user->GetAllUsers();
 
?>
<!-- Show users -->
 <div class="col-xl-10 col-lg-9 col-md-8 ml-auto tab-content">
            <div class="row pt-2 pb-2  tab-pane active" id="users" >
            <div class="col">
                <h3 class="title-style text-center mb-3 mt-2">All Users</h3>
                <div class="pb-2 pl-2 pr-2 mb-2 justify-content-between" style="display: flex;">

                    <button class="btn btn-success show-add-overlay"><i class="fa fa-plus pr-2"></i>Add User</button>
                    <input type="text" class="text-light btn" value="<?php echo count($userArray).'  Products';?>" disabled style="background: #3fbbaa !important;">
                </div>
            <table class="table table-striped bg-light text-center">
                
                    <?php
                    //show users data
                    //if store is empty
                    if(count($userArray)==0){
                        $message='There Is Not Any Users !';
                        echo AlertInfo($message);
                    }//end if
                     //otherwise if store has products
                     else{ ?>
                    <thead>
                        <tr class="text-muted">
                          <th>#</th>
                          <th>Photo</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>PhoneNo</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $rowCount=0;
					  foreach($userArray as $key=>$value){
                         $rowCount++;
                          //User ID
                         $userID=$userArray[$key];
                          //User Object To Get Its Data 
                         UserObject($user,$userID);
                         //User Data
                          $userName=$user->getUserName();
                          $userPhoto=$user->getUserImg();
                          $userFullName=$user->getFullName();
                          $userEmail=$user->getEmail();
                          $userAddress=$user->getAddress();
                          $userPhone1=$user->getPhoneNo1();
                          $userPhone2=$user->getPhoneNo2();
                          $role=$user->getUserRole();
                          $status=$user->getTrustStatus();
                        ?>
                        <tr>
                          <td><?php echo $rowCount ;?></td>
                          <td><?php echo $userPhoto ;?></td>
                          <td><?php echo $userName ;?></td>
                          <td><?php echo $userEmail ;?></td>
                          <td><?php echo $userPhone1 ;?></td>
                          <td><?php echo $role ;?></td>
                          <td><?php echo $status ;?></td>
                          <td>
                              <a 
                         class="updateButton"
                         data-toggle="modal"
                         data-target="#update-user"
                         title="edit this user" 
                         data-placement="top"
                         id="<?php echo $userID;?>"
                         >
                         <i class="fa fa-edit fa-lg text-success">
                         </i>
                         </a>
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
                        </td>
                        </tr>
                        <?php
                    }//end foreach
                  }//end else
                    ?>
                </tbody>
            </table>
        </div>
     </div>
     <!--
     <div class="row pt-2 pb-2  tab-pane fade" id="stores">
            <div class="col">
            <table class="table table-striped bg-light text-center">
                <thead>
                    <tr class="text-muted">
                      <th>#</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>Email</th>
                      <th>PhoneNo</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
     </div>
<!-- End show users -->
     
     
     <head>
         <style>
             th{
              font-size: 12px;
             }
         </style>
     </head>