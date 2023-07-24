
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="js/jquery-3.4.1.min.js"></script>

    
   <script>
$(function(){
  'use strict';
  $("button").click(function(){
    var xmlhttp = new XMLHttpRequest();
     var selectedID;
     xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           $(this).css('border','5px solid red');
          console.log(this.readyState+'\n'+this.status);
          selectedID=$(this).attr('id');
      }
    };
    xmlhttp.open("GET", "testform.php?q=" + str, true);
    xmlhttp.send();
  });
});
</script> 
</head>
<body>
    <button type="button" id="<?php echo 'nnnnnn' ; ?>" value="<?php echo 'nnnnnn' ; ?>" class="button" name="selected" data-toggle="modal"
              data-target="#delete-product"><?php echo 'nnnnnn' ; ?></button>
    <button id="9" data-toggle="modal"
			 data-target="#delete-product"
			 title="edit this product" 
			 data-placement="top">Send 5</button>
    <button type="button" id="6" value="2" class="button" name="selected" data-toggle="modal"
			 data-target="#delete-product">2</button>
         <button type="button" id="7" value="3" class="button" name="selected" data-toggle="modal"
			 data-target="#delete-product">3</button>
</body>
</html>
<?php

// get the q parameter from URL
$q = $_REQUEST["q"];


// Output "no suggestion" if no hint was found or output correct values
echo 'id = '.$q;
?>