<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    $img =$_FILES['Imgfile'];
    $imgName=$_FILES['Imgfile']['name'];
    print_r($img) ;
    echo '<br>';
    
}
?>
<head>
<style>

    div{
       position:relative;
    }
   
    .btn{
   background: red;
    position: absolute;
    top: 55%;
    left: 0.5%;
    color: white;
    font-size: 12px;
    padding: 5px 5px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    z-index: 2;
    width: 164px;
        
    }
    .imgfile{
    z-index: 3;
    opacity: 0;
    position: absolute;
    left: 0%;
    width: 37px;
        
    }
    .custom-upload{
    background: #00f;
    width: 31px;
    position: relative;
    z-index: 1;
}
    .uploadimg{
        opacity: .4;
    }
}
    }
</style>
   <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
<form method="post" action="" enctype="multipart/form-data" class="form" >
    <div class="custom-upload">
        <span>Edit</span>
    <input type="file" id="imgfile" name="Imgfile" class="imgfile">
    
    </div>
      <input type="submit" id="submite" name="submit" class="submit">
</form>
<img src="images/Img.png" width="50" height="50" class="uploadimg">
<script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
<script>
    $(function(){
        function filePreview(input){
            if(input.files&&input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('.uploadimg').prop('src',e.target.result);
                     $('.uploadimg').css('opacity','1');
                    //$('.form +img').remove();
                    //$('.form').after('<img src="'+e.target.result+'" width="400" height="300" />')
                };
                reader.readAsDataURL(input.files[0]);
            }//end if
        }//end function
        $('.imgfile').change(function(){
           filePreview(this); 
        });
    });
</script>