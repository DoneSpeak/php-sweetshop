<?php 
	$hostname = "localhost"; //主机名,可以用IP代替
	$database = "db_dessert_restaurant"; //数据库名
	$username = "root"; //数据库用户名
	$password = "GR0923"; //数据库密码
	$conn = mysqli_connect($hostname, $username, $password) or trigger_error(mysql_error() , E_USER_ERROR); 
	
	$db = @mysqli_select_db($conn,$database) or die(mysql_error());
	mysqli_query($conn,"SET names utf8");
?>