<?php
include 'temp/ini.php';
?>
<!-- Cart  -->
 <div class="container shopping-bag">
     <!--Cart Name -->
     <div class="cart-name">
         <p>Khadija !This Is Your Cart</p>
     </div>
     <!--End Cart Name -->
     <!--Finality Result -->
    <div class="cart-result row">
        <!--columns-->
        <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Product Count</div>
           <div class="m-1">5 product(s)</div>
       </div>
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">SubTotal</div>
           <div class="m-1">$500</div>
       </div>
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Shopping</div>
           <div class="m-1">Free</div>
       </div>
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Total</div>
          <div class="m-1">$500</div>
       </div>
       <div class="col-md-3 col-sm-8 col-result">
          <div class="col-title">Your Save</div>
           <div class="m-1">0</div>
       </div>
        <!--End columns-->
      
     </div>
     <!--End Finality Result -->
     <!--Product Cart -->
    <div class="shopping-cart">
      <!-- Title -->
      <div class="title row">
       <div>
           <i class="fa fa-info" 
              data-toggle="tooltip" 
              title="Product Information"
              >
           </i>
       </div>
       <div><i class="fa fa-trash fa-lx text-danger" 
               data-toggle="tooltip" 
               title="Delete Product"></i></div>
          </div>
        <div class="container">
      <!-- Product #1 -->
      <div class="item row "> 

        <div class="image  col-md-3 col-sm-8">
          <div class="col-title">Image</div>
          <img src="images/boo.jpg" alt="" />
        </div>

        <div class="description  col-md-3 col-sm-8">
            <div class="col-title">Description</div>
          <p class="p-name">Common Projects </p>
            <div class="des">
            <p>hhhhhhhhhhhhhhhhhhhh jjjjjjjjjjjjjjj gggggggggggggggggggggggg hhhhhhhhhhhhhhhhhhh</p>
            </div>
          <p>$100<span>price of one</span></p>
        </div>
            <div class="quantity col-md-3 col-sm-8">
                <div class="col-title">Quantity</div>
              <div class="">
                  <button class="plus-btn" type="button" name="button">
                <i class="fa fa-plus"></i>
              </button>
              <input type="text" name="name" value="1">
              <button class="minus-btn" type="button" name="button">
                <i class="fa fa-minus"></i>
              </button>
            </div>
        </div>

        <div class="total-price col-md-3 col-sm-8 ">
            <div class="col-title">Total Price</div>
            <div class="m-1">$500</div>
          </div>


      </div>
       </div>
    </div>
    <!--End Product Cart -->
     <!--Product Cart -->
    <div class="shopping-cart">
      <!-- Title -->
      <div class="title row">
       <div>
           <i class="fa fa-info" 
              data-toggle="tooltip" 
              title="Product Information"
              >
           </i>
       </div>
       <div><i class="fa fa-trash fa-lx text-danger" 
               data-toggle="tooltip" 
               title="Delete Product"></i></div>
          </div>
        <div class="container">
      <!-- Product #1 -->
      <div class="item row "> 

        <div class="image  col-md-3 col-sm-8">
          <div class="col-title">Image</div>
          <img src="images/boo.jpg" alt="" />
        </div>

        <div class="description  col-md-3 col-sm-8">
            <div class="col-title">Description</div>
          <p class="p-name">Common Projects </p>
            <div class="des">
            <p>hhhhhhhhhhhhhhhhhhhh jjjjjjjjjjjjjjj gggggggggggggggggggggggg hhhhhhhhhhhhhhhhhhh</p>
            </div>
          <p>$100<span>price of one</span></p>
        </div>
            <div class="quantity col-md-3 col-sm-8">
                <div class="col-title">Quantity</div>
              <div class="">
                  <button class="plus-btn" type="button" name="button">
                <i class="fa fa-plus"></i>
              </button>
              <input type="text" name="name" value="1">
              <button class="minus-btn" type="button" name="button">
                <i class="fa fa-minus"></i>
              </button>
            </div>
        </div>

        <div class="total-price col-md-3 col-sm-8 ">
            <div class="col-title">Total Price</div>
            <div class="m-1">$500</div>
          </div>


      </div>
       </div>
    </div>
    <!--End Product Cart -->
</div>
<!--End Cart -->
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>