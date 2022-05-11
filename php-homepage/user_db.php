<?php
	$servername='localhost';
	$username='root';
	$password='';
	$dbname = "data";
	$conn_users = mysqli_connect($servername,$username,$password,"$dbname");
	  if(!$conn_users){
		  die('Could not Connect MySql Server:');
		}
?>