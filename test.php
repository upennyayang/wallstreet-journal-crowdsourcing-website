<?php
include 'connectInfo.php';

// $result = mysql_query("SELECT * FROM Task2");
// while($row = mysql_fetch_array($result))
// {
//   echo $row['userid'] . " " . $row['pairid']. "  " . $row['text1']. $row['text2'];
//   echo "<br />";
// }
// mysql_free_result($result);

// //$sql = "INSERT INTO Task2 VALUES (201, 1, 'text2','text3')";
// //mysql_query($sql) or die(mysql_error());

// fclose($handle);
// mysql_close($con);

function getLeft($userid)
{

    echo "hello";

        //Get filename
        //$result = mysql_query("SELECT * FROM Task2 WHERE userid ='$userid'");
        $result = mysql_query("SELECT * FROM Task2 WHERE userid=$userid");
        while($row = mysql_fetch_array($result))
        {
          $leftFile= $row['text1'];
        }

        $path = "dataset/sampleExamples/task2/".$leftFile;
        echo $path;
        $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);
        //array_shift($rows);

        foreach($rows as $row => $data)
        {
            echo $data. '<br /><br />';
        }
        mysql_free_result($result);
        mysql_close($con);      
}

function getRight($userid)
{

    echo "hello";

        //Get filename
        //$result = mysql_query("SELECT * FROM Task2 WHERE userid ='$userid'");
        $result = mysql_query("SELECT * FROM Task2 WHERE userid=$userid");
        while($row = mysql_fetch_array($result))
        {
          $leftFile= $row['text2'];
        }

        $path = "dataset/sampleExamples/task2/".$leftFile;
        echo $path;
        $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);
        //array_shift($rows);

        foreach($rows as $row => $data)
        {
            echo $data. '<br /><br />';
        }
        mysql_free_result($result);
        mysql_close($con);      
}

function getRemaining1($userid){
      //Get filename

        $result = mysql_query("SELECT * FROM Task1 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $remaining = 150 + 1 - $row['snippetid'];
          echo $remaining;
        }
        mysql_free_result($result);
        mysql_close($con);
}

function getPreface1($userid)
{
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
        mysql_free_result($result);
        mysql_close($con);      
}



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
             echo $data;
        }
        mysql_free_result($result);
        mysql_close($con);      
}




function getText1($userid)
{


        //Get filename
        //$result = mysql_query("SELECT * FROM Task2 WHERE userid ='$userid'");
        $result = mysql_query("SELECT * FROM Task1 WHERE userid=$userid AND read_this=1");
        while($row = mysql_fetch_array($result))
        {
          $leftFile= $row['text'];
        }

        $path = "dataset/task1/".$leftFile;
        echo $path;
         $txt_file    = file_get_contents($path);
        $rows        = explode("\n", $txt_file);
        array_shift($rows);

        foreach($rows as $row => $data)
        {
             echo $data. '<br /><br />';
        }
        mysql_free_result($result);
        mysql_close($con);      
}


//Manager
function showResult1()
{   
    echo "<table><tr> <td>user_id</td> <td>snippet_id</td>  <td>snippet_filename</td>  <td>rating</td>  <td>comment</td>  </tr>"; 
    $result = mysql_query("SELECT * FROM Result1");
    while($row = mysql_fetch_array($result))
    {   
       
      echo "<tr>" .
           "<td>" . $row['userid'] . "</td>" . 
           "<td>" . $row['snippetid']. "</td>" .
           "<td>" . $row['snippetFile']. "</td>" .
           "<td>" . $row['rating'] . "<td>".
           "<td>" . $row['comment'] . "<td>".
           "</tr>";
    }
    echo "</table>";
}

function showResult2()
{   
    echo "<table><tr> <td>user_id</td> <td>snippet_id</td>  <td>snippet_filename</td>  <td>rating</td>  <td>comment</td>  </tr>"; 
    $result = mysql_query("SELECT * FROM Result2");
    while($row = mysql_fetch_array($result))
    {   
       
      echo "<tr>" .
           "<td>" . $row['userid'] . "</td>" . 
           "<td>" . $row['pairid']. "</td>" .
           "<td>" . $row['pairFile1']. "</td>" .
           "<td>" . $row['pairFile2']. "</td>" .
           "<td>" . $row['rating_similar'] . "<td>".
           "<td>" . $row['rating_interesting'] . "<td>".
           "<td>" . $row['comment'] . "<td>".
           "</tr>";
    }
    echo "</table>";
}

function showResult3()
{   
    echo "<table><tr> <td>user_id</td> <td>snippet_id</td>  <td>snippet_filename</td>  <td>rating</td>  <td>comment</td>  </tr>"; 
    $result = mysql_query("SELECT * FROM Result3");
    while($row = mysql_fetch_array($result))
    {   
       
      echo "<tr>" .
           "<td>" . $row['userid'] . "</td>" . 
           "<td>" . $row['snippetid']. "</td>" .
           "<td>" . $row['snippetFile']. "</td>" .
           "<td>" . $row['rating'] . "<td>".
           "<td>" . $row['comment'] . "<td>".
           "</tr>";
    }
    echo "</table>";
}
// getResult1();

?>

