<?php
	error_reporting(0);
	$host="localhost";
	$user="root";
	$pass="ZasadaKTV3350";
	$db_name="sashabase";
	$link=mysql_connect($host,$user,$pass);
	mysql_select_db($db_name,$link);
	$_POST['Date'] = date("Y-m-d H:i:s");
	$_POST['Pic'] = "none";
	if ($_POST['User'] == null){$_POST['User'] = "Anonymous";};
	if (isset($_POST["Heading"],$_POST["Content"])) {
	$sql = mysql_query("INSERT INTO `news` (`Date`, `User`, `Content`, `Heading`, `Pic`) 
						VALUES ('".$_POST['Date']."','".$_POST['User']."','".$_POST['Content']."','".$_POST['Heading']."','".$_POST['Pic']."')
						");
}
?>