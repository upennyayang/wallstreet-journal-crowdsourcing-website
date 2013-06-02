<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>

<title>LOGIN</title>
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Fjord+One|Droid+Sans' rel='stylesheet' type='text/css'>

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<link rel="stylesheet" type="text/css" href="styles/settings.css" />
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="styles/ie8.css" />
<![endif]-->

<!-- IE Specific script to enable media queries -->
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<!-- Javascript files -->


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

    msg = "<?php echo $_SESSION['msg'] ?>";

        document.getElementById("hint").innerHTML = msg;


}


</script>


</head>

<body onload="load()">



          
      <!-- INTRO-->
      <div id="intro">                           
              <!--THE INTRODUCTION-->	      
              
<div id="login">

	<form name="login-form" class="login-form" action="checkuser.php" method="post">
	
		<div class="header">
		<h1>Login In</h1>
		<span>Penn Annotation Tasks</span>
		</div>
	    
	    <!-- hint -->

		<div class="content">
		<input name="username" type="text" class="input username" placeholder="Username" />
		<div class="user-icon"></div>
		<input name="password" type="password" class="input password" placeholder="Password" />
		<div class="pass-icon"></div>		
		</div>

         <!-- submit button -->
		<div class="footer">
		<input type="submit" name="submit" value="Start" class="button" />
		</div>

 	 	<!-- hint -->
	    <div id="hint" class = "hint"></div>

	</form>
		 
</div>
<div class="gradient"></div>



          </div>
          

     
</div>

<!--*** END WRAPPER ***-->
<script type="text/javascript"> Cufon.now(); </script>
</body>

</html>
