<?php
//Print out the value in table task2
include 'connectInfo.php';
$result = mysql_query("SELECT * FROM Task3");
while($row = mysql_fetch_array($result))
{
  echo $row['userid'] . " " . $row['snippetid']. "  " . $row['text']. "   " . $row['read_this'];
  echo "<br />";
}
mysql_free_result($result);

//-------------------------------------------------------------------------------//
//                add test-example-task1.txt to Database table Task1
// //-------------------------------------------------------------------------------//
$txt_file    = file_get_contents('task3.txt');
$rows        = explode("\n", $txt_file);
array_shift($rows);


 foreach($rows as $row => $data)
{
    //get row data
    $row_data = preg_split('/\s+/', $data);
    // echo 'Row ' . $row . ':      ID:    ' . $row_data[0]. '<br />';
    // echo 'Row ' . $row . ':      TEXT1: ' . $row_data[4] . '<br />';
    // echo 'Row ' . $row . ':      TEXT2: ' . $row_data[5] . '<br />';
    // echo 'Row ' . $row . ':      TEXT3: ' . $row_data[6] . '<br />';
    //     echo 'Row ' . $row . ':      TEXT3: ' . $row_data[7] . '<br />';
    // echo '<br />';

    //every person has 150 articles to rate
    $userid = $row_data[0] + 300;

    $snippetid = 1;
    //sinppetid + 3 is the position of text path

     while ($userid != 100 && $snippetid < 31)
    {

        //if($row_data[1]!= ''){
            $sql = "INSERT INTO Task3 VALUES ($userid, $snippetid, '". $row_data[$snippetid + 3]. "', 0)";
            mysql_query($sql) or die(mysql_error());
            $snippetid = $snippetid + 1;
        //}
    }
    
}

?>

