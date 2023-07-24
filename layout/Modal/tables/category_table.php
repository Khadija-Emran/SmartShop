   <!-- Show categories -->
<div class="col-xl-10 col-lg-9 col-md-8 ml-auto admin-tab-content Categories ">
    <div class="row pt-2 pb-2  tab-pane active" id="categories" >
            <div class="col">
                <h3 class="title-style text-center mb-2">All Categories</h3>
                <div class="pb-2 pl-2 pr-2 pt-2 mb-2 justify-content-between" style="display: flex;    border-top: 1px solid #cde0de">

                    <button class="btn add-btn show-add-overlay  add_category"><i class="fa fa-plus pr-2"></i>Add category</button>
                    <input type="text" class="text-light btn" value="<?php echo count($categoryArray).'  Categories';?>" disabled style="background: #3fbbaa !important;">
                </div>
            <div style="max-height: 75vh; overflow: auto;">
            <table class="table table-striped bg-light text-center">
                
                    <?php
                    //show users data
                    //if store is empty
                    if(count($categoryArray)==0){
                        $message='There Is Not Any Categories !';
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
                          <th>Category Name</th>
                          <th>Category Description</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $rowCount=0;
					  foreach($categoryArray as $key=>$value){
                          $rowCount++;
                          //Category ID
                          $categoryID=$categoryArray[$key];
                          //Category Object To Get Its Data 
                          CatogeryObject($category,$categoryID);
                         //Category Data
                          $categoryName=$category->getCatogName();
                          $categoryPhoto=$category->getCatoPhoto();
                          $categoryDes=$category->getCatogDes();
                          
                        ?>
                        <tr>
                          <td><?php echo $rowCount ;?></td>
                          <td class="disappear"><?php echo $categoryID ;?></td>
                          <td class="disappear"><?php echo $categoryPhoto ;?></td>
                          <td><img src="<?php echo $categoryPhoto ;?>"  style="    
                            border-radius: 50%;
                            width: 40px !important;
                            height: 40px;"></td>
                          <td><?php echo $categoryName ;?></td>
                          <td><?php echo $categoryDes ;?></td>
                          <td>
                              <a 
                         class="show_category"
                         title="Show this category" 
                         data-placement="top"
                         >
                         <i class="fa fa-eye  grey-color mr-2" style="font-size: 15px;">
                         </i>
                         </a>
                        <a 
                         class="update_category"
                         title="edit this category" 
                         data-placement="top"
                         
                         >
                         <i class="fa fa-edit  basal-color mr-2" style="font-size: 15px;">
                         </i>
                         </a>
                          <a 
                         class="delete_item"
                         data-toggle="modal"
                         data-target="#delete_confrim"
                         title="Delete this category" 
                         data-placement="top"
                        
                         >
                         <i class="fa fa-trash text-danger" style="font-size: 15px;">
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
 </div>
</div>
<!--End show categories --> 