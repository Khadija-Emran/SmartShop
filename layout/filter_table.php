<!DOCTYPE html>
<?php include 'temp/ini.php';  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
    
.message-fadeIn{
    color: #fff;
    width: 272px;
    height: 31px;
    padding: 2px 15px;
    border-radius: 10px;
    position: absolute;
    background: #000;
    opacity: .5;
}
</style>
</head>
<body>
<?php 
    $int='script1@@@@@457-----<ht<>*()><[]{}~!$%^/\\+-script';
    echo filter_var($int, FILTER_SANITIZE_STRING)?>
<h2>My Customers</h2>
<button class="show_search">show search</button>
<button class="hide_search">hide search</button>

<div class="search_div" style=" width: 80%;
    border: 1px solid;
    height: 212px !important;
    overflow: auto;
    display:none">
    
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table id="myTable">
  <tr class="header" >
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Country</th>
  </tr>
  <tr id="24" class="item">
    <td>Alfreds Futterkiste</td>
    <td>Germany</td>
  </tr>
  <tr >
    <td>Berglunds snabbkop</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>UK</td>
  </tr>ظ
  <tr>
    <td>Koniglich Essen</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Canada</td>
  </tr>
  <tr>ؤرلاىةوزظ
    <td>Magazzini Alimentari Riuniti</td>
    <td>Italy</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Paris specialites</td>
    <td>France</td>
  </tr>
</table>
</div>
    
    <form>
        <input type="text" class="testchar">
    </form>
    
<script>
$('.show_search').click(function(){
    $('.search_div').slideDown();
});
$('.hide_search').click(function(){
    $('.search_div').slideUp();
});
$('.item').click(function(){
    var id =$(this).attr('id');
    window.location.replace("Product_Details.php?productID=" + id); 
});
function myFunction() {
  var input, filter, table, tr, td, i, txtValue,td2;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          
        tr[i].style.display = "";
          console.log('show');
      } 
        else {
        tr[i].style.display = "none";
        console.log('none');
      }
    }   
      
  }
}//end function 
var num1 = '160989k9090';
 if(isNaN(num1)){
  console.log(num1 + " is not a number <br/>");
 }else{
    console.log(num1 + " is a number <br/>");
 }
    
    
    $('input').keydown(function(event){
        var value=$(this).val();
        var key_pressed = event.key;
        console.log('The pressed key was  '+key_pressed);
        console.log(checkSpecialChar(key_pressed));
        if(checkSpecialChar(key_pressed)){
            event.preventDefault();
            var message="<div class='message-fadeIn'><p>You Can not enter this character</p></div>";
            $(this).after(message);
            $('.message-fadeIn').fadeOut(1000);
           }
        
    });
function checkSpecialChar(char) {
    var specialChar = ['!','~','#','$','%','^','&','*','<','>','?',',','[',']','}','{','-','+','\'','\\','\"','|',':',';','/','(',')','='];
        var check = specialChar.includes(char);
        return check;
}//end function 

var specialChar = ['!','~','#','$','%','^','&','*','<','>','?',',','[',']','}','{','.','-','+','\'','\\','\"','|',':',';'];
var check = specialChar.includes('^');
console.log(check);
    
</script>
    
</body>
    
</html>
