 <!-- Show users -->
 <div class="col-xl-10 col-lg-9 col-md-8 ml-auto admin-tab-content Users">
            <!-- Show users -->
            <div class="row pt-2 pb-2  tab-pane active" id="users" style="">
                
            <div class="col">
                <h3 class="title-style text-center mb-2">All Users</h3>
                <div class="pb-2 pl-2 pr-2 pt-2 mb-2 justify-content-between" style="display: flex;    border-top: 1px solid #cde0de">

                    <button 
                        class="btn add-btn show-add-overlay add-user">
                        <i class="fa fa-plus pr-2"></i>
                        Add User
                    </button>
                    <input type="text" class="text-light btn" value="<?php echo count($userArray).'  Users';?>" disabled style="background: #3fbbaa !important;">
                </div>
            <div style="max-height: 75vh; overflow: auto;">
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
                          <th class="disappear"  >ID</th> 
                          <th class="disappear" >Photo</th> 
                          <th>Photo</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>PhoneNo</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th class="disappear">Full Name</th>
                          <th class="disappear">PhoneNo2</th>
                          <th class="disappear">ِAddress</th>
                          <th class="disappear">GropID</th>
                          <th class="disappear">StatusID</th>
                          <!--<th class="disappear">RegStatus</th>-->
                          <th class="disappear">Pass</th>
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
                        ?>
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
                        <?php
                    }//end foreach
                  }//end else
                    ?>
                </tbody>
                
            </table>
        </div>
        </div>
            <!--End show users --> 
     </div>
</div>
<!-- Show users -->