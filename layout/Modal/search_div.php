<?php

?>
<!-- Search Form  --> 

<div class="container-fluid search-div" style="z-index: 10000;position: fixed;">
                <form>
                  <div class="input-group mt-1" style="box-shadow: 3px 3px 4px #eee;">
                    <input type="search" class="form-control inpu-search" placeholder="Search" id="myInput" onkeyup="myFunction()" onfocus="showSearchTable()" >
                      <!-- End Search Input -->
                      <!-- Submit Search Input -->
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-search" type="submit" style="height: 100%;">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <div class="input-group-btn">
                      <span class="btn btn-default text-danger" type="">
                        <i class="fa fa-close fa-lg" style="line-height: normal;"></i>
                      </span>
                    </div>
                 <!--End Submit Search Input -->
                  </div>
  
    </form>
    <?php 
    if(count($searchArray)!=0){
    ?>
    <div class="SearchTable" style="
    border: 1px solid #3faabb;
    height: 133px !important;
    overflow: auto;
    display:none;                  
    ">
     <table class="table table-striped bg-light text-center searchTable" id="myTable">
        <tbody>
            <?php
             
            foreach($searchArray as $key => $value){
                $itemID=$searchArray[$key]['itemID'];
                $type=$searchArray[$key]['type'];
                $photo=$searchArray[$key]['photo'];
                $itemName=$searchArray[$key]['itemName'];
                $itemDes=$searchArray[$key]['itemDes'];
              
            ?>
            <tr id="<?php echo $itemID?>" class="<?php echo $type ?>">
                <td><img src="<?php echo $photo ; ?>" style="width : 40px ;height:40px; border-radius:50%"></td>
                <td><?php echo $type ; ?></td>
                <td><?php echo $itemName ; ?></td>
                <td><?php echo $itemDes ; ?></td>
            </tr>
            <?php
            }//end foreach
            ?>
            
        </tbody>
    </table>
    
    </div>
   <?php
    }//end if
    ?> 
    </div>
<script>
function showSearchTable(){
    $('.SearchTable').slideDown();
}
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          
        tr[i].style.display = "";
          console.log('show');
      } 
        else {
        tr[i].style.display = "none";
        console.log('none');
      }
    }   
      
  }
}//end function 
$('.searchTable tr').click(function(){
  var tr=$(this);
  var itemID=tr.attr('id');
  var itemType=tr.attr('class');
    console.log(itemID);
    console.log(itemType);
  if(itemType=='Product'){
      window.location.replace("Product_Details.php?productID=" + itemID);  
  }//end if
  else if(itemType=='Category'){
      window.location.replace("Category.php?categoryID=" + itemID);  
  }//end if
  else if(itemType=='Store'){
      window.location.replace("Show_Store.php?storeID=" + itemID);  
  }//end if
});
</script>
<!-- End Search Form  --> 