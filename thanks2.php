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
function validate1(value)
        {
        if (value == "")
        {
        document.textform.submit.disabled = true
        return false
        }
        var reg = /^(0|[1-9][0-9]*)$/;
        if (reg.test(value) == false)
        {
        alert("Please enter number only.");
        document.textform.submit.disabled = true
        return false;
        }
        else document.textform.submit.disabled = false
        }
        </script>
    </head>
    <body>

        <div id="last_wrapper">
            <!-- LOGO -->
            <!--  <div id="logo">
               <img src="images/logo.png" alt="" />
          </div>-->
            <!-- INTRO-->
            <div class="thanks">
                <!--THE INTRODUCTION-->
                <form method="post" action="task2.php" name="textform" id="login">

                    <a href="logout.php">
                        Logout
                    </a>

                    <h1>
                        Thank You
                    </h1><!--<input name="field" type="text" />
        <input type="submit" value="Submit" />-->
                    <h3>You have successfully submitted your answer <br><br>Press NEXT button to continue
                      <h3>
                    <fieldset class="actions">
                        <input class="button" type="submit" id="submit" value="NEXT">
                    </fieldset><input name="sessioninfo" type="hidden" value="next"> <input name="uid" type="hidden" value="3">
                </form>
            </div><!--end of body-->
        </div><!--*** END WRAPPER ***-->
    
    </body>
</html>