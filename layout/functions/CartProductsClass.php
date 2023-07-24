<?php
require_once('ConnectDB.php');
class CartProducts extends ConnectDB {
	//variables
	public $CartID;
	public $ProductID;
	public $ProCount;
    public $TotalQunPrice;
    
	//Functions 
	//Set Product ID
	public function setProductID($ProductID){
        $this->ProductID=$ProductID;
     }
	//Get Product ID
	public function getProductID(){
        return $this->ProductID;
    }
    //Set Cart ID
	public function setCartID($CartID){
        $this->CartID=$CartID;
     }
	//Get Cart ID
	public function getCartID(){
        return $this->CartID;
    }
     //Set Product Count
	public function setProCount($ProCount){
        $this->ProCount=$ProCount;
     }
	//Get Product Count
	public function getProCount(){
        return $this->ProCount;
    }
    
    //Set Price Of Quantity
	public function setQunPrice($TotalQunPrice){
        $this->TotalQunPrice=$TotalQunPrice;
     }
	 //Get Price Of Quantity
	public function getQunPrice(){
        return $this->TotalQunPrice;
    }
     //Work With Batabase
    //Add Product To Cart
    public function AddToCart($cartID,$ProductID,$proCount,$TotalQunPrice){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to insert product to cart            
        $insertProToCart="INSERT INTO cartproducts(CartID, ProductID, ProCount ,TotalQunPrice) VALUES ('$cartID','$ProductID','$proCount','$TotalQunPrice')";
        //execute query
		$resultProCart=mysqli_query($db,$insertProToCart);
        if($resultProCart===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $insertProToCart . "<br>" . $db->error;
        }//end else
    }//end function
   //Update Product Count In The Cart
    public function UpdateProCount($cartID,$ProductID,$proCount){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to update product count in the cart  
        $updateProCount="UPDATE cartproducts SET ProCount='".$proCount."' WHERE CartID='".$cartID."' AND ProductID='".$ProductID."'";
        //execute query
		$resultProCount=mysqli_query($db,$updateProCount);
        if($resultProCount===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $updateProCount . "<br>" . $db->error;
        }//end else
    }//end function
    //Delete Product From The Cart
    public function DelProFcart($cartID,$ProductID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to delete product from the cart  
        $delProFcart="DELETE FROM cartproducts WHERE CartID=$cartID AND ProductID=$ProductID";
        //execute query
		$resDelProFcart=mysqli_query($db,$delProFcart);
        if($resDelProFcart===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $delProFcart . "<br>" . $db->error;
        }//end else
    }//end function
    //Delete All Product From The Cart
    public function DelAllProFcart($cartID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to delete product from the cart  
        $delProFcart="DELETE FROM cartproducts WHERE CartID=$cartID";
        //execute query
		$resDelProFcart=mysqli_query($db,$delProFcart);
        if($resDelProFcart===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $delProFcart . "<br>" . $db->error;
        }//end else
    }//end function
    //Get All Product In The Cart
    public function GetAllProCart(){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to show product in the cart  
        $selectProCart="SELECT * FROM cartproducts";
        //Storing Data in Array
		$All_Row=array();
		$one_Row=array();
        //Row Number
		$row_num=0;
        //execute query
        $resSelectProCart=mysqli_query($db,$selectProCart);
        if($resSelectProCart==TRUE){
             //fetch values from product table
			 while($res=mysqli_fetch_assoc($resSelectProCart)){
				 $one_Row=null;
				 $row_num++;
				 $one_Row['CartID']=$res['CartID'];
				 $one_Row['ProductID']=$res['ProductID'];
				 $one_Row['ProCount']=$res['ProCount'];
				 $All_Row[$row_num]=$one_Row;
			 }//end while	
        }//end if
        else{
            
            echo "Error: " . $selectProCart . "<br>" . $db->error;
        }//end else
        $db->close();
		return $All_Row;
    }//end function
    
    //Check IF Product Is Exist in The Cart
	public function IsExistInCart($productID,$cartID){
        //call function to connected db from ConnectDB class
		$db=$this->connectDB();
		$select="SELECT * FROM cartproducts WHERE CartID=$cartID AND ProductID=$productID";
        $result=mysqli_query($db,$select);
		if($result==TRUE){
		 $rowcount=mysqli_num_rows($result);
		}//end if
        return $rowcount;
		$db->close();
	}//end function 
    
    //Get Cart Products 
	public function GetCartProducts($cartID){
        //call function to connected db from ConnectDB class
		$db=$this->connectDB();
        //Sorting ProductID of Products In The Cart
		$AllCartPro=array();
		$oneCartPro=array();
		//Row Number
		$select="SELECT * FROM cartproducts WHERE CartID=$cartID";
        $result=mysqli_query($db,$select);
		if($result==TRUE){
		  //fetch values from product table
			 while($res=mysqli_fetch_assoc($result)){
                 $oneCartPro=null;
				 $productID=$res['ProductID'];
                 $oneCartPro['ProductID']=$res['ProductID'];
				 $oneCartPro['ProCount']=$res['ProCount'];
                 $oneCartPro['TotalQunPrice']=$res['TotalQunPrice'];
				 $AllCartPro[$productID]=$oneCartPro;
             }//end while
		}//end if
         else{
			echo "<p>Error: " . $select . "<br>" . $db->error .'</p>';
	      }//end else
        return $AllCartPro;
		$db->close();
	}//end function
    
    
    //Delete Product From The Cart
    public function DelProductFromcarts($ProductID){
        //call function to connected db from ConnectDB class
	    $db=$this->connectDB();
        //query to delete product from the cart  
        $delProFcart="DELETE FROM `cartproducts` WHERE ProductID=$ProductID";
        //execute query
		$resDelProFcart=mysqli_query($db,$delProFcart);
        if($resDelProFcart===TRUE){
            return true;
        }//end if
        else{
            return false;
            echo "Error: " . $delProFcart . "<br>" . $db->error;
        }//end else
    }//end function
}//end class