<?php
if ($_SERVER['REQUEST_METHOD']=='POST') { 
	/*$img=$_FILES['ProductImg'];
	echo '<pre>';
	print_r($img);
	echo '</pre><br>';
	
	$img_name=$img=$_FILES['ProductImg']['name'];
	$img_error=$_FILES['ProductImg']['error'];
	$temPath=$img=$_FILES['ProductImg']['tmp_name'];
	$filePath=$_SERVER['DOCUMENT_ROOT'].'\SmartShop\layout\images\upload\\';
	echo 'path'.$_SERVER['DOCUMENT_ROOT'];
    echo '<br>';
	//Set Errors
	$img_errors=array();
	
	//Set Allow Images Extensions
	$allowed_extension=array('jpg','jpeg','png');
	//Get Image Extension
	$extension=explode('.', $img_name );
	$Img_extension=strtolower(end($extension));
	//Check If Image Is Not Uploaded
	if($img_error==4){
		$img_errors[]='<div>Image Not Uploaded</div>';
	}
	//End check if img uploaded
	
	else {
		//Check If Extension Is Not Valid
		if(!in_array($Img_extension,$allowed_extension)){
		$img_errors[]='<div>Image Extension Not Valid Your Extension Image Must Be jpg or jpeg or png</div>';
	    }
		//End check if img uploaded
    }//end else
	
	
	//print image Errors
	foreach($img_errors as $error){
		echo $error;
	}
	//End print image Errors
	
	//Check If No Errors And Upload Image 
     if(empty($img_errors)){
	  //Uploaded Image
	  move_uploaded_file($temPath,$filePath.$img_name);	 
	 }
    //End Check If No Errors And Upload Image 
}
include 'functions/UserClass.php';
include 'functions/ProductClass.php';
//Define Object From UserClass
 $user=new User();
$userData=array();
$userData=$user->GetUserData(27);
foreach($userData as $key => $value) {
    echo "Key=" . $key . ", Value=" . $value;
    echo "<br>";
}
 $product= new Product();
$error='Password is not true ';
echo $product->GetProductCount();
echo '<br>';
$all=array();
$one=array();
$all=$product->GetAllProduct();
$one=$all[1];
print_r($all);
echo '<br>';echo '<br>';
foreach($one as $key => $value) {
    echo "Key=" . $key . ", Value=" . $value;
    echo "<br>";

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
   echo $_POST["selectedID"];
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>'; */
}
?>
<body>
    <button type="button" class="deleteButton"  id="6">Click</button>
<script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/lightbox.js"></script>
        <script src="js/wow.min.js"></script>
		  <script>
		  new WOW().init();
		  </script>
        <script>
        $('.deleteButton').on('click',function(){
       var selectedID=$(this).attr('id');
            $(this).css('border','10px solid red');
       $.post("test.php",{selectedID:'helllllllllllllo'},function(data,status){
       }) ;
	});  
       </script>



</body>


<!--
    //submit form via button
	$('.deleteButton').on('click',function(){
            $(this).css('border','8px solid red');
       var selectedID=$(this).attr('id');
       submitFrom($('.hiddenForm'));
       $('.hiddenFiled').val(selectedID); 
	});
    
    $('.testsub').on('click',function(){
        $(this).css('border','8px solid red');
        var id=3;
       $('.hiddenFiled').val(id); 
	});
-->
	