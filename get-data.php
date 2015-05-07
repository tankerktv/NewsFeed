<?php

$link = mysql_connect('localhost', 'highvoltage', 'ZasadaKTV3350');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("sashabase") or die("cannot connect to the database" . mysql_error());

$data = mysql_query("SELECT id, date, user, heading, content, pic FROM news ORDER BY news.id DESC")  or die(mysql_error());
$info = mysql_fetch_array( $data );

$infoarray = array('id','date','user','heading','content','pic');
$totalarray = array('');

	$infoarray[0] = $info['id'];
	$infoarray[1] = $info['date'];
	$infoarray[2] = $info['user'];
	$infoarray[3] = $info['heading'];
	$infoarray[4] = $info['content'];
	$infoarray[5] = $info['pic'];
	array_push($totalarray,$infoarray[0]);
	array_push($totalarray,$infoarray[1]);
	array_push($totalarray,$infoarray[2]);
	array_push($totalarray,$infoarray[3]);
	array_push($totalarray,$infoarray[4]);
	array_push($totalarray,$infoarray[5]);

while ($info = mysql_fetch_array( $data ))
{  
	foreach ($infoarray as $i => $value) {
    unset($infoarray[$i]);}
	$infoarray[0] = $info['id'];
	$infoarray[1] = $info['date'];
	$infoarray[2] = $info['user'];
	$infoarray[3] = $info['heading'];
	$infoarray[4] = $info['content'];
	$infoarray[5] = $info['pic'];
	array_push($totalarray,$infoarray[0]);
	array_push($totalarray,$infoarray[1]);
	array_push($totalarray,$infoarray[2]);
	array_push($totalarray,$infoarray[3]);
	array_push($totalarray,$infoarray[4]);
	array_push($totalarray,$infoarray[5]);
}

echo json_encode($totalarray);

mysql_close($link);
?>