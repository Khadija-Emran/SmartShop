<?php
 session_start();
	$selectedID = $_SESSION['Selscted_Id']; 
    echo '<br>';
    echo $selectedID;  
?>
<!DOCTYPE html>
<html>
<head>
        <script src="../js/jquery-3.4.1.min.js"></script>
    
<script>
$(function(){
  'use strict';
  $("button").click(function(){
    var selectedID=$(this).attr('id');
    $.post("../SellerDashboard.php",
    {
      selectedID: selectedID,
    },
    function(data,status){
        console.log(data);
        console.log(status);
    });
      
  });
});
</script>
</head>
<body>

    <button id="5">Send 5</button>
    <button id="6">Send 6</button>
    <button id="7">Send 7</button>
</body>
    <a href="../functions/delete.php"></a>
</html>