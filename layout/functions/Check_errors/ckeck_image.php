<?php
class CkeckErrors {
//Check Image Is Uploaded
	public function ImageIsUploaded($img_error){
	//Check If Image Is Not Uploaded
	if($img_error==4){
		return false;
	 }//end if
     else
        return true;
	}//end function
	
	//Check Image Size
	public function ImageSize($img_size){
	if($img_size>100000000){
		return false;
	 }//end if
    else
        return true;
	}//end function
	
	//Check Allow Images Extensions
	public function AllowImageExten($img_name){
	//Set Allow Images Extensions
	$allowed_extension=array('jpg','jpeg','png');
	//Get Image Extension
	$extension=explode('.', $img_name );
	$Img_extension=strtolower(end($extension));
	//Check If Extension Is Not Valid
	  if(!in_array($Img_extension,$allowed_extension)){
		return false;
	  }//end if
    else
        return true;
	}//end function 
   //Check Image Errors
    public function CheckImageErrors($img_size,$img_name){
        $ImageErrors=array();
        //check image size
        if(!$this->ImageSize($img_size)){
            $ImageErrors[]="Image Is Too Big";
        }
        //check image extension
        if(!$this->AllowImageExten($img_name)){
            $ImageErrors[]="Image Extension Not Valid Your Extension Image Must Be jpg or jpeg or png";
        }
        return $ImageErrors;        
    }	
    
    //Print Errors In Alert-Danger Div
	public function PrintInAlertDanger($error){
		echo '<div class="error alert alert-danger alert-dismissible " role="start">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">';
		echo'<span aria-hidden="true">&times;</span>';
		echo '</button>';
		echo $error; 
		echo'</div>';
	}//end function
	
	//Print Errors In Alert-Success Div
	public function PrintInAlertSuccess($success){
		echo '<div class="error alert alert-success  alert-dismissible " role="start">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-lablel="Close">';
		echo'<span aria-hidden="true">&times;</span>';
		echo '</button>';
		echo $success; 
		echo'</div>';
	}//end function
	
}//ens class
?>