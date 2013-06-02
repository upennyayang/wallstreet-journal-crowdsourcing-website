<?php
session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

include 'retrieveText.php';
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
 header("Location: index.php");
} 
$userid = $_SESSION['username'];


?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            THANKS PAGE
        </title><!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Fjord+One|Droid+Sans' rel='stylesheet' type='text/css'><!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="stylesheet" type="text/css" href="styles/settings.css"><!-- Compatibility problem -->
        <!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="styles/ie8.css" />
<![endif]-->
        <!-- IE Specific script to enable media queries -->
        <!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
        <!--Function-->

        <script type="text/javascript">
function showResult1(){
     var result="<?php echo showResult1() ?>";
  document.getElementById("result_text").innerHTML = result;
}
function showResult2(){
     var result="<?php echo showResult2() ?>";
  document.getElementById("result_text").innerHTML = result;
}
function showResult3(){

     var result="<?php echo showResult3() ?>";
  document.getElementById("result_text").innerHTML = result;
}

function confirmDelete(form){
    var cf = confirm("Are you sure to delete all the annotation results to re-rate?");
    if(cf == true){alert("You have successfully deleted all the data!"); return true;}    
    if(cf == false){return false;}
    alert(cf);
}

</script>
    </head>
    <body>

        <div id="manager_wrapper">
            <!-- LOGO -->
            <!--  <div id="logo">
               <img src="images/logo.png" alt="" />
          </div>-->
            <!-- INTRO-->
            <div class="thanks">
                <!--THE INTRODUCTION-->

                    <a href="logout.php">
                        Logout
                    </a>
                    <br><br>
                    <h1> Manager Page:</h1>

                    <h3>You can either see the annotation results, or clear all the results to re-rate.<h3>

                    <div id = "result_text" class = "queryResult"></div>


                    <br><br>

                        <!-- show button -->
                         <input class="button" type="submit" id="submit" value="Task1" onclick = "showResult1()">
                        <input class="button" type="submit" id="submit" value="Task2" onclick = "showResult2()">
                        <input class="button" type="submit" id="submit" value="Task3" onclick = "showResult3()">

                        <form class = "clears" action="processDelete.php" method="post" name = "drop3"> 
                            <input class="button" type="submit" id="submit" value="Clear T3"  onclick = "confirmDelete(document.drop3)"/>
                            <input name = "whichTask" type = "hidden" value = "Result3" >
                        </form>
                        <!-- Delete  -->
                        
                        <form class = "clears" action="processDelete.php" method="post" name = "drop2">
                            <input class="button" type="submit" id="submit" value="Clear T2"  onclick = "confirmDelete(document.drop2)"/>
                            <input name = "whichTask" type = "hidden" value = "Result2" >
                        </form>
                        <form class = "clears" action="processDelete.php" method="post" name = "drop1">
                            <input class="button" type="submit" id="submit" value="Clear T1"  onclick = "confirmDelete(document.drop1)"/>
                            <input name = "whichTask" type = "hidden" value = "Result1" >
                        </form>

    
                        <div id= "msg"></div>


                    <input name="sessioninfo" type="hidden" value="next"> <input name="uid" type="hidden" value="3">
                <!-- </form> -->
            </div><!--end of body-->
        </div><!--*** END WRAPPER ***-->
    
    </body>
</html>