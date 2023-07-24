<!-- Show products -->
<div class="col-xl-10 col-lg-9 col-md-8 ml-auto admin-tab-content Productes " >
    <div class="row pt-2 pb-2  tab-pane active" id="products" >
            <div class="col">
                <h3 class="title-style text-center mb-2">All Products</h3>
                <div class="pb-2 pl-2 pr-2 pt-2 mb-2 justify-content-between" style="display: flex;    border-top: 1px solid #cde0de">

                    <button class="btn  show-add-overlay add-btn add_product"><i class="fa fa-plus pr-2"></i>Add product</button>
                    <input type="text" class="text-light btn" value="<?php echo count($productArray).'  Products';?>" disabled style="background: #3fbbaa !important;">
                </div>
            <div style="max-height: 75vh; overflow: auto;">
            <table class="table table-striped bg-light text-center">
                
                    <?php
                    //show users data
                    //if store is empty
                    if(count($productArray)==0){
                        $message='There Is Not Any Products !';
                        echo AlertInfo($message);
                    }//end if
                     //otherwise if store has products
                     else{ ?>
                    <thead>
                        <tr class="text-muted">
                          <th>#</th>
                          <th class="disappear">ID</th>
                          <th class="disappear">Photosrc</th>
                          <th>Photo</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Category</th>
                          <th>Store</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th class="disappear">Des</th>
                          <th class="disappear">StatusID</th>
                          <th class="disappear">coins</th>
                          <th class="disappear">Quantity_type</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $rowCount=0;
					  foreach($productArray as $key=>$value){
                          $rowCount++;
                          //Product ID
                          $productID=$productArray[$key];
                          //Product Object To Get Its Data 
                          ProductObject($product,$productID);
                         //Product Data
                          $productName=$product->getProName();
                          $productPhoto=$product->getProImage();
                          $productDes=$product->getProDes();
                          $productPrice=$product->getPrice();
                          $productQuant=$product->getQuantity();
                          $proStoreID=$product->getStoreId();
                          $coins=$product->getCoins();
                          $Quantity_type=$product->getQuntityType();
                          
                          //Store Object To Get Its Data 
                          StoreObject($store,$proStoreID);
                         //Store Data
                          $storeName=$store->getStoreName();
                          $productCateID=$product->getCatogeryID();
                          //Category Object To Get Its Data 
                          CatogeryObject($category,$productCateID);
                         //Category Data
                          $categoryName=$category->getCatogName();
                          $productStatusID=$product->getProStatus();
                          
                           if($productStatusID==1){
                              $productStatus="<span class='span-basal-color '>Avaliable</span>";
                          }
                          else if($productStatusID==0){
                              $productStatus="<span class='text-light bg-danger'>Locked</span>";
                          }
                           else if($productStatusID==2){
                              $productStatus="<span class='span-basal-color dark-basal-color'>Approved</span>";
                          }
                        ?>
                        <tr>
                          <td><?php echo $rowCount ;?></td>
                          <td class="disappear"><?php echo $productID ;?></td>
                          <td class="disappear"><?php echo $productPhoto ;?></td>
                          <td><img src="<?php echo $productPhoto ;?>"  style="    
                            border-radius: 50%;
                            width: 40px !important;
                            height: 40px;"></td>
                          <td><?php echo $productName ;?></td>
                          <td><?php echo $productPrice ;?></td>
                          <td><?php echo $productQuant ;?></td>
                          <td><?php echo $categoryName ;?></td>
                          <td><input hidden value="<?php echo $proStoreID ; ?>"><?php echo $storeName ;?></td>
                          <td><?php echo $productStatus ;?></td>
                          <td>
                              <a 
                         class="show_product"
                         title="Show this product" 
                         data-placement="top"
                         >
                         <i class="fa fa-eye  grey-color mr-2" style="font-size: 15px;">
                         </i>
                         </a>
                        <a 
                         class="update_product"
                         title="edit this product" 
                         data-placement="top"
                         
                         >
                         <i class="fa fa-edit  basal-color mr-2" style="font-size: 15px;">
                         </i>
                         </a>
                          <a 
                         class="delete_product"
                         data-toggle="modal"
                         data-target="#delete_confrim"
                         title="Delete this product" 
                         data-placement="top"
                         
                         >
                         <i class="fa fa-trash text-danger" style="font-size: 15px;">
                         </i>
                         </a>
                        </td>
                        <td class="disappear"><?php echo $productDes ;?></td>
                        <td class="disappear"><?php echo $productStatusID ;?></td>
                        <td class="disappear"><?php echo $coins ;?></td>
                        <td class="disappear"><?php echo $Quantity_type ;?></td>
                        
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
<!--End show products -->   