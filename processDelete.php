<?php

include 'connectInfo.php';
session_start();
$userid = $_SESSION['username'];
$taskToDrop = $_POST['whichTask'];

mysql_query("DELETE FROM $taskToDrop") or die(mysql_error());

// Delete all the data
// Reset the pointer to the head
switch($taskToDrop){
	case "Result1":
		mysql_query("UPDATE Task1 SET read_this=0 WHERE read_this=1") or die(mysql_error());
		mysql_query("UPDATE Task1 SET read_this=1 WHERE snippetid=1") or die(mysql_error());
		// echo "1";
		break;
	case "Result2":
		mysql_query("UPDATE Task2 SET read_this=0 WHERE read_this=1") or die(mysql_error());
		mysql_query("UPDATE Task2 SET read_this=1 WHERE pairid=1") or die(mysql_error());
		// echo "2";
		break;
	case "Result3":
		mysql_query("UPDATE Task3 SET read_this=0 WHERE read_this=1") or die(mysql_error());
		mysql_query("UPDATE Task3 SET read_this=1 WHERE snippetid=1") or die(mysql_error());
		// echo "3";
		break;
}

header("Location: manager.php");


?>
