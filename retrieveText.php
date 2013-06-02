<?php
include 'connectInfo.php';



// -----------------Get the Snippets----------------------------------//
//Task1: update the snippet interface
function getText1($userid)
{
        //Get filename
        $result = mysql_query("SELECT * FROM Task1 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $leadFilename= $row['text'];
        }

        $path = "dataset/task1/".$leadFilename;
        echo "(FileName:  " . $leadFilename . ")<br><br>";
         $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);

        foreach($rows as $row => $data)
        {
             echo $data. '<br /><br />';
        }

}


//Task3: update the snippet interface
function getText3($userid)
{
        //Get filename
        $result = mysql_query("SELECT * FROM Task3 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $leadFilename= $row['text'];
        }

        $path = "dataset/task1/".$leadFilename;
        echo "(FileName:  " . $leadFilename . ")<br><br>";
         $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);

        foreach($rows as $row => $data)
        {
             echo $data. '<br /><br />';
        }

}


//Task1: update the snippet interface
function getTextTest($userid, $snippetid)
{
        //Get filename
        $result = mysql_query("SELECT * FROM Task1 WHERE userid=$userid AND snippetid=$snippetid");
        while($row = mysql_fetch_array($result))
        {
          $leadFilename= $row['text'];
        }

        $path = "dataset/task1/".$leadFilename;
        echo "(FileName:  " . $leadFilename . ")<br><br>";
         $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);

        foreach($rows as $row => $data)
        {
             echo $data. '<br /><br />';
        }

}

//Task2: update the left interface
function getLeft($userid)
{
        echo '<h2>A:</h2>';
        //Get filename
        //$result = mysql_query("SELECT * FROM Task2 WHERE userid ='$userid'");
        $result = mysql_query("SELECT * FROM Task2 WHERE userid=$userid AND read_this=1");

        while($row = mysql_fetch_array($result))
        {
          $leftFile= $row['text1'];
        }
        // echo $leftFile;
        $path = "dataset/task2/".$leftFile;
         // echo $path;
        $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);

        foreach($rows as $row => $data)
        {
            echo $data. '<br /><br />';
        }

}


//Task2: update the right interface
function getRight($userid)
{
        echo '<h2>B:</h2>';
        //Get filename
        //$result = mysql_query("SELECT * FROM Task2 WHERE userid ='$userid'");
        $result = mysql_query("SELECT * FROM Task2 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $leftFile= $row['text2'];
        }

        $path = "dataset/task2/".$leftFile;
        $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);
        //array_shift($rows);

        foreach($rows as $row => $data)
        {
            echo $data. '<br /><br />';
        }

}

// -----------------Get the # of Remainings---------------------------//

//Task1: get the remaining snippet ID
function getRemaining1($userid){
      //Get filename

        $result = mysql_query("SELECT * FROM Task1 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $remaining = 150 + 1 - $row['snippetid'];
          echo $remaining;
        }

}

//Task2: get the remaining snippet pair ID
function getRemaining2($userid){
      //Get filename

        $result = mysql_query("SELECT * FROM Task2 WHERE userid=$userid AND read_this=1");

        while($row = mysql_fetch_array($result))
        {

          $remaining = 50 + 1 - $row['pairid'];
          echo $remaining;
        }
}


//Task3: get the remaining snippet ID
function getRemaining3($userid){
      //Get filename

        $result = mysql_query("SELECT * FROM Task3 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $remaining = 30 + 1 - $row['snippetid'];
          echo $remaining;
        }

}



// -----------------Get the Prefaces----------------------------------//

function getPreface1($userid)
{
        echo "<h2>Welcome! Please read the instruction below carefully:" . '</h2><br />';

        //Get filename
        $result = mysql_query("SELECT * FROM Task1 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $uid= $row['userid'];
        }

        switch($uid){
            case 101:  $prefaceText = "PrefacePolar.txt";  break;
            case 102:  $prefaceText = "PrefaceNegSent.txt";  break;
            case 103:  $prefaceText = "PrefaceAnimacy.txt";  break;
            case 104:  $prefaceText = "PrefaceNarrative.txt";  break;
            case 105:  $prefaceText = "PrefaceResearch.txt";  break;
            case 106:  $prefaceText = "PrefaceVisual.txt";  break;
            case 107:  $prefaceText = "PrefaceInterest.txt";  break;
        }

        $path = "dataset/task1/prefaceTexts/".$prefaceText;
        // echo "(FileName:  " . $prefaceText . ")<br><br>";
        $txt_file    = file_get_contents($path);

         $rows        = explode("\n", $txt_file);
        foreach($rows as $row => $data)
        {
              echo $data. '<br />';
        }

}


// function getPreface2($userid)
// {
//         echo "<h2>Welcome! Please read the questions below carefully.<br> You will rate 50 pairs in total" . '</h2><br />';
// }

function getPreface3($userid)
{
        echo "<h2>Welcome! Please read the instruction below carefully:" . '</h2><br />';

        //Get filename
        $result = mysql_query("SELECT * FROM Task3 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $uid= $row['userid'];
        }

        switch($uid){
            case 301:  $prefaceText = "PrefacePolar.txt";  break;
            case 302:  $prefaceText = "PrefaceNegSent.txt";  break;
            case 303:  $prefaceText = "PrefaceAnimacy.txt";  break;
            case 304:  $prefaceText = "PrefaceNarrative.txt";  break;
            case 305:  $prefaceText = "PrefaceResearch.txt";  break;
            case 306:  $prefaceText = "PrefaceVisual.txt";  break;
            case 307:  $prefaceText = "PrefaceInterest.txt";  break;
        }

        $path = "dataset/task1/prefaceTexts/".$prefaceText;
        // echo "(FileName:  " . $prefaceText . ")<br><br>";
        $txt_file    = file_get_contents($path);

         $rows        = explode("\n", $txt_file);
        foreach($rows as $row => $data)
        {
              echo $data. '<br />';
        }

}


// -----------------Get the Questions---------------------------------//
function getQuestion1($userid)
{
        //Get filename
        $result = mysql_query("SELECT * FROM Task1 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $uid= $row['userid'];
        }
        switch($uid){
            case 101:  $questionFile = "QuestionPolar.txt";  break;
            case 102:  $questionFile = "QuestionNegSent.txt";  break;
            case 103:  $questionFile = "QuestionAnimacy.txt";  break;
            case 104:  $questionFile = "QuestionNarrative.txt";  break;
            case 105:  $questionFile = "QuestionResearch.txt";  break;
            case 106:  $questionFile = "QuestionVisual.txt";  break;
            case 107:  $questionFile = "QuestionInterest.txt";  break;
        }

        $path = "dataset/task1/questionTexts/".$questionFile;
        // echo "(FileName:  " . $questionFile . ")<br><br>";
        $txt_file    = file_get_contents($path);

         $rows        = explode("\n", $txt_file);
        foreach($rows as $row => $data)
        {
             echo $data. '<br /><br />';
        }

}


function getQuestion3($userid)
{
        switch($userid){
            case 301:  $questionFile = "QuestionPolar.txt";  break;
            case 302:  $questionFile = "QuestionNegSent.txt";  break;
            case 303:  $questionFile = "QuestionAnimacy.txt";  break;
            case 304:  $questionFile = "QuestionNarrative.txt";  break;
            case 305:  $questionFile = "QuestionResearch.txt";  break;
            case 306:  $questionFile = "QuestionVisual.txt";  break;
            case 307:  $questionFile = "QuestionInterest.txt";  break;
        }

        $path = "dataset/task1/questionTexts/".$questionFile;
        // echo "(FileName:  " . $questionFile . ")<br><br>";
        $txt_file    = file_get_contents($path);

         $rows        = explode("\n", $txt_file);
        foreach($rows as $row => $data)
        {
             echo $data. '<br /><br />';
        }

}

// -----------------Show Results in manager.php-----------------------//
//Manager
function showResult1()
{
    echo "<strong>Result of Task1:</strong> rating 1~10 means 'no presence of aspect' to 'very high degree'<br>";
    echo "<table><tr> <td>user_id</td> <td>snippet_id</td>  <td>snippet_filename</td>  <td>rating</td>  <td>comment</td>  </tr>";
    $result = mysql_query("SELECT * FROM Result1");
    while($row = mysql_fetch_array($result))
    {

      echo "<tr>" .
           "<td>" . $row['userid'] . "</td>" .
           "<td>" . $row['snippetid']. "</td>" .
           "<td>" . $row['snippetFile']. "</td>" .
           "<td>" . $row['rating'] . "</td>".
           "<td>" . $row['comment'] . "</td>".
           "</tr>";
    }
    echo "</table>";
}

function showResult2()
{
    echo "<strong>Result of Task2:</strong> <br><strong>[rating_similar]</strong> 1~10 means 'no similar at all' to 'extremely simiar';  ";
    echo "<strong><br>[rating_interesting]</strong> A++: 'A is way more interesting', A+: 'A is more interesting'";
    echo ",  A=B: no preference, and etc.<br><br>";
    echo "<table><tr> <td>user_id</td> <td>pair_id</td>  <td>pair_filename1</td> <td>pair_filename2</td>"
    . "<td>rating_similar</td> <td>rating_interesting</td>  <td>comment</td>  </tr>";
    $result = mysql_query("SELECT * FROM Result2");
    if ($result == FALSE){
      die(mysql_error());
    }
    while($row = mysql_fetch_array($result))
    {

      echo "<tr>" .
           "<td>" . $row['userid'] . "</td>" .
           "<td>" . $row['pairid']. "</td>" .
           "<td>" . $row['pairFile1']. "</td>" .
           "<td>" . $row['pairFile2']. "</td>" .
           "<td>" . $row['rating_similar'] . "</td>".
           "<td>" . $row['rating_interesting'] . "</td>".
           "<td>" . $row['comment'] . "</td>".
           "</tr>";
    }
    echo "</table>";
}

function showResult3()
{
    echo "<strong>Result of Task3:</strong> rating 1~10 means 'no presence of aspect' to 'very high degree'<br>";
    echo "<table><tr> <td>user_id</td> <td>snippet_id</td>  <td>snippet_filename</td>  <td>rating</td>  <td>comment</td>  </tr>";
    $result = mysql_query("SELECT * FROM Result3");
    while($row = mysql_fetch_array($result))
    {

      echo "<tr>" .
           "<td>" . $row['userid'] . "</td>" .
           "<td>" . $row['snippetid']. "</td>" .
           "<td>" . $row['snippetFile']. "</td>" .
           "<td>" . $row['rating'] . "</td>".
           "<td>" . $row['comment'] . "</td>".
           "</tr>";
    }
    echo "</table>";
}






?>

