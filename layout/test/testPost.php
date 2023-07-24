<?php //include 'testget.php'?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>

<p>Suggestions: <span id="txtHint"></span></p>
<button id="8" class="bid"
           data-toggle="modal"
			 title="delete this product" 
			 data-placement="top" 
			 data-target="#delete-product" >onkkkkke</button>
    <button id="9" class="bid"
           data-toggle="modal"
			 title="delete this product" 
			 data-placement="top" 
			 data-target="#delete-product" >onmmmmmmmmm</button>
    
    
    	 <a
             class="deleteButton"
             id="2"
             data-toggle="modal"
			 title="delete this product" 
			 data-placement="top" 
			 data-target="#delete-product"
             >
			aaaaaaaaaaa
			 </a>
     <a
             class="deleteButton"
             id="6"
             data-toggle="modal"
			 title="delete this product" 
			 data-placement="top" 
			 data-target="#delete-product"
             >
			aaaaaaaaaaa
			 </a>
     <a
             class="deleteButton"
             id="0"
             data-toggle="modal"
			 title="delete this product" 
			 data-placement="top" 
			 data-target="#delete-product"
             >
			aaaaaaaaaaa
			 </a>

        <script src="js/jquery-3.4.1.min.js"></script>  
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js.map"></script>
    <script src="js/popper.min.js.map"></script>
        <script src="js/bootstrap.min.js"></script> 
<script>
$(function(){
function showHint() {
    var id=$('.bid').attr('id');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
          console.log(id);
      }
    };
    xmlhttp.open("GET", "testget.php?q=" + id, true);
    xmlhttp.send();
  }
  'use strict';
  $('.bid').click(function(){
    var selectedID=$('.bid').attr('id');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
          $('.delete-modal').modal();
          console.log(selectedID);
      }
    };
    xmlhttp.open("GET", "functions/ModalForDB.php?selectedID=" + selectedID, true);
    xmlhttp.send();
  });
    
     //send id via button
	$('.deleteButton').click(function(){
    var selectedID=$('.deleteButton').attr('id');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            $('.deleteButton').css('border','10px solid #000');
          $('#deleted-product').modal();
          console.log(selectedID);
      }
    };
    xmlhttp.open("GET", "functions/ModalForDB.php?selectedID=" + selectedID, true);
    xmlhttp.send();
  });//end send id via button 

});

</script>
    
</body>
</html>
