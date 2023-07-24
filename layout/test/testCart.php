<?php
include 'functions/CartClass.php';
include 'functions/ProductActions.php';
include 'temp/ini.php';
//Cart Row
$cartPro=new CartProducts();
$cart=new Cart();
//echo $cart->GetUserCartID(55);echo '<br>';
$cartArray=array();
$cartArray=$cartPro->GetCartProducts(1);
$allCartPro=array();
$oneCartPro=array();
$allCartPro=$cartPro->GetCartProducts(1);
echo $TotProCount=count($allCartPro);
 echo '<table>';
    echo '<tr>';
    echo '<th>ProID</th>';
    echo '<th>ProCount</th>';
    echo '<th>ProQunPrice</th>';
    echo '</tr>';
foreach($allCartPro as $key=>$value){
      $oneCartPro=$allCartPro[$key];
      //Product Data    
      $proID=$oneCartPro['ProductID'];
      $proCount=$oneCartPro['ProCount'];
      $torQunPrice=$oneCartPro['TotalQunPrice'];
    echo '<tr>';
    echo '<td>'.$proID.'</td>';
    echo '<td>'.$proCount.'</td>';
    echo '<td>'.$torQunPrice.'</td>';
    echo '</tr>'; 
}//end for
  echo '</table>';
$allProducts=array();
$oneProduct=array();
//$cartID=$_SESSION['cartID'];
$productID=18;
$cartID=1;
$proCount=2;
ProductObject($product,$productID);
$proQuantity =$product->getQuantity();
if(isset($_POST['add_pro'])){
    $flag=$cartPro->IsExistInCart($productID,$cartID);
    $userID=55;
    $cartID=1;
    if(isset($cartID)){
        if($flag==0){
            ProductObject($product,$productID);
            $proPrice =$product->getPrice();
            $TotalQunPrice=$proPrice*$proCount;
            $cartPro->AddToCart($cartID,$productID,$proCount,$TotalQunPrice);
            $TotProCount=count($cartArray);
            
           echo  '<script>confirm("You  Add This Product");</script>';
          }//end if
        else{
            echo '<script>confirm("You Have Add This Product");</script>';  
        }//end else
    }//end if
    else{
        echo '<script>confirm("You Have Not Cart");</script>';
    }//end else
    
}//end if
else if(isset($_POST['update_pro'])){
    $proCount=$_POST['proCount'];
   $cartPro->UpdateProCount($cartID,$productID,$proCount); 
}
else if(isset($_POST['del_pro'])){
   $cartPro->DelProFcart($cartID,$productID); 
    echo '<script>confirm("You Deleted This Product");</script>';  
}
else if(isset($_POST['show_pro'])){
   $allProducts=$cartPro->GetAllProCart(); 
   for($i=1;$i<=count($allProducts);$i++){
      $oneProduct=$allProducts[$i];
      //Product Data
      echo $oneProduct['CartID']; echo '<br>';
      echo $oneProduct['ProductID']; echo '<br>';
      echo $oneProduct['ProCount']; echo '<br>';
  }//end for
}
else if(isset($_POST['clear_cart'])){
   if($cartPro->DelAllProFcart($cartID)){
    echo '<script>confirm("Your Cart Is Empty");</script>'; 
   }
}

//functions
function finalPrice(){
    
}
//end function
?>

<form action="" method="post">
    <input type="hidden" id="proCount" name="proCount" value="1">
    <input type="submit" value="add Product" name="add_pro">
    <input type="submit" value="Update Product" name="update_pro">
    <input type="submit" value="Delete Product" name="del_pro">
    <input type="submit" value="show Products" name="show_pro">
    <input type="submit" value="Clear Cart" name="clear_cart">
</form>
<div class="toast">
    <div class="toast-body">
      Success <i class="fa fa-check"></i>
    </div>
</div>
<!--Success Message-->
<div class="trueMessage text-center" style="background: #090;
    color: #fff;
    display: none;
    width: 374px;
    height: 68px;
    position: absolute;
    top: 15%;
    left: 32%;">
    <i class="fa fa-check" style="font-size: 58px;"></i>
</div>
<p  id="<?php echo $proCount?>" class="proCount"></p>
<button onclick="clickCounter()" class="proPlus">+</button>
<button onclick="clickMinus()" class="proMinus">-</button>
<button class="trueMess">show true</button>
<p hidden id="<?php echo $proQuantity;?>" class="proQuantity"></p>
<?php
$action = isset($_GET['action']) ? $_GET['action'] : "";
echo "<div class='col-md-12'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Product was added to your cart!";
            print_r($_SESSION['item']);
        echo "</div>";
    }
 
    if($action=='exists'){
        echo "<div class='alert alert-info'>";
            echo "Product already exists in your cart!";
            print_r($_SESSION['item']);
        echo "</div>";
    }
echo "</div>";

?>
<a href="functions/att_to_cart.php?productID={$productID}" class="btn-primary">add to cart</a>

<?php
$productID=23;
// add to cart button
        echo "<div class='m-b-10px'>";
            if(array_key_exists($productID, $_SESSION['item'])){
                echo "<a href='ShoppingCart.php' class='btn btn-success w-100-pct'>";
                    echo "Update Cart";
                echo "</a>";
            }else{
                echo "<a href='functions/att_to_cart.php?productID={$productID}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
            }
        echo "</div>";

?>
<button data-toggle="modal" data-target="#delete_product"></button>
<button
class='btn btn-buy px-4 bg-danger' 
title='You Have Not Cart'
data-toggle='modal'
data-target='#ask_to_create_account'
        >Add Cart</button>;
<!-- Delete Modal-->
    <div class="modal fade" id="ask_to_create_account">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body add-product">
              <p>You Have Not Cart , Do You Want To Create Account ? </p>
          </div>
          <div class="modal-footer" style="padding: 5px;">
            <a href="SignUp.php" class="btn btn-success">Yes</a> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Delete Modal-->
<script>

    function clickCounter() {
    var proCount=parseInt($('.proCount').attr('id'));
    var proQuant=parseInt($('.proQuantity').attr('id'));
    if(proCount<proQuant){
        proCount++;
        $('.proCount').prop('id',proCount);
       document.getElementById($('.proCount').attr('id')).innerHTML=proCount;
        $('#proCount').prop('value',proCount);
        console.log(proCount);
    }//end if
    else{
        $('.proPlus').slideUp(100);
    }//end else
}//end function
//Minus on click button
    function clickMinus() {
    var proCount=parseInt($('.proCount').attr('id'));
    var proQuant=parseInt($('.proQuantity').attr('id'));
    if(proCount>1){
        proCount--;
        $('.proCount').prop('id',proCount);
       document.getElementById($('.proCount').attr('id')).innerHTML=proCount;
        $('#proCount').prop('value',proCount);
        console.log(proCount);
    }//end if
    else{
        $('.proMinus').slideUp(100);
    }//end else
}//end function
    $('.trueMess').click(function(){
        $('.trueMessage').css('display','block').delay(100).fadeOut(900);
    });
    
</script>
