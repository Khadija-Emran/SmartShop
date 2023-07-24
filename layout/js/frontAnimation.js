/*global ,$ ,window ,console */
$(function(){
  'use strict';
$('[data-toggle="tooltip"]').tooltip();
	//To make nav small size
	$(window).scroll(function(){
		if($(this).scrollTop() >= 200){
			$('.nav-menu').addClass('customer-navbar');
		} else{
			$('.nav-menu').removeClass('customer-navbar');
		}
	});//end To make nav small size
    //change toggle button
	$('.nav-button').click(function(){
		$(this).toggleClass('change');
        console.log("nav")
	});	
	//appear category 
	      $(window).scroll(function() {
        let position = $(this).scrollTop();
        if(position >= 350) {
            $('.category').addClass('change-img');
        } else {
            $('.category').removeClass('change-img');
        }

      });
    //style link
    $('.link-style').click(function(){
      $(this).addClass('link-style-active').siblings().removeClass('link-style-active');
     });
    //Start Navbar 
         $('nav .icon .slidBar').click(function(){
        $('.h-link-list').slideToggle(500);
        $(this).toggleClass('fa-angle-down').toggleClass('fa-angle-up');
    });
    
    //custom file 
    // Add the following code if you want the name of the file appear on select
        //$(".custom-file-input").on("change", function() {
          //var fileName = $(this).val().split("\\").pop();
          //$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        //});
    //End Navbar
	//Sgin Up Page
	//Validation
	    //variables
	        var asUser=$('.asUser');
	        var asSeller=$('.asSeller');
	        var asCompany=$('.asCompany');
		    var spanAsUser=$('.spanAsUser');
	        var spanAsSeller=$('.spanAsSeller');
	        var spanAsCompany=$('.spanAsCompany');
	        var choose_span=$('.choose-span');
            var name_txt_error= $('.name-txt-error');
			var nameDiv=$('.input-div .name');
			var email_txt_error= $('.email-txt-error');
			var emailDiv=$('.input-div .email');
	        var pass_txt_error= $('.pass-txt-error');
			var passDiv=$('.input-div .pass');
	        var cpass_txt_error= $('.cpass-txt-error');
			var cpassDiv=$('.input-div .cpass');
	        var oldpassDiv=$('.input-div .oldpass');
	        var Fname_txt_error= $('.Fname-txt-error');
	        var FnameDiv=$('.input-div .Fname');
		    var Address_txt_error= $('.Address-txt-error');
	        var AddressDiv=$('.input-div .Address');
			var phone_txt_error= $('.phone-txt-error');
	        var phoneDiv=$('.input-div .phone');
	
	     //end variables
	//choose-Account
	asUser.on('click',function(){
		$(this).addClass('active_choose_a');
		//$(this).siblings().removeClass('active_choose_a');
		//HideElement(FnameDiv.parent().parent());
         //HideElement(FnameDiv.closest('.span-info'));
		//HideElement(AddressDiv.parent().parent());
         //HideElement(AddressDiv.closest('.span-info'));
		//HideElement(phoneDiv.parent().parent());
        //HideElement(phoneDiv.closest('.span-info'));
        FnameDiv.parent().parent().css('display','none');
        AddressDiv.parent().parent().css('display','none');
        phoneDiv.parent().parent().css('display','none');
       
		$('.r-user').prop("checked",true);
	});
	asSeller.on('click',function(){
		  //Appear input 
		$(this).addClass('active_choose_a');
		//$(this).siblings().removeClass('active_choose_a');
		//AppearElement(FnameDiv.parent().parent());
        //AppearElement(FnameDiv.closest('.span-info'));
		//AppearElement(AddressDiv.parent().parent());
        //AppearElement(AddressDiv.closest('.span-info'));
		//AppearElement(phoneDiv.parent().parent());
        //AppearElement(phoneDiv.closest('.span-info'));
        
        FnameDiv.parent().parent().css('display','flex');
        AddressDiv.parent().parent().css('display','flex');
        phoneDiv.parent().parent().css('display','flex');
        
		$('.r-seller').prop("checked",true);
	});
	asCompany.on('click',function(){
		FnameDiv.parent().fadeOut(1200);
	});
	//show and hide asUser-popup 
	    $('[data-toggle="asUser"]').popover({
	    placement : 'left',
		html : true,
		trigger:'hover',
        content : '<div class="media">allow user</div>'
		 });  
	//end show and hide asUser-popup 
	//show and hide v-popup 
	    $('[data-toggle="asSeller"]').popover({
	    placement : 'left',
		html : true,
		trigger:'hover',
        content : '<div class="media">allow asSeller</div>'
		 });  
	//end show and hide asSeller-popup
	//show and hide asCompany-popup 
	    $('[data-toggle="asCompany"]').popover({
	    placement : 'right',
		html : true,
		trigger:'hover',
        content : '<div class="media">allow asCompany</div>'
		 });  
	//end show and hide asCompany-popup
	//end choose-Account
	//name-validate
	$('.input-div .name').on('blur',function(){
		if($(this).val() === ""){
			Validation(name_txt_error,nameDiv);
		   }
	}); //end name-validate 
	
	//Remove name-validate
		$('.input-div .name').on('keypress focus',function(){
			RemoveValidation(name_txt_error,nameDiv);
	}); //end Remove Remove name-validate
	
		// email-validation
	$('.input-div .email').on('blur',function(){
		if($(this).val() ===""){
			Validation(email_txt_error,emailDiv);
		   }
	});//end email-validation
	
		//Remove email-validation
		$('.input-div .email').on('keypress focus',function(){
			RemoveValidation(email_txt_error,emailDiv);
	}); //end Remove Remove email-validation
	
	//password-validate
		$('.input-div .pass').on('blur',function(){
			// check Empty
		if($(this).val() === ""){
			Validation(pass_txt_error,passDiv);
		   }//end if 
	});//end password-validate
	
		//Remove password-validate
		$('.input-div .pass').on('keypress focus',function(){
			RemoveValidation(pass_txt_error,passDiv);
		    //Appear Confirmation Password input when typing in password input 
			cpassDiv.parent().parent().css('display','flex');
           // AppearElement(cpassDiv.closest('.span-info'));
	}); //end Remove password-validate
	
		//Confirmation Password-validate
		$('.input-div .cpass').on('click',function(){
			// check Empty
		if($('.pass').val()===""){
			$('.input-div .cpass').prop('disabled',true);
			Validation(cpass_txt_error,cpassDiv);
		   }//end if 
	});//end Confirmation Password-validate
	
       //Remove Confirmation Password-validate
		$('.input-div .cpass').on('keypress focus',function(){
			RemoveValidation(cpass_txt_error,cpassDiv);
	}); //end Confirmation Password-validate
	
	//submit validate
	$('.Reg-form').submit(function(event){
		if($('.cpass').val()!=$('.pass').val()){
			var pass_txt_error= $('');
			Validation(cpass_txt_error,cpassDiv);
			Validation(pass_txt_error,passDiv);
			event.preventDefault();
		}
	});
	//end submit validate
	//end sign up page
	
				// userDashboard page 
	  //appear old password input when click on link
	$('.change-pass').on('click',function(){
		AppearElement(oldpassDiv.parent());
	});
	 //end appear old password input when click on link
	 //appear password input when click on old password 
	   oldpassDiv.on('click',function(){
		AppearElement(passDiv.parent());
	});
	 //end appear password input when click on old password 
	//end userDashboard page 
  /*   //send id via button
	$('.deleteButton').click(function(){
        var selectedID=$(this).attr('id');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          $(this).css('border','10px solid red');
         // $('#deleted-modal').modal('show');
          console.log(selectedID);
         }
    };
    xmlhttp.open("GET", "functions/ModalForDB.php?selectedID=" + selectedID, true);
    xmlhttp.send();
  });//end send id via button
   */
    //SellerDashboard page
    $('.ImgfileInput').change(function(){
        filePreview(this); 
        console('preview')
        });
    //End SellerDashboard page
    
    //Start Product_Details Page
    //Show Store Description
        $('.more-icon').click(function(){
        $('.more-icon i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
        $(this).closest('.store-info').find('.store-des').slideToggle(100);
        console.log('more');
        $(this).toggleClass('color-gray');
          });
    //End Product_Details Page
    //Start category_row page
    //Show product that belong to specific category 
        $('.catogery-ele').click(function(){
            var catogerID=$(this).data('class');
            $(this).addClass('active').siblings().removeClass('active')
            if(catogerID==0){
                $('.product-col').slideDown(1000);
            }//end if
            else{
              $('.product-col').slideUp(1000);
              $(catogerID).slideDown(2000);
            }//end else
        });
        //Show Catogery And All Products
        $('.allCatogery').click(function(){
            $('.allCatogery i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
            $('.catogeries').slideToggle(1000);
            $('.product-col').slideDown(2000);    
            console.log('all');
        });
    //End category_row page
    
    //Start product_card page
            //Show Description
        $('.des-angle-down').click(function(){
            $('.des-angle-down i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
            $(this).closest('.card').find('.card-des').slideToggle(100);
        });
       //Coloring Estimate
        $('.card-estimate span').click(function(){
            $(this).toggleClass('color-gray');
        });
       // Redirect To Product_Details Page
         $('.pro-card-body').click(function(){
          Redirect_Product_details($(this));
        });
       // Redirect To Product_Details Page
         $('.card-name h3').click(function(){
          Redirect_Product_details($(this));
        });
        //function To Redirect To Product_Details Page
        function Redirect_Product_details(item){
          var productID=item.closest('.card').find('.productID').val();
          window.location.replace("Product_Details.php?productID=" + productID);  
        }//end function
     //End Product_card page
     //Start Product_Details Page
    //Redirect To Show_Store Page Via store logo
    $('.store-logo').click(function(){
      var storeID=$(this).closest('.store-info').find('.storeID').val();
      window.location.replace("Show_Store.php?storeID=" + storeID); 
    });
    //Redirect To Show_Store Page Via store name
    $('.store-logo').click(function(){
      var storeID=$(this).closest('.store-info').find('.storeID').val();
      window.location.replace("Show_Store.php?storeID=" + storeID); 
    });
     //Redirect To Show_Store Page Via store card 
    $('.store-card-body').click(function(){
          var storeID=$(this).closest('.card').find('.storeID').val();
          Redirect_To_Store_Page($(this),storeID);
        });
     //Redirect To Show_Store Page Via store name
     $('.card-name h3').click(function(){
          var storeID=$(this).closest('.card').find('.storeID').val();
          Redirect_To_Store_Page($(this),storeID);
        });
        //function To Redirect To Store Page
        function Redirect_To_Store_Page(item,storeID){
          window.location.replace("Show_Store.php?storeID=" + storeID);  
        }//end function
   //End Product_Details Page
    
//Start ShoppingCart Page
        $('[data-toggle="tooltip"]').tooltip();
    //Increase Quantity
    //Variables
    //Get Sub Total
    var subTotal=parseInt($('.subTotal').val());
    //Get Sub Total
    var Total=parseInt($('.Total').val());
    //End Variables
    $('.plus-btn').click(function(){
         //Get Product Count
        var proCount=parseInt($(this).closest('.quantity-action').find('.proCount').val());
         //Get Product Quantity
        var proQuant=parseInt($(this).closest('.quantity-action').find('.proQuantity').val());
        //Get Product Price
        var proPrice=parseInt($(this).closest('.shopping-cart').find('.pro-price').val());
        //Get Product Total Price (Quntity Price)
        var totalPrice=parseInt($(this).closest('.shopping-cart').find('.total-Qun-price').val());
        if(proCount<proQuant){
            proCount++;
            totalPrice+=proPrice;
            subTotal+=proPrice;
            Total+=proPrice;
            //Show Sub Total
            $('.subTotal').val(subTotal);
            //Show Total
            $('.Total').val(Total);
            //Set Product Total Price (Quntity Price)
            $(this).closest('.shopping-cart').find('.total-Qun-price').val(totalPrice);
            //Set Product  Price Equal Increased Count
            $(this).closest('.quantity-action').find('.proCount').val(proCount);
            $(this).closest('.quantity-action').find('#showProCount').prop('value',proCount);
            //Show minus-btn
            $(this).closest('.quantity-action').find('.minus-btn').css('opacity',1);
            console.log($(this).closest('.quantity-action').find('.proCount').val());
        }//end if
        else{
            //Hide plus-btn
            $(this).css('opacity',0);
            //Message Maximum Quantity
            var messageMaxQuant="<div class='message-quanitity'><p>The last quanitity is ("+proQuant+")</p></div>";
            ShowMessageAfter($(this),messageMaxQuant);
          }//end else
     });//End plus-btn
    //End Increase Quantity
    //Decrease Quantity
    $('.minus-btn').click(function(){
    //Get Product Count
        var proCount=parseInt($(this).closest('.quantity-action').find('.proCount').val());
         //Get Product Quantity
        var proQuant=parseInt($(this).closest('.quantity-action').find('.proQuantity').val());
          //Get Product Price
        var proPrice=parseInt($(this).closest('.shopping-cart').find('.pro-price').val());
        //Get Product Total Price (Quntity Price)
        var totalPrice=parseInt($(this).closest('.shopping-cart').find('.total-Qun-price').val());
    if(proCount>1){
        proCount--;
        totalPrice-=proPrice;
        subTotal-=proPrice;
        Total-=proPrice;
        //Show Total
        $('.Total').val(Total);
        //Show Sub Total
        $('.subTotal').val(subTotal);
        //Set Product Total Price (Quntity Price)
        $(this).closest('.shopping-cart').find('.total-Qun-price').val(totalPrice);
        //Decreease Product Count
        $(this).closest('.quantity-action').find('.proCount').val(proCount);
        //Show Product Count In Input showProCount
        $(this).closest('.quantity-action').find('#showProCount').val(proCount);
        //Show plus-btn
        $(this).closest('.quantity-action').find('.plus-btn').css('opacity',1);
    }//end if
    else{
        //Hide minus-btn
        $(this).css('opacity',0);
        //Message Minimum Quantity
        var messageMinQuant="<div class='message-quanitity'><p>The Value 1 is minimum ("+proQuant+")</p></div>";
        ShowMessageAfter($(this),messageMinQuant);
    }//end else
});//end minus-btn
//End Decrease Quantity
$('.proCount').on('keyup',function(){
   var proCount = parseInt($(this).val());
   //Get Product Quantity
   var proQuant=parseInt($(this).closest('.quantity-action').find('.proQuantity').val());
    if(!$.isNumeric($(this).val())){
      //Message Error (Count Is Not Number) 
      var messageErrType="<div class='message-quanitity bg-danger'><p>Sorry ! You must enter number</p></div>";
      ShowMessageAfter($(this),messageErrType);
    }//end if
    if(proCount>proQuant){
      //Message Maximum Quantity
      var messageMaxQuant="<div class='message-quanitity'><p>The last quanitity is ("+proQuant+")</p></div>";
      ShowMessageAfter($(this),messageMaxQuant);
    }//end if
    if(proCount<1){
      //Message Minimum Quantity
      var messageMinQuant="<div class='message-quanitity'><p>The Value 1 is minimum ("+proQuant+")</p></div>";
      ShowMessageAfter($(this),messageMinQuant);
    }//end if
});//End proCount 
//Show Message After Item  
function ShowMessageAfter(item,message){
  item.after(message);
  var proQuant=parseInt(item.closest('.quantity-action').find('.proQuantity').val());
  item.val(proQuant);
  item.closest('.shopping-cart').find('.message-quanitity').delay(2000).fadeOut(1000);
}//end function
//End ShoppingCart Page   
    
    
	//Functions
	
	// login validation 
		function isEmpty(item){
		if(item === ""){
			return true;
		} //end if
		else{
			return false;
		}//end else 
	}//end function
	

	// validation
	function Validation(text,item_border){
		text.slideDown(1200);
	    item_border.parent().css('border','1px solid red');
	}//end function 
	
	// Remove validation
	function RemoveValidation(text,item_border){
		text.fadeOut(1200);
	    item_border.parent().css('border','1px solid #3fbbaa');
		return true;
	}//end function 
	
	//AppearElement
	function AppearElement(item){
		item.slideDown(1200);
	}
	//end AppearElement
    //HideElement
	function HideElement(item){
		item.slideUp(1200);
	}
	//end HideElement
    //submit form
    function submitFrom(item){
	  item.submit();
	}//end function
    function filePreview(input){
            if(input.files&&input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('.ImgUpload').prop('src',e.target.result);
                     $('.ImgUpload').css('opacity','1');
                };
                reader.readAsDataURL(input.files[0]);
            }//end if
        }//end function
    
     //turn on lightbox
	    lightbox.option({
        'wrapAround': true
      });

 });