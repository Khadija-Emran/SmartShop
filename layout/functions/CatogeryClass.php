
<?php
require_once('ConnectDB.php');
class Category extends ConnectDB {
    //variables
	public $categoryID;
	public $categName;
	public $categDes;
	public $photo;

	//Functions Set And Get
	//Set CategoryID 
	public function setCatogeryID($categoryID){
        $this->categoryID=$categoryID;
     }
	//Get CategoryID 
	public function getCatogeryID(){
        return $this->categoryID;
    }
    //Set category Name 
	public function setCatogName($categName){
        $this->categName=$categName;
     }
	//Get category Name 
	public function getCatogName(){
        return $this->categName;
    }
    //Set category Description
	public function setCatogDes($categDes){
        $this->categDes=$categDes;
     }
	//Get category Description
	public function getCatogDes(){
        return $this->categDes;
    }
    //Set Category Photo
	public function setCatoPhoto($photo){
        $this->photo=$photo;
     }
	//Get Category Photo
	public function getCatoPhoto(){
        return $this->photo;
    }
    //Functions
    //Work With Database
    //Get All Row of Category Data 
    public function GetAllCategory(){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		//Storing Data in Array
		$All_Row=array();
		// query for get category data 
		$query_select = " SELECT CategoryID FROM category ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from category table
			 while($res=mysqli_fetch_assoc($result)){
                 $categoryID=$res['CategoryID'];
				 $All_Row[$categoryID]=$categoryID;
			 }//end while	
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $All_Row;
        }//end function
    
    //Count Row Of Category In DB
    public function GetCategoryCount(){
		//Call Function to Connected db From ConnectDB Class
	   $db=$this->connectDB();
		// query for get category data 
		$query_select = " SELECT CategoryID FROM category ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from category table
			 $countRow=0;
			 while($res=mysqli_fetch_assoc($result)){
				$countRow++; 
			 }//end while		 
			}//end if 
		 else{
			echo "<p class='text-light'>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $countRow;
        }//end function
    
    //Get Catogery Data Via ID
    public function GetCatogeryData($categoryID){
		//Call Function to Connected db From ConnectDB Class
	    $db=$this->connectDB();
	    //Array To Store Fetched Data
		$categoryArray=array();
		// query for get product data 
		$query_select = "SELECT * FROM category WHERE CategoryID = $categoryID ";	
		$result=mysqli_query($db,$query_select);
		 if($result==TRUE){
			 //fetch values from product table
			 $res=mysqli_fetch_assoc($result);			 
		     $categoryArray['CategoryID']=$res['CategoryID'];
			 $categoryArray['CategName']=$res['CategName'];
			 $categoryArray['CategDes']=$res['CategDes'];
		     $categoryArray['Photo']=$res['Photo'];
			}//end if 
		 else{
			echo "<p>Error: " . $query_select . "<br>" . $db->error .'</p>';
	      }//end else
		$db->close();
		return $categoryArray;
        }//end function
    
    //Add Store Data To DataBase
    public function AddCategory($categoryName,$categoryDes,$categoryPhoto){ 
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
		// query for category table to insert user
	    $insert="INSERT INTO category (CategName , CategDes , Photo ) VALUES ('$categoryName','$categoryDes','$categoryPhoto')";
		$result=mysqli_query($db,$insert);
			 if($result===TRUE){
				  //get id
				 $categoryD= mysqli_insert_id($db);
				 return true;
				 }//end if
              else{
				echo "Error: " . $insert . "<br>" . $db->error;
                  
				 return false;
		  }//end else
		$db->close();
    }//end function
    
     //Delete category 
    public function DeleteCategory($categoryID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to delete category
        $delete="DELETE FROM category WHERE CategoryID=$categoryID";
        //execute query
		$resDelete=mysqli_query($db,$delete);
        if($resDelete===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $delete . "<br>" . $db->error;
        }//end else
    }//end function
    
    //Update Category
    public function UpdateCategory($categoryID,$categoryName,$categoryDes,$categoryPhoto){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to update cart info  
        $update="UPDATE category SET CategName ='".$categoryName."', CategDes = '".$categoryDes."' , Photo ='".$categoryPhoto."'  WHERE CategoryID ='".$categoryID."'";	

        //execute query
		$result=mysqli_query($db,$update);
        if($result===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $update . "<br>" . $db->error;
        }//end else
    }//end function
    
    //End Work With Database
    
}//End Class