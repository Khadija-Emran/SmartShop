<?php
class ConnectDB{
	public $localhost="localhost";
	public $root="root";
	public $password="";
	public $DBname="smartshop";
	
	//functions 
	//Set localhost Name
	public function setlocalhost($localhost){
        $this->localhost=$localhost;
     }
	//Get localhost Name
	public function getlocalhost(){
        return $localhost;
    }
	//Set Root
    public function setRoot($root){
        $this->root=$root;
     }
	//Get Root
     public function getRoot(){
        return $root;
    }
    //Set Password
     public function setPassword($password){
        $this->password=$password;
     }
	//Get Password
	public function getPassword(){
        return $password;
    }
	//Set DBname
     public function setDBname($DBname){
        $this->DBname=$DBname;
     }
	//Get DBname
	public function getDBname(){
        return $DBname;
    }
	//Check Connect With DB
    public function connectDB(){
		$db=new MySQLi($this->localhost,$this->root,$this->password,$this->DBname);
		if($db->connect_error){
		die("error".$db->connect_error);
		}//end if
		return $db;
	}//end function
	
}//end class
?>