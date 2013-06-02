<?php

include 'connectInfo.php';
session_start();

$scale = $_POST['scale'];
$comment = $_POST['comment'];
if ($comment == "Please enter comments if any*"){$comment = "";}
$userid = $_SESSION['username'];

//Insert Result
$result = mysql_query("SELECT * FROM Task3 WHERE userid=$userid AND read_this=1");
while($row = mysql_fetch_array($result))
{
	$snippetid = $row['snippetid'];
    $snippet= $row['text'];
}

$sql = "INSERT INTO Result3 VALUES ('$userid', '$snippetid', '$snippet','$scale', '$comment')
ON DUPLICATE KEY UPDATE snippetid=150";
mysql_query($sql) or die(mysql_error());



//Update "read_this" pointer to the next snippet
if ($snippetid < 31)
{
	$next = $snippetid + 1;
}

$sql = "UPDATE Task3 SET read_this=0 WHERE userid=$userid AND read_this=1";
mysql_query($sql) or die(mysql_error());
// echo "update previous!";
$sql = "UPDATE Task3 SET read_this=1 WHERE userid=$userid AND snippetid=$next";
mysql_query($sql) or die(mysql_error());
// echo "update next!";


header("Location: thanks3.php");


?>
