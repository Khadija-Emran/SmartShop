  
<div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top bg-dark slider display-none"  id="slider" style="margin-top: 0px !important;">
        <!--Store Photo-->
      <div class="bottom-border pb-3 text-center">
        <img src="<?php echo $userImg ; ?>" class="rounded-circle pro-img">
          <br>
        <a href="#" class="text-white">
            <?php echo '<span>'.$userName.'</span><br>';?>
        </a>
      </div>
      <ul class="navbar-nav flex-column mt-4">
        <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 current">
            <i class="fa fa-home text-light fa-lg mr-3">
            </i>Dashboard</a>
          </li>
          
          <li class="nav-item"><a class="nav-link text-white p-3 mb-2 update_my_account">
            <i class="fa fa-user text-light fa-lg mr-3">
            </i>Profile</a>
          </li>
          
          <?php
          if(isset($_SESSION['StoreID'])){
         ?>
        <li class="nav-item dropdown">
            
            <a class="nav-link text-white p-3 mb-2 sidebar-link dropdown-toggle" 
               data-toggle="dropdown">
                <i class="fa fa-user text-light fa-lg mr-3" ></i>
                Store
            </a>
            <ul class="dropdown-menu text-center">
            <li><a href="Show_Store.php?storeID=<?php echo $storeID;?>">ٍٍShow Store</a></li>
            <li><a class="update_my_store btn">Update Store</a></li>
            <li><a class="delete_my_store btn bg-danger text-light" style="cursor: pointer;">Delete Store</a></li>
          </ul>
          </li>
          <?php
          }
           ?>
          
          <li class="nav-item dropdown">
            
            <a class="nav-link text-white p-3 mb-2 sidebar-link dropdown-toggle" 
               data-toggle="dropdown">
                <i class="fa fa-user text-light fa-lg mr-3" ></i>
                Account
            </a>
            <ul class="dropdown-menu text-center">
            <li>
                <form action="" method="post">
                    <input type="submit" name="sign_out" value="Sign Out" class="sign_out btn text-danger">
                </form>
            </li>
            <li><button class="delete_my_account btn bg-danger text-light" style="cursor: pointer;">Delete Account</button></li>
                
          </ul>
          </li>
          
          
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" data-toggle="modal" data-target="#cart-modal" >
                <i class="fa fa-shopping-cart text-light fa-lg mr-3"></i>
                Report
            </a>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" >
                <i class="fa fa-envelope text-light fa-lg mr-3"></i>
                Inbox
            </a>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link" >
                <i class="fa fa-money text-light fa-lg mr-3"></i>
                Procurement
            </a>
          </li>
    
        <li class="nav-item">
            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link">
                <i class="fa fa-wrench text-light fa-lg mr-3"></i>
                Settings
            </a>
          </li>
      </ul>
    </div>



<script> 
     
    
    function getDataFromRow(item){
    var tr=item.closest('tr');
    var data=tr.children('td').map(function(){
     return $(this).text();
    }).get();
   return data;
}//end function
    function deleteUser(item){
        var data=getDataFromRow(item);
          console.log(data);
           $('.delete_img').prop('src',data[2]);
            $('#delete_ItemID').val(data[1]);
            document.getElementById("delete_title").innerHTML = "Delete User";
             document.getElementById("delete_name").innerHTML = data[4] ;
            document.getElementById("delete_message").innerHTML = "Do you want to delete this user ? ";
            $('.final_delete').prop('name','final_delet_user');
         console.log('delete user');
    }//end function
    function deleteStore(item){
        var data=getDataFromRow(item);
          console.log(data);
           $('.delete_img').prop('src',data[2]);
           $('#delete_ItemID').val(data[1]);
            document.getElementById("delete_title").innerHTML = "Delete Store";
             document.getElementById("delete_name").innerHTML = data[3] ;
            document.getElementById("delete_message").innerHTML = "Do you want to delete this store ? ";
            $('.final_delete').prop('name','final_delet_store');
         console.log('delete store');
            }//end function
    function updateUser(item){
        var data=getDataFromRow(item);
        console.log(data);
        document.getElementById("user_title").innerHTML = "Update User";
        var userStatus=data[14];
            if(userStatus==0){
               document.getElementById("userStatus").innerHTML = '<span class="span-basal-color bg-danger">inactive</span>';
               $('.activeStatusRadio0').prop('checked','true');
            }//end if
            else if(userStatus==1){
                document.getElementById("userStatus").innerHTML = "<span class='span-basal-color '>active</span>";
                $('.activeStatusRadio1').prop('checked','true');
            }//end else
        var gropID=data[13];
            if(gropID==0){
               
               $('.activeStatusRadio0').prop('checked','true');
            }//end if
            else if(gropID==1){
                
                $('.activeStatusRadio1').prop('checked','true');
            }//end else
          else if(gropID==2){
                
                $('.activeStatusRadio2').prop('checked','true');
            }//end else
        
        document.getElementById("userRole").innerHTML = data[7]+' account' ;
        $('.overlay-user').fadeIn();
        $('.choose-Account').hide();
        $('.signIn').show();
        $('.log_a').hide();
        $('.custom-file').removeClass('display_none');
        //disable input
        
        $('.input-div .pass').parent().css('display','block');
           /* 
        $('.name').prop('disabled','false');
        $('.pass').prop('disabled','false');
        $('.cpass').prop('disabled','false');
        $('.email').prop('disabled','false');
        $('.Fname').prop('disabled','false');
        $('.phone').prop('disabled','false');
        $('.Address').prop('disabled','false');
          */  
        $('.signIn').prop('name','update_user');
        $('.signIn').prop('value','Update User');
        //set values
        $('.selectedID').val(data[1]);
        $('.ImgUpload').prop('src',data[2]);
        $('#name').val(data[4]);
        $('#email').val(data[5]);
        $('#phone').val(data[6]);
        $('#pass').val(data[15]);
        $('#cpass').val(data[15]);
        $('#Fname').val(data[10]);
        $('#Address').val(data[12]);
    }//end function
    function updateStore(item){
        var data=getDataFromRow(item);
            //var selectedID=$('.selectedID').val();
            console.log(data);
            document.getElementById("store_title").innerHTML = "Update The Store";
            var storeStatus=data[10];
                if(storeStatus==0){
                   document.getElementById("storeStatus").innerHTML = '<span class="span-basal-color bg-danger">close</span>';
                    $('.storestatusRadio0').prop('checked','true');
                }//end if
                else if(storeStatus==1){
                    document.getElementById("storeStatus").innerHTML = "<span class='span-basal-color '>open</span>";
                    $('.storestatusRadio1').prop('checked','true');
                }//end else

            document.getElementById("owner").innerHTML = '<span class="basal-color">For owner : </span>'+data[5] ;
            $('.overlay-store').fadeIn();
            /*
            $('.Sname').prop('disabled','false');
            $('.Sdes').prop('disabled','false');
            $('.location').prop('disabled','false');
            */
            //set values
            $('.selectedID').val(data[1]);
            $('.ImgUpload').prop('src',data[2]);
            $('#Sname').val(data[4]);
            $('#Sdes').val(data[9]);
            $('#location').val(data[6]);
            $('.custom-file').removeClass('display_none');
            $('.add_store').show();
            $('.add_store').prop('name','update_store');
            $('.add_store').prop('value','Update Store');
            $('.storeStatusRadio').show();
    }//end function
    
    //update my store    
    $('.update_my_store').click(function(){
        updateStore($('.update_store'));
        console.log('update_my_store');
    });
    //delete my store 
    $('.delete_my_store').click(function(){
        deleteStore($('.delete_store'));
        console.log('delete_my_store');
    });//end delete store
    
    //update my user 
    $('.update_my_account').click(function(){
        $('.activeStatusRadio').hide();
        $('.accountStatusRadio').hide();
        updateUser($('.update_user'));
        console.log('update_my_account');
    });//end update user
    //delete my user
    $('.delete_my_account').click(function(){
        deleteUser($('.delete_user'));
        console.log('delete_my_account');
    });//end delete user
   
    
</script>
