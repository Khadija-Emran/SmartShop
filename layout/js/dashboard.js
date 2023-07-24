/*global , $  ,console ,document */
//  dashboard js 
$(function(){
  'use strict';    
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
    function deleteCategory(item){
        var data=getDataFromRow(item);
          console.log(data);
           $('.delete_img').prop('src',data[2]);
           $('#delete_ItemID').val(data[1]);
            document.getElementById("delete_title").innerHTML = "Delete Category";
             document.getElementById("delete_name").innerHTML = data[4] ;
            document.getElementById("delete_message").innerHTML = "Do you want to delete this category ? ";
            $('.final_delete').prop('name','final_delet_category');
         console.log('delete category'); 
    }//end function
    function deleteProduct(item){
        var data=getDataFromRow(item);
          console.log(data);
           $('.delete_img').prop('src',data[2]);
           $('#delete_ItemID').val(data[1]);
            document.getElementById("delete_title").innerHTML = "Delete Product";
             document.getElementById("delete_name").innerHTML = data[4] ;
            document.getElementById("delete_message").innerHTML = "Do you want to delete this product ? ";
            $('.final_delete').prop('name','Delete_Product');
         console.log('delete product'); 
    }//end function
    function showUser(item){
        var data=getDataFromRow(item);
        console.log(data);
        document.getElementById("user_title").innerHTML = "Show User";
        var userStatus=data[14];
            if(userStatus==0){
               document.getElementById("userStatus").innerHTML = '<span class="span-basal-color bg-danger">inactive</span>';
            }//end if
            else if(userStatus==1){
                document.getElementById("userStatus").innerHTML = "<span class='span-basal-color '>active</span>";
                ;
            }//end else
        
        document.getElementById("userRole").innerHTML = data[7]+' account' ;
        $('.overlay-user').fadeIn();
        $('.choose-Account').hide();
        $('.signIn').hide();
        $('.log_a').hide();
        $('.custom-file').addClass('display_none');
        //disable input
        $('.name').prop('disabled','true');
        $('.input-div .pass').parent().css('display','none');
            /*
        $('.pass').prop('disabled','true');
        $('.cpass').prop('disabled','true');
        $('.email').prop('disabled','true');
        $('.Fname').prop('disabled','true');
        $('.phone').prop('disabled','true');
        $('.Address').prop('disabled','true');
        */
        //set values
        $('.ImgUpload').prop('src',data[2]);
        $('#name').val(data[4]);
        $('#email').val(data[5]);
        $('#phone').val(data[6]);
        //$('#pass').val(data[5]);
        $('#Fname').val(data[10]);
        $('#Address').val(data[12]);
    }//end function
    function showStore(item){
        var data=getDataFromRow(item);
        console.log(data);
        document.getElementById("store_title").innerHTML = "Show The Store";
        var storeStatus=data[10];
            if(storeStatus==0){
               document.getElementById("storeStatus").innerHTML = '<span class="span-basal-color bg-danger">close</span>';
            }//end if
            else if(storeStatus==1){
                document.getElementById("storeStatus").innerHTML = "<span class='span-basal-color '>open</span>";
                ;
            }//end else
        document.getElementById("owner").innerHTML = '<span class="basal-color">For owner : </span>'+data[5] ;
        $('.overlay-store').fadeIn();
            /*
        $('.Sname').prop('disabled','true');
        $('.Sdes').prop('disabled','true');
        $('.location').prop('disabled','true');
        */
        //set values
        $('.ImgUpload').prop('src',data[2]);
        $('#Sname').val(data[4]);
        $('#Sdes').val(data[9]);
        $('#location').val(data[6]);
        $('.custom-file').addClass('display_none');
        $('.add_store').hide();
        $('.storeStatusRadio').hide();
         }//end function
    function showCategory(item){
        var data=getDataFromRow(item);
         console.log(data);
         document.getElementById("category_title").innerHTML = "Show The Category"; 
         $('.overlay-category').fadeIn();
            //set values
         $('#Cname').val(data[4]);
         $('#Cdes').val(data[5]);
         $('#selectedID').val(data[1]);
         $('.ImgUpload').prop('src',data[2]);  
         /*
         $('#Cname').prop('disabled','true');
         $('#Cdes').prop('disabled','true');
         */
         $('.add_category').hide();
    }//end function
    function showProduct(item){
        var data=getDataFromRow(item);
            console.log(data);
            document.getElementById("product_title").innerHTML = "Show The Product";
            document.getElementById("owner").innerHTML ='<span class="basal-color">For store : </span>' + data[8] ;
            var productStatus=data[12];
            if(productStatus==1){
               document.getElementById("proStatus").innerHTML = '<span class="span-basal-color" style="background:#3fbbaa">Avaliable</span>';
            }//end if
            else if(productStatus==0){
                document.getElementById("proStatus").innerHTML = "<span class='text-light bg-danger'>Locked</span>";
                ;
            }//end else
            else if(productStatus==2){
                document.getElementById("proStatus").innerHTML = "<span class='span-basal-color '  style='background:#2e776b'>Approved</span>"; 
                ;
            }//end else
            
                        
             $('.overlay-product').fadeIn();
            /*
             $('#proName').prop('disabled','false');
             $('#proPrice').prop('disabled','false');
             $('#proQuantity').prop('disabled','false');
             $('#ProCategory').prop('disabled','false');
             $('#proDes').prop('disabled','false');
             */
             $('.custom-file').addClass('display_none');
             
            //set values
             $('#selectedID').val(data[1]);
             $('.ImgUpload').prop('src',data[2]);            
             $('#proName').val(data[4]);
             $('#proPrice').val(data[5]);
             $('#proQuantity').val(data[6]);
             $('#proDes').val(data[11]);
             $('#SubmitProForm').hide();
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
    function updateCategory(item){
        var data=getDataFromRow(item);
         console.log(data);
         document.getElementById("category_title").innerHTML = "Update The Category"; 
         $('.overlay-category').fadeIn();
            //set values
         $('#Cname').val(data[4]);
         $('#Cdes').val(data[5]);
         $('.selectedID').val(data[1]);
         $('.ImgUpload').prop('src',data[2]);  
        
         $('#Cname').prop('disabled','false');
         $('#Cdes').prop('disabled','false');
         $('.add_category').show();
         $('.add_category').prop('name','update_category');
         $('.add_category').prop('value','Update Category');
    }//end function
    function updateProduct(item){
        var data=getDataFromRow(item);
            console.log(data);
            document.getElementById("product_title").innerHTML = "Update The Product";
            $('.overlay-product').fadeIn();
            var proStatus=data[12];
            if(proStatus==0){
              document.getElementById("proStatus").innerHTML ="<span class='text-light bg-danger'>Locked</span>";
            }//end if
            if(proStatus==1){
               document.getElementById("proStatus").innerHTML ="<span class='span-basal-color '>Avaliable</span>";
            }//end if
            if(proStatus==2){
               document.getElementById("proStatus").innerHTML = "<span class='span-basal-color dark-basal-color'>Approved</span>";
            }//end if
            document.getElementById("owner").innerHTML = '<span></span>' ;
            /*
            $('#proName').prop('disabled','false');
             $('#proPrice').prop('disabled','false');
             $('#proQuantity').prop('disabled','false');
             $('#ProCategory').prop('disabled','false');
             $('#proDes').prop('disabled','false');
             */
             $('.custom-file').removeClass('display_none');
            //set values
             $('.selectedID').val(data[1]);
             $('.ImgUpload').prop('src',data[2]);            
             $('#proName').val(data[4]);
             $('#proPrice').val(data[5]);
             $('#proQuantity').val(data[6]);
             $('#proDes').val(data[11]);
        
        
             $('#SubmitProForm').prop('value','Update Product');
             $('#SubmitProForm').prop('name','Update_Product');
    }//end function
    function addUser(){
        document.getElementById("user_title").innerHTML = "Add User";
        $('.overlay-user').fadeIn();
        $('#userRole').parent().hide();
        $('.choose-Account').show();
        $('.signIn').show();
        $('.log_a').hide();
        $('.custom-file').removeClass('display_none');
        //disable input
        /*$('.input-div .pass').parent().css('display','flex');
        $('.name').prop('disabled','false');
        $('.pass').prop('disabled','false');
        $('.cpass').prop('disabled','false');
        $('.email').prop('disabled','false');
        $('.Fname').prop('disabled','false');
        $('.phone').prop('disabled','false');
        $('.Address').prop('disabled','false');
        */
        $('.signIn').prop('name','add_user');
        $('.signIn').prop('value','Add User');
        //set values
        $('.ImgUpload').prop('src',"images/img2.png");
        $('#name').val("");
        $('#email').val("");
        $('#phone').val("");
        $('#pass').val("");
        $('#Fname').val("");
        $('#Address').val("");
    }//end function
    function addStore(){
        document.getElementById("storeStatus").innerHTML = "<span class=''></span>";
            document.getElementById("owner").innerHTML = '<span class="basal-color"></span>';
            document.getElementById("store_title").innerHTML = "Add Store";
            $('.overlay-store').fadeIn();
            /*
            $('.Sname').prop('disabled','false');
            $('.Sdes').prop('disabled','false');
            $('.location').prop('disabled','false');
            */
            //set values
            $('#selectedID').val("");
            $('.ImgUpload').prop('src',"images/img2.png");
            $('#Sname').val("");
            $('#Sdes').val("");
            $('#location').val("");
            $('.custom-file').removeClass('display_none');
            $('.add_store').show();
            $('.add_store').prop('name','add_store');
            $('.add_store').prop('value','Add Store');
            $('.storeStatusRadio').show();
    }//end function
    function addCategory(){document.getElementById("category_title").innerHTML = "Add Category"; 
         $('.overlay-category').fadeIn();
            //set values
         $('#Cname').val("");
         $('#Cdes').val("");
         $('#selectedID').val("");
         $('.ImgUpload').prop('src',"images/img2.png");  
        /*
         $('#Cname').prop('disabled','false');
         $('#Cdes').prop('disabled','false');
         */
         $('.add_category').show();
         $('.add_category').prop('name','add_category');
         $('.add_category').prop('value','Add Category');}//end function
    function addProduct(){
        document.getElementById("product_title").innerHTML = "Add Product";
            $('.overlay-product').fadeIn();
            document.getElementById("proStatus").innerHTML = '';
            document.getElementById("owner").innerHTML = '';
            /*
            $('#proName').prop('disabled','false');
             $('#proPrice').prop('disabled','false');
             $('#proQuantity').prop('disabled','false');
             $('#ProCategory').prop('disabled','false');
             $('#proDes').prop('disabled','false');
             */
             $('.custom-file').removeClass('display_none');
            //set values
             //$('#selectedID').val(data[1]);
             $('.ImgUpload').prop('src',"images/img2.png");            
             $('#proName').val("");
             $('#proPrice').val("");
             $('#proQuantity').val("");
             $('#proDes').val("");
             $('#SubmitProForm').prop('value','Add Product');
             $('#SubmitProForm').prop('name','Add_Product');
    }//end function
    
    //add user
    $('.add-user').click(function(){
        addUser();
    });//end add user
    //show user
    $('.show_user').click(function(){
        showUser($(this));
    });//end show user
    //update user
    $('.update_user').click(function(){
        updateUser($(this));
    });//end update user
    //delete user
    $('.delete_user').click(function(){
        deleteUser($(this));
    });//end delete user
    //add store
    $('.add_store').click(function(){
        addStore();
    });//end add store
    //show store
    $('.show_store').click(function(){
        showStore($(this));
    });//end show store
    //update store
    $('.update_store').click(function(){
        updateStore($(this));
    });//end update store
    //delete store
    $('.delete_store').click(function(){
        deleteStore($(this));
    });//end delete store
    
     //add category
    $('.add_category').click(function(){
        addCategory();
    });//end add category
    //show category
    $('.show_category').click(function(){
        showCategory($(this));
    });//end show category
    //update category
    $('.update_category').click(function(){
        updateCategory($(this));
    });//end update category
    //delete category
    $('.deleteCategory').click(function(){
        deleteCategory($(this));
    });//end delete category
    
    //add product
    $('.add_product').click(function(){
        addProduct();
    });//end add product
    //updae product
    $('.update_product').click(function(){
        updateProduct($(this));
    });//end updae product
    //show product
    $('.show_product').click(function(){
        showProduct($(this));
    });//end show product
     //delete product
    $('.delete_product').click(function(){
        deleteProduct($(this));
    });//end delete product
    
    //close overlay
    $('.close_overlay').click(function(){
        $(this).parent().fadeOut(10);
        console.log('close');
    });
    
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
    
});

// end dashboard js 