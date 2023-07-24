<div class="row p-2">
<?php

//Lock Button
    if(!isset($_SESSION['cartID'])){
        echo "<button
        class='add col' 
        title='You Have Not Cart'
        data-toggle='modal'
        data-target='#confirm'
        >";
        echo "<span><i class='fa fa-shopping-cart mr-1'></i>  </span>Add To Cart";
        echo "</button>";
        // Seize button
        echo "<button
        class='btn buy ml-2 col' 
        title='You Have Not Cart'
        data-toggle='modal'
        data-target='#confirm'
        >";
        echo "Seize";
        echo "</button>";
          // buy button
        echo "<button
        style='width: 92%;background: #027162 !important;'
        class='btn buy ml-2 mr-2 mt-2 col' 
        title='You Have Not Cart'
        data-toggle='modal'
        data-target='#confirm'
        >";
        echo "Buy Now";
        echo "</button>";
        echo '<br>';
    }//end if
    else {
        //Get cart product 
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
            //store cart products
            $_SESSION['cart']=$cartPro->GetCartProducts($cartID);
        }//end if
        //If Product Is Exists Show Update Cart Button
        if(array_key_exists($ProID, $_SESSION['cart'])){
        echo "<a href='ShoppingCart.php' class='add btn update-cart col' data-toggle='tooltip' 
        title='This Product Exists In The Cart Upade It' style='background: #b30202 !important;'>";
            echo "Update Cart";
        echo "</a>";
    }//end if
    //Else , Show Add To Cart Button
       else{
        echo "<a href='Actions/cart/Add_to_cart.php?productID={$ProID}&qun=1&price={$Price}' 
        class='add btn col'><span><i class='fa fa-shopping-cart mr-1'></i>  </span>
        Add to Cart</a>";                           
    }//end else

if($Stute==0){
  $disabled='disabled';
  $tooltip='tooltip';
  $class='seized';
  $name='Seized';
  $title='This Product is locked';
}//end if
else{
  $disabled='';
  $tooltip='tooltip';
  $class='';
  $name='Seize';
  $title='This Product is available';
}//end else
echo "<button class='btn buy ml-2' $disabled data-toggle=$tooltip title='".$title."'>$name</button>";
    // Buy Button
    echo "<button
    style='width: 92%;background: #027162 !important;'
    class='btn buy ml-2 mr-2 $class col' 
    $disabled data-toggle=$tooltip title='".$title."'>";
    echo "Buy Now";
    echo "</button>";
    //End Buy Button
    echo '<br>';
    }//end if
echo '</div>';
?>
</div>