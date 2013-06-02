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
      // hint();
      var str="<?php getText3($userid) ?>";
      // var str = "Helo";
      document.getElementById("lead").innerHTML = str;
      var question = "<?php getQuestion3($userid)?>";
      // var question = "FUCK:";
      document.getElementById("questionText").innerHTML = question;
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
    if (numChecked == 1){
            return true;
    }
    else {

        document.getElementById("Hint").innerHTML=1-numChecked + " questions remains.You must fill them all. ";
        return false;
    }

}

function hint(){
    var msg = "<?php getPreface3($userid)?>";
    popup(msg);
}

function hint_btn(){
    var msg = "<?php getPreface3($userid)?>";
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



          <!--upper part: leads container-->
          <h3 style="float:left;"> Read the following text and answer the questions below</h3><br>

         <div id = "logout_ref1">
            <a href="logout.php">
                <u>Logout</u>
            </a>
         </div>

          <!-- Instruction -->
        <div id = "instruction">
            <a href="javascript:hint_btn()">
                <u>Instruction*</u>
            </a>
        </div>
        <div id="dialog-overlay"></div>
        <div id="dialog-box">
            <div class="dialog-content">
                <div id="dialog-message"></div>
                <a href="#" class="button">Close</a>
                </div>
        </div>
        <!-- welcome -->
        <h4 id="welcomeWords1">Rater: </h4>
        <div id ="welcomeId1"> <?php echo $_SESSION['username'] ?> </div>
        <!-- remaining  -->
        <div id = "remainingWords1">
        <h4>Remaining snippets to rate: </h4>
        </div>
        <img class="paperclip" src="images/paperclip.png" alt="paperclip" />
         <div id = "remainingNo1"><?php getRemaining3($userid);?></div><br>


        <!-- lower part  -->
        <div id = "lead" class="leads_container" >
    In past years, the scientists usually enjoyed at least the illusion of being on a solid surface, with their man-made hole being the only open water for more than a thousand yards around.
<br><br>
    This time, said James Johnson, a University of Washington engineer who helped design the instrument chains, they were essentially camped on an ice raft not much larger than a football field that was surrounded by patches of black, steaming water. As the days passed, the ice beneath them became progressively laced with disconcerting cracks, Mr. Johnson said.
<br><br>
    Independent sea ice experts at the National Snow and Ice Data Center in Boulder, Colo., said the weaker ice, the fog and the open water seen by the team at the North Pole were consistent with their latest measurements of the overall conditions on the Arctic Ocean. They have measured big retreats in the floating ice in recent summers, including a modern record in 2005, and the ice did not rebuild in recent months as it usually does in the deep freeze and long nights of the Arctic winter, said Mark C. Serreze, a senior scientist at the center.
<br><br>
</h4>
</div>
<!--end of leads_container-->



 <!--lower part: questions-->
<div class="questions">

<form action="processSubmit3.php" method="post" name="answer" onsubmit="return check(document.answer)">
    <input name="uid" type="hidden" value="101" />
    <input name="pos" type="hidden" value="0" />
    <input name = "sessioninfo" type = "hidden" value="step1">
    <input name = "validForm" type = "hidden" value="">
    <table id="radios">

    <h3 id = "questionText">
    No question for this.
    <h3>

    <p>
    <tr>
        <td><input name="scale" value="1" type="radio" onClick="enable()" id='p15'>1(no presence of aspect)</td>
        <td><input name="scale" value="2" type="radio" onClick="enable()" id='p14'>2</td>
        <td><input name="scale" value="3" type="radio" onClick="enable()" id='p13'>3</td>
        <td><input name="scale" value="4" type="radio" onClick="enable()" id='p12'>4</td>
        <td><input name="scale" value="5" type="radio" onClick="enable()" id='p11'>5</td>
        <td><input name="scale" value="6" type="radio" onClick="enable()" id='p10'>6</td>
        <td><input name="scale" value="7" type="radio" onClick="enable()" id='p9'>7</td>
        <td><input name="scale" value="8" type="radio" onClick="enable()" id='p8'>8</td>
        <td><input name="scale" value="9" type="radio" onClick="enable()" id='p7'>9</td>
        <td><input name="scale" value="10" type="radio" onClick="enable()" id='p6'>10(very high degree)</td>
    </tr>


    </table>
    <!--end of table--><br>

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