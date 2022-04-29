<?php
	$servername='localhost';
	$username='root';
	$password='';
	$dbname = "admins_database";
	$conn = mysqli_connect($servername,$username,$password,"$dbname");
	  if(!$conn){
		  die('Could not Connect MySql Server:');
		}
?>