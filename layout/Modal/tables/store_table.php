<!-- Show stores -->

<div class="col-xl-10 col-lg-9 col-md-8 ml-auto admin-tab-content Stores ">
    <div class="row pt-2 pb-2  tab-pane active" id="stores" >
            <div class="col">
                <h3 class="title-style text-center mb-2">All Stores</h3>
                <div class="pb-2 pl-2 pr-2 pt-2 mb-2 justify-content-between" style="display: flex;    border-top: 1px solid #cde0de">

                    <button class="btn add-btn show-add-overlay  add_store" ><i class="fa fa-plus pr-2"></i>Add Store</button>
                    <input type="text" class="text-light btn" value="<?php echo count($storeArray).'  Stores';?>" disabled style="background: #3fbbaa !important;">
                </div>
            <div style="max-height: 75vh; overflow: auto;">
            <table class="table table-striped bg-light text-center">
                
                    <?php
                    //show users data
                    //if store is empty
                    if(count($storeArray)==0){
                        $message='There Is Not Any Stores !';
                        echo AlertInfo($message);
                    }//end if
                     //otherwise if store has products
                     else{ ?>
                    <thead>
                        <tr class="text-muted">
                          <th>#</th>
                          <th class="disappear">ID</th>
                          <th class="disappear">Photo</th>
                          <th>Photo</th>
                          <th>Store Name</th>
                          <th>Store Owner</th>
                          <th>Location</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th class="disappear">Des</th>
                          <th class="disappear">statusID</th>
                        </tr>
                    </thead>
               
                
                    <tbody>
                    <?php
                    $rowCount=0;
					  foreach($storeArray as $key=>$value){
                          $rowCount++;
                          //Store ID
                          $storeID=$storeArray[$key];
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
                        <?php
                    }//end foreach
                  }//end else
                    ?>
                </tbody>
                
               
            
            </table>
        </div>
    </div>
  </div>
</div>
     
    <!--End show stores --> 