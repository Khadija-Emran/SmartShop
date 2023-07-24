
<html>
<body>

<p><b>Start typing a name in the input field below:</b></p>

<p>Suggestions: <span id="txtHint"></span></p>


    <button type="button" id="<?php echo 'nn' ; ?>" value="<?php echo 'nnnnnn' ; ?>" class="button" name="selected" data-toggle="modal"
              data-target="#delete-product" onclick="sendid()"><?php echo 'nn' ; ?></button>
    <button id="9" data-toggle="modal"
			 data-target="#delete-product"
			 title="edit this product" 
			 data-placement="top" onclick="sendid()">Send 5</button>
    <button type="button" id="6" value="2" class="button" name="selected" data-toggle="modal"
			 data-target="#delete-product" onclick="sendid()">2</button>
         <button type="button" id="7" value="3" class="button" name="selected" data-toggle="modal"
			 data-target="#delete-product" onclick="sendid()">3</button>

<script>
function sendid() {
    //var selectedID=$(this).attr('id');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           document.getElementById("txtHint").innerHTML = this.responseText;
          console.log(this.readyState+'\n'+this.status)
      }
    };
    xmlhttp.open("GET", "testGetajax.php?id=" +9, true);
    xmlhttp.send();
}

</script>

</body>
</html>
<?php

// get the q parameter from URL
echo '<br>';
//echo $_GET['khadija'];
echo '<br>';
echo 'id = ';
echo $_GET['id'];
if(isset($_GET['id'])){


// Output "no suggestion" if no hint was found or output correct values

    echo $_GET['id'];
    }
?>