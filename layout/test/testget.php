<?php
if(isset($_REQUEST["q"])){
// get the q parameter from URL
$q = $_REQUEST["q"];
del($q);

// Output "no suggestion" if no hint was found or output correct values
echo 'id = '.$q;
}
function del($id){
    echo '';
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <style>
      .divh{
          background: red;
          border: 5px solid #000;
          display: none;
      }
  </style>
</head>
<div class="divh">helllllllllllllllllllllllllo<?php echo $q ?></div>
 <!-- Delete product modal-->
		<div class="modal fade delete-modal" id="udelete-product">
		  <div class="modal-dialog">
			<div class="modal-content ">
			  <div class="modal-header">
				<h4 class="modal-title">Want to leave?</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body delete_modal">
				Press logout to leave
               <?php 
                echo 'id = '.$q;
                ?> 
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
				<a href="Home.php" class="btn btn-danger" >Logout</a>
			  </div>
			</div>
		  </div>
		</div>
<!-- end delete product modal-->

 
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        