/*global , $  ,console ,document ,window */
$(function(){
  'use strict'; 
function showSearchTable(){
    $('.SearchTable').slideDown();
}
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
$('.searchTable tr').click(function(){
  var tr=$(this);
  var itemID=tr.attr('id');
  var itemType=tr.attr('class');
    console.log(itemID);
    console.log(itemType);
  if(itemType=='Product'){
      window.location.replace("Product_Details.php?productID=" + itemID);  
  }//end if
  else if(itemType=='Category'){
      window.location.replace("Category.php?categoryID=" + itemID);  
  }//end if
  else if(itemType=='Store'){
      window.location.replace("Show_Store.php?storeID=" + itemID);  
  }//end if
});

$('input').keydown(function(event){
         var message="<div class='message-fadeIn'><p>You Can not enter this character</p></div>";
         $(this).after(message);
        var key_pressed = event.key;
        console.log('The pressed key was  '+key_pressed);
        console.log(checkSpecialChar(key_pressed));
        if(checkSpecialChar(key_pressed)){
            event.preventDefault();
            /*
            var message="<div class='message-fadeIn'><p>You Can not enter this character</p></div>";
            $(this).after(message);*/
            $('.message-fadeIn').fadeIn().delay(1000).fadeOut(1000);
           }
        
    });
function checkSpecialChar(char) {
    var specialChar = ['!','~','#','$','%','^','&','*','<','>','?',',','[',']','}','{','-','+','\'','\\','\"','|',':',';','/','(',')','=','؟'];
        var check = specialChar.includes(char);
        return check;
         
}//end function 

});