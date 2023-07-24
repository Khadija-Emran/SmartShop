<?php 
include 'temp/ini.php';
 //require_once('Modal/overlay/product_overlay.php');
$coinsArray=array();
$coinsArray=['$'=>'Dolar','R.Y'=>'Rial Yemeni','R.S'=>'Rial Saudi','€'=>'Yoro'];
$quantityType=array();
$quantityType=['piece(s)','packet'];
?>

<button class="show-overlay">Show overlay</button>
<button class="add">Add product </button>
<button class="update">Update product</button>

<script>
    $('.show-overlay').click(function(){
        $('.overlay-product').fadeIn();
        console.log('Show overlay');
    });
</script>

<?php require_once('Modal/overlay/product_overlay.php');?>