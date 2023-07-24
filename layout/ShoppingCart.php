<?php
include 'temp/ini.php';
include $CartActionPath;
 include $userActionPath;
 include $categoryActionPath;
include 'temp/Navbar.php' ;

//If CartID is existing
    if(isset($_SESSION['cartID'])){
       $cartID=$_SESSION['cartID'];
       //session variable to store cart products
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
        //store cart products
        $_SESSION['cart']=$cartPro->GetCartProducts($cartID);
    }//end if
    //if cart is empty
    if(count($_SESSION['cart'])==0){
        $alertTitle='Your Cart Is Empty  !';
        $question='Do You Want To Add Products ?';
        $yesLink='ShowProducts.php';
        $NoLink='#';
        echo AlertMessage($alertTitle,$question,$yesLink,$NoLink);
    }//end if
    //otherwise if cart is not empty
    else{
    //session variable to store cart info
    if(!isset($_SESSION['cartInfo'])){
        $_SESSION['cartInfo']=array();
        //store cart info
        $_SESSION['cartInfo']=$cart->GetCartData($cartID);
    }//end if 
   //user name from session 
   if(isset($_SESSION['User_name'])){
     $userName=$_SESSION['User_name'];  
   }//end if

?>
<!-- Cart  -->
 <div class="container shopping-bag">
     <?php
      //Cart Variables
      //Cart Products Count
      $CartProCount=$_SESSION['cartInfo']['TotProCount'];
      //Cart Sub Total
      $CartSubTotal=$_SESSION['cartInfo']['subTotal'];
      //Cart Sub Total
      $CartTotal=$_SESSION['cartInfo']['TotalPrice'];
         //End Cart Variables
     //Set Cart Variables
     //Set Cart Products Count
     $CartProCount=count($_SESSION['cart']);
    if(isset($_SESSION['ProductPrice'])){
       $CartSubTotal=$CartSubTotal+$_SESSION['ProductPrice'];
       $CartTotal=$CartTotal+$_SESSION['ProductPrice'];
       $_SESSION['cartInfo']['TotalPrice']=$_SESSION['ProductPrice'];
    }
     //End Set Cart Variables
     ?>
     <!--Cart Name -->
     <div class="cart-name">
         <p> <?php echo $userName; ?> !This Is Your Cart</p>
     </div>
     <!--End Cart Name -->
     <!-- Form Cart Product -->
      <form action="" method="post" class="form-cart-pro">
           <!--Control Button (Save , Add) -->
          <div class="control-btn">
              <a type="submit" href="ShowProducts.php" class="form-control control-item">Add Products</a>
              <button type="submit" name="save_cart" class="form-control  text-light font-weight-bold control-item">Save Cart</button>
          </div>
         <!--End Control Button (Save , Add) -->
     <!--Finality Result -->
    <div class="cart-result row">
        <!--columns-->
        <!--Product Count -->
        <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Product Count</div>
           <div class="m-1">
               <!--hidden products count -->
               <input 
                      type="hidden"
                      name="totProCount"
                      id="totProCount"
                      class="result-input"
                      value="<?php echo $CartProCount;?>"
                      >
               <input 
                      type="text"
                      name="totProCount"
                      id="totProCount"
                      class="result-input"
                      value="<?php echo $CartProCount;?>"
                      disabled>
               </div>
       </div>
        <!--End Product Count -->
        <!--SubTotal -->
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">SubTotal</div>
           <div class="m-1">
               <!--hidden subtitle-->
               <input type="hidden"
                      name="subtotal"
                      id="SubTotal"
                      class="subTotal result-input"
                      value="<?php echo $CartSubTotal;?>"
                      >
               <input type="text" 
                      name="subtotal"
                      id="SubTotal"
                      class="subTotal result-input"
                      value="<?php echo $CartSubTotal;?>"
                      disabled>
               </div>
       </div>
        <!--End SubTotal -->
        <!--Shopping -->
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Shopping</div>
           <div class="m-1">
               <input type="text" 
                      value="Free"
                       class="result-input">
               </div>
       </div>
        <!--End Shopping -->
        <!--Total -->
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Total</div>
          <div class="m-1">
              <!--hidden Total-->
              <input type="hidden"
                     name="total"
                     id="Total"
                     class="Total result-input"
                     value="<?php echo $CartTotal;?>"
                     >
              
              <input type="text"
                     name="total"
                     id="Total"
                     class="Total result-input"
                     value="<?php echo $CartTotal;?>"
                     disabled>
           </div>
       </div>
        <!--End Total -->
        <!--Your Save -->
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Your Save</div>
           <div class="m-1"><input 
                                   type="text" 
                                   value="0"
                                   class="result-input" disabled></div>
       </div>
        <!--End Your Save-->
        <!--End columns-->
     </div>
     <!--End Finality Result -->
     <?php 
     foreach($_SESSION['cart'] as $key=>$value){
         //Product Variables
         //Product ID
         $productID=$_SESSION['cart'][$key]['ProductID'];
         //Product Object To Get Its Data 
         ProductObject($product,$productID);
         //Product Data
         $proName =$product->getProName();
         $proImage =$product->getProImage();
         $proDes =$product->getProDes();
         $proPrice =$product->getPrice();
         $proQuntity =$product->getQuantity();
         $proStatus =$product->getProStatus();
         $proCatogery =$product->getCatogeryID();
         $proStore =$product->getStoreId();
         //End Product Data
         //Total Price Of Product Quntity
         $TotalQunPrice=$_SESSION['cart'][$key]['TotalQunPrice'];
         //Count Of Product
         $ProCount=$_SESSION['cart'][$key]['ProCount'];
         //End Product Variables
     ?>
     <!--Product Cart -->
    <div class="shopping-cart">
      <!-- Product Cart Title -->
      <div class="title row">
           <!-- Info Product -->
           <div>
               <!-- Info Product Button -->
               <a class="btn-icon product-info" 
                       href="Product_Details.php?productID=<?php echo $productID; ?>"
                       name="product-info"
                       id="<?php echo $productID; ?>">
                   <!-- Info Product icon -->
                   <i class="fa fa-info product-info" 
                      data-toggle="tooltip" 
                      title="Product Information"
                      >
                   </i>
                   <!-- End Info Product Icon -->
               </a>
               <!-- End Info Product button -->
           </div>
           <!-- End Info Product  -->
           <!-- Delete Product  -->
           <div>
               <!-- Delete Product Button -->
               <input type="hidden" name="productID" value="<?php echo $productID ;?>">
               <button class="btn-icon del-cart-pro" 
                       type="submit" 
                       name="del_cart_pro" 
                       id="<?php echo $productID; ?>"
                       >
                    <!--  Delete Product Icon -->
                   <i class="fa fa-trash fa-lx text-danger" 
                   data-toggle="tooltip" 
                   title="Delete Product">
                   </i>
                   <!-- End Delete Product Icon -->
               </button>
                <!-- End Delete Product Button -->
          </div>
           <!-- End Delete Product  -->
            </div>
        <?php 
         $ProID=$productID;
         $Price=$TotalQunPrice;
         $Stute=$proStatus;
         //include 'Modal/Product/productOptions.php';
        ?>
     <!-- End Product Cart Title -->
     <!-- Product Info In Cart-->
    <div class="container">
      <!-- Product Row -->
      <div class="item row "> 
          <!-- Product Image -->
        <div class="image  col-md-3 col-sm-8">
          <div class="col-title">Image</div>
          <img src="<?php echo $proImage; ?>" alt="" />
        </div>
          <!-- End Product Image -->
          <!-- Product Description -->
        <div class="description  col-md-3 col-sm-8">
            <div class="col-title">Description</div>
          <p class="p-name"><?php echo $proName; ?> </p>
            <div class="des">
            <p><?php echo $proDes; ?></p>
            </div>
          <p><?php echo $proPrice; ?><span>price of one</span></p>
        </div>
          <!-- End Product Description -->
          <!-- Product Quantity -->
            <div class="quantity col-md-3 col-sm-8">
                <div class="col-title">Quantity</div>
                   <div class="quantity-action">
                       <!-- Product Quantity (hidden) -->
                       <input type="hidden" 
                              class="proQuantity" 
                              value="<?php echo $proQuntity;?>">
                       <!-- End Product Quantity (hidden) -->
                      <button class="plus-btn" 
                              type="button" 
                              name="plus-btn"
                              id="<?php echo $productID; ?>"
                              >
                       <i class="fa fa-plus"></i>
                      </button>
                      <input type="text" 
                             name="product_count"
                             id="showProCount"
                             class="proCount"
                             value="<?php echo $ProCount; ?>">
                      <button class="minus-btn" 
                              type="button" 
                              name="minus-btn"
                              id="<?php echo $productID; ?>"
                               >
                      <i class="fa fa-minus"></i>
                      </button>
                   </div>
        </div>
          <!-- End Product Quantity -->
          <!-- Product Quantity Total Price -->
        <div class="total-price col-md-3 col-sm-8 ">
            <div class="col-title">Total Price</div>
            <div class="m-1">
                <input type="hidden"
                       class="pro-price"
                       value="<?php echo $proPrice ;?>">
                <!--hidden price-->
                <input type="hidden"
                       id="total-Qun-price"
                       class="total-Qun-price result-input"
                       name="quant_Price"
                       value="<?php echo $TotalQunPrice; ?>" 
                       >
                <input type="text"
                       id="total-Qun-price"
                       class="total-Qun-price result-input"
                       name="quant_Price"
                       value="<?php echo $TotalQunPrice; ?>" 
                        disabled></div>
          </div>
          <!-- Product Quantity Total Price -->
      </div>
        <!-- Product Row -->
       </div>
    <!-- End Product Info in Cart -->
    
        
          </div>
    <!--End Product Cart -->
    <?php }//End foreach ?>  
     </form>
  <!--End Form -->   
</div>
<!--End Cart -->
<?php
 }//end else
}//end if 
//otherwise there is not cart
else {
    $alertTitle='You Have Not Cart  !';
    $question='Do You Want To create Account ?';
    $yesLink='SignUp.php';
    $NoLink='#';
    echo AlertMessage($alertTitle,$question,$yesLink,$NoLink);
}//end else 
?>
<?php   include 'temp/footer.php'; ?>
<script>
    
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

</script>