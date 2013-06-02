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

</style>
    <title>General Questions</title>

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Fjord+One|Droid+Sans' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
//Update the texts in the containers
  function load(){

      var text1 = "<?php getLeft($userid)?>";
      // var question = "FUCK:";
      document.getElementById("left_text").innerHTML = text1;

      var text2="<?php getRight($userid) ?>";
      // var str = "Helo";
      document.getElementById("right_text").innerHTML = text2;

  }


function check(form) {

    document.getElementById("Hint").innerHTML="";
    numChecked=0;

    for (var i = 0; i < form.elements.length; i++ ) {

        if (form.elements[i].type == 'radio') {
            if (form.elements[i].checked == true) {
            numChecked++;
            }
        }
    }
    if (numChecked == 2){
            return true;
    }
    else {

        document.getElementById("Hint").innerHTML=2-numChecked + " questions remains.You must fill them all. ";
        return false;
    }

}

function hint(){
    var msg = "<?php getPreface1($userid)?>";
    popup(msg);
}

function hint_btn(){
    var msg = "<?php getPreface1($userid)?>";
    popup_btn(msg);
}
</script>


<script type="text/javascript">

$(document).ready(function () {

    // if user clicked on button, the overlay layer or the dialogbox, close the dialog
    $('a.btn-ok, #dialog-overlay, #dialog-box').click(function () {
        $('#dialog-overlay, #dialog-box').hide();
        return false;
    });

    // if user resize the window, call the same function again
    // to make sure the overlay fills the screen and dialogbox aligned to center
    $(window).resize(function () {

        //only do it if the dialog box is not hidden
        if (!$('#dialog-box').is(':hidden')) popup();
    });


});

//Popup dialog
function popup(message) {

    // get the screen height and width
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    // calculate the values for center alignment
    var dialogTop =  (maskHeight/3) - ($('#dialog-box').height());
    var dialogLeft = (maskWidth/2) - ($('#dialog-box').width()/2);

    // assign values to the overlay and dialog box
    $('#dialog-overlay').css({height:maskHeight, width:maskWidth}).show();
    $('#dialog-box').css({top:dialogTop, left:dialogLeft}).show();

    // display the message
    $('#dialog-message').html(message);

}
//Popup triggered by buttons
function popup_btn(message) {

    // get the screen height and width
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    // calculate the values for center alignment
    var dialogTop =  (maskHeight/1.2) - ($('#dialog-box').height());
    var dialogLeft = (maskWidth/2) - ($('#dialog-box').width()/2);

    // assign values to the overlay and dialog box
    $('#dialog-overlay').css({height:maskHeight, width:maskWidth}).show();
    $('#dialog-box').css({top:dialogTop, left:dialogLeft}).show();

    // display the message
    $('#dialog-message').html(message);

}

</script>


</head>
<!-- end of head -->




<body onload="load()">

<!--*** WRAPPER ***-->
<div id="wrapper">


          <!--upper part: pairs container-->
        <h3 style="float:left;"> Read the following pair of texts and answer the questions below.</h3>
        <br><br>

        <!-- Logout -->
        <div id = "logout_ref">
            <a href="logout.php">
                <u>Logout</u>
            </a>
        </div>
        <!-- CSS3 -->
        <div id="dialog-overlay"></div>
        <div id="dialog-box">
            <div class="dialog-content">
                <div id="dialog-message"></div>
                <a href="#" class="button">Close</a>
            </div>
        </div>
        <!-- welcome -->
        <h4 id="welcomeWords2">
            Rater:
        </h4>
        <div id ="welcomeId2">
            <?php echo $_SESSION['username'] ?>
        </div>
        <!-- remaining  -->
        <div id = "remainingWords2">
            <h4>Remaining pairs to rate: </h4>
        </div>
        <div id = "remainingNo2">
            <?php getRemaining2($userid);?>
        </div>

        <br>


        <!-- lower part  -->

        <!-- articles container -->
        <div class = "articles_container" >

            <!-- PART A -->
            <div id = "left_container"style = "overflow:scroll;" >
                <div id ="left_text">
                    NO CONTENT
                </div>
            </div>
            <!-- end of PART A: left part -->

            <!-- PART A -->
            <div id = "right_container" style="overflow:scroll;">
                <div id ="right_text">
                    NO CONTENT
                </div>
            </div >
            <!-- end of PART B: right part -->

        </div>
        <!-- end of article_container -->




 <!--lower part: questions-->
<div class="questions">

<form action="processSubmit2.php" method="post" name="answer" onsubmit="return check(document.answer)">
    <input name="uid" type="hidden" value="101" />
    <input name="pos" type="hidden" value="0" />
    <input name = "sessioninfo" type = "hidden" value="step1">
    <input name = "validForm" type = "hidden" value="">


    <table id= "radios1" class = "radios2">

    <h4 id = "questionText">
        1. Rate how similar the topic of the two articles are :
    </h4>

    <tr>
        <td><input name="scale1" value="1" type="radio" onClick="enable()" id='p11'>1(not similar at all)</td>
        <td><input name="scale1" value="2" type="radio" onClick="enable()" id='p12'>2</td>
        <td><input name="scale1" value="3" type="radio" onClick="enable()" id='p13'>3</td>
        <td><input name="scale1" value="4" type="radio" onClick="enable()" id='p14'>4</td>
        <td><input name="scale1" value="5" type="radio" onClick="enable()" id='p15'>5</td>
        <td><input name="scale1" value="6" type="radio" onClick="enable()" id='p16'>6</td>
        <td><input name="scale1" value="7" type="radio" onClick="enable()" id='p17'>7</td>
        <td><input name="scale1" value="8" type="radio" onClick="enable()" id='p18'>8</td>
        <td><input name="scale1" value="9" type="radio" onClick="enable()" id='p19'>9</td>
        <td><input name="scale1" value="10" type="radio" onClick="enable()" id='p110'>10(very simiar)</td>
    </tr>
    </table>
    <br>

    <table id="radios2" class = "radios2">
    <h4>2. Which article did you find more interesting ? </h4>

      <tr>
          <td><input name="scale2" value="A++" type="radio" onClick="enable()" id='p11'>A is way more interesting</td>
          <td><input name="scale2" value="A+" type="radio" onClick="enable()" id='p12'>A is more interesting</td>
          <td><input name="scale2" value="A=B" type="radio" onClick="enable()" id='p13'>I don't have a preference</td>
          <td><input name="scale2" value="B+" type="radio" onClick="enable()" id='p14'>B is more interesting</td>
          <td><input name="scale2" value="B++" type="radio" onClick="enable()" id='p15'>B is way more interesting</td>
      </tr>
    </table>
    <br>
    <!--end of table-->

    <!-- comments -->
    <textarea name="comment" cols="60" rows="2" class="textarea" id="comment"
              onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue">Please enter comments if any*</textarea>

    <!-- submit button -->
    <input class="submit" name="SUBMIT" type="submit" value="Submit"   id="SUBMIT" onclick="check(document.answer)"/>

    <p id="Hint"></p>

</form>
<!--end of form-->



</div>
<!--end of leads/questions-->

</div>
<!-- end wrapper -->

</body>

</html>