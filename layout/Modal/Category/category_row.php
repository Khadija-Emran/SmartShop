<!-- Start Section -->
<section class="new-products">
    <!--  Container -->
      <div class="container">
 <!--start Category Row -->                   
        <div class="row justify-content-around align-items-center">
             <!--start Category Column -->
            <div class="col text-center ">
                <!-- title --> 
              <h1 class="text-uppercase font-italic pro-title"><?php echo $title ;?></h1>
                <!-- End title --> 
                <!-- Search Form  -->  
                <form>
                  <div class="input-group">
                      <!-- All -->
                      <span 
                            data-id="#allCatogery" 
                            class="allCatogery"
                            
                            >Categories&nbsp;<i class="fa fa-angle-down"></i></span>
                      <!-- End All -->
                      <!-- Search Input -->
                    <input type="search" class="form-control inpu-search" style="height: 100%;" placeholder="Search" onkeyup="myFunction()" onfocus="showSearchTable()" >
                      <!-- End Search Input -->
                      <!-- Submit Search Input -->
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-search" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                 <!--End Submit Search Input -->
                  </div>
                </form>
                <!-- End Search Form  --> 
                <ul class="list-unstyled row catogeries" >
                    <!--Generate Catogery List-->
                    <?php
                      foreach($categoryArray as $key=>$value){
                          //Category Data
                          $CategoryID=$categoryArray[$key];
                          CatogeryObject($category,$CategoryID);
                          $CategName=$category->getCatogName();
                          ?>
                          <!-- Generate Element in Catogery List -->
                          <li data-class=".<?php echo $CategoryID; ?>" class="col-md catogery-ele" ><?php echo $CategName; ?></li>
                          <?php
                         }//end foreach
                    ?>
                    <!--End Generate Catogery List-->      
             </ul>
            </div>
            <!--End Category Column -->
          </div>
<!--End Category Row  -->
    </div>
<!-- End Container -->
</section>
<!-- End Section -->
