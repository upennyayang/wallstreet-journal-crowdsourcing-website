<?php
session_start();

//USERS["username"] = "password";

// Administrators
$USERS0["Ani"] = "Ani";
$USERS0["Annie"] = "Annie";
$USERS0["Yayang"] = "Yayang";
$USERS0["Tao"] = "Tao";

// Task1
$USERS1["101"] = "nlp";
$USERS1["102"] = "nlp";
$USERS1["103"] = "nlp";
$USERS1["104"] = "nlp";
$USERS1["105"] = "nlp";
$USERS1["106"] = "nlp";
$USERS1["107"] = "nlp";

//Task2
$USERS2["201"] = "nlp";
$USERS2["202"] = "nlp";
$USERS2["203"] = "nlp";
$USERS2["204"] = "nlp";
$USERS2["205"] = "nlp";

//Task3
$USERS3["301"] = "nlp";
$USERS3["302"] = "nlp";
$USERS3["303"] = "nlp";
$USERS3["304"] = "nlp";
$USERS3["305"] = "nlp";
$USERS3["306"] = "nlp";
$USERS3["307"] = "nlp";

$usr = $_REQUEST['username'];
$pwd = $_REQUEST['password'];
$wrongMsg=  "Invalid Username or password!";


if(empty($usr) && empty($pwd)){
	$wrongMsg=  "";
}
if(array_key_exists($usr, $USERS0)){
	if(!in_array($pwd, $USERS0)){
		$_SESSION['msg'] = $wrongMsg;
		header("Location: index.php");
	}
	else{
		// Username and Password both match
		$_SESSION['username'] = $usr;
	 	$_SESSION['password'] = $pwd;
		header("Location: manager.php");
	}
}
else if(array_key_exists($usr, $USERS1)){
	if(!in_array($pwd, $USERS1)){
		$_SESSION['msg'] = $wrongMsg;
		header("Location: index.php");
	}
	else{
		// Username and Password both match
		$_SESSION['username'] = $usr;
	 	$_SESSION['password'] = $pwd;
	 	$_SESSION['task'] = "Task1.php";
		header("Location: preface1.php");
	}
}
else if(array_key_exists($usr, $USERS2)){
	if(!in_array($pwd, $USERS2)){
		$_SESSION['msg'] = $wrongMsg;
		header("Location: index.php");
	}
	else{
		// Username and Password both match
		$_SESSION['username'] = $usr;
	 	$_SESSION['password'] = $pwd;
		header("Location: task2.php");
	}
}

else if(array_key_exists($usr, $USERS3)){
	if(!in_array($pwd, $USERS3)){
		$_SESSION['msg'] = $wrongMsg;
		header("Location: index.php");
	}
	else{
		// Username and Password both match
		$_SESSION['username'] = $usr;
	 	$_SESSION['password'] = $pwd;
	 	$_SESSION['task'] = "Task3.php";
		header("Location: preface3.php");
	}
}

else{
	$_SESSION['msg'] = $wrongMsg;
	header("Location: index.php");
}

?>
