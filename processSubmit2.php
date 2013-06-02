<?php

include 'connectInfo.php';

session_start();

$scale1 = $_POST['scale1'];
$scale2 = $_POST['scale2'];
$comment = $_POST['comment'];
if ($comment == "Please enter comments if any*"){$comment = "";}
$userid = $_SESSION['username'];

//Insert Result
$result = mysql_query("SELECT * FROM Task2 WHERE userid=$userid AND read_this=1");
if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
while($row = mysql_fetch_array($result))
{
	$pairid = $row['pairid'];
    $pairFile1= $row['text1'];
    $pairFile2= $row['text2'];
}

// echo $userid ."<br> ".$pairid. "<br> ". $pairFile1."<br> ".$pairFile2 . "<br> ".$scale1 .  "<br> ".$scale2 ."<br> ". $comment;
$sql = "INSERT INTO Result2 VALUES ('$userid', '$pairid', '$pairFile1', '$pairFile2','$scale1', '$scale2', '$comment')
ON DUPLICATE KEY UPDATE pairid=50";
mysql_query($sql) or die(mysql_error());



// Update "read_this" pointer to the next pair
if ($pairid < 50)
{
	$next = $pairid + 1;
}

$sql = "UPDATE Task2 SET read_this=0 WHERE userid=$userid AND read_this=1";
mysql_query($sql) or die(mysql_error());
// echo "update previous!";
$sql = "UPDATE Task2 SET read_this=1 WHERE userid=$userid AND pairid=$next";
mysql_query($sql) or die(mysql_error());
// echo "update next!";


header("Location: thanks2.php");


?>
