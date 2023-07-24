<?php
function AlertMessage($alertTitle,$question,$yesLink,$NoLink){
$alert ='
<div class="alert alert-info mt-5 text-center font-weight-bolder " style="z-index: 33456;">
<p>'.$alertTitle.'</p>
<div class="bg-light mt-4" style="padding: 5px;">
<p class="lead">'.$question.'</p>
<a href='.$yesLink.' class="btn btn-success pr-4 pl-4 mr-3">Yes</a>
<a href='.$NoLink.' class="btn btn-danger pr-4 pl-4" data-dismiss="alert">No</a>
</div>
</div>';
  return $alert;
}//end function

function popMessage($message){
$popMessage="<div class='alert alert-info action-message text-center' style='z-index: 33456;'>
<i class='fa fa-check' style='font-size: 35px;'></i>
$message
</div>";
 return $popMessage;
}//end function

function AlertDanger($message){
$Message="<div class='alert alert-danger alert-dismissible text-center' role='start' style='z-index: 33456;'>
<button type='button' class='close' data-dismiss='alert' aria-lablel='Close'>
<span aria-hidden='true'>&times;</span>
</button> 
$message 
</div>";
 return $Message;
}//end function

function AlertInfo($message){
$Message="<div class='alert alert-info alert-dismissible text-center' role='start' style=''>
$message 
</div>";
 return $Message;
}//end function
?>