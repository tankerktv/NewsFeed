<?php
	error_reporting(0);
	$newvar = $_POST['newvar'];
	echo $newvar;			
	$host="localhost";
	$user="root";
	$pass="ZasadaKTV3350";
	$db_name="sashabase";
	$link=mysql_connect($host,$user,$pass);
	mysql_select_db($db_name,$link);
	$sql = mysql_query("DELETE FROM `news` WHERE `ID`='$newvar'");
?>