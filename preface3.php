<?php
session_start();
include 'retrieveText.php';
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
 header("Location: index.php");
} 
$userid = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>

<head>

<title>WEB ANNOTATOR</title>
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Fjord+One|Droid+Sans' rel='stylesheet' type='text/css'>

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="styles/style.css" />

<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="styles/ie8.css" />
<![endif]-->

<!-- IE Specific script to enable media queries -->
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<!--Function-->
<script language="JavaScript">
function tag(field)
{       
        var sel = document.getSelection()
    var selection = String(sel)
    //alert("You have highlighted:  "+ selection)
        var myField=document.getElementById(field);
    if(myField.value=='')
        myField.value=selection;
    else
        myField.value=myField.value+"; "+selection;
}

function highlight(container,what,spanClass) {
    var content = container.innerHTML,
        pattern = new RegExp('(>[^<.]*)(' + what + ')([^<.]*)','g'),
        replaceWith = '$1<span ' + ( spanClass ? 'class="' + spanClass + '"' : '' ) + '">$2</span>$3',
        highlighted = content.replace(pattern,replaceWith);
    return (container.innerHTML = highlighted) !== content;
}

function load(){
    var msg = "<?php getPreface3($userid)?>";
    document.getElementById("intro").innerHTML = msg;
}
</script>


</head>

<body onload = "load()">


<div id="first_wrapper">

          <!-- LOGO -->
        <!--  <div id="logo">
               <img src="images/logo.png" alt="" />
          </div>-->
          
          <!-- INTRO-->
          <div id="intro"  class="intro">                           
              <!--THE INTRODUCTION-->         
              <h2> <br><br>VISUAL NATURE: The text reads like seeing a picture</h2>
<br><br>      

The following texts have different degrees of visual nature. Rate them based on degree of visual content. 

<br><br>Visual texts have descriptions that make its readers spontaneously imagine the scene the author is describing. The visual effect can arise from the topic or words. For example, the mention of a beach is likely to invoke images in the minds of a reader. The visual element can also be related to actions. For example, the sentence "As she looked out of the window, she saw her neighbor's cat playing." can be said to have a strong visual nature. An example of a text with very low visual content would be an article that mostly talks about stock prices. Try to differentiate texts that have high visual content and those which have little or no visual effects. 

          </div>
          
          <br>
          <br>
          <!-- SlideTo button-->
          <a class = "button" href="task3.php" class="scroll_down">OK</a>
     
</div>

<!--*** END WRAPPER ***-->
<script type="text/javascript"> Cufon.now(); </script>
</body>

</html>
