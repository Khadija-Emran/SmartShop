<?php
$db=new MySQLi("localhost","root","","smartshop");
if($db->connect_error){
die("error".$db->connect_error);
}
?>