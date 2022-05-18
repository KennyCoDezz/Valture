<?php
	$servername='localhost';
	$username='root';
	$password='';
	$dbname = "data";
	$conn_user = mysqli_connect($servername,$username,$password,"$dbname");
	  if(!$conn_user){
		  die('Could not Connect MySql Server:');
		}
?>