<?php
//Print out the value in table task2
include 'connectInfo.php';
$result = mysql_query("SELECT * FROM Task2");
while($row = mysql_fetch_array($result))
{
  echo $row['userid'] . " " . $row['pairid']. "  " . $row['text1']. $row['text2'];
  echo "<br />";
}



//-------------------------------------------------------------------------------//
//                add test-example-task1.txt to Database table Task1
// //-------------------------------------------------------------------------------//
// $txt_file    = file_get_contents('task1.txt');
// $rows        = explode("\n", $txt_file);
// array_shift($rows);

// $snippetid = 0;
 // foreach($rows as $row => $data)
// {
//     //get row data
//     $row_data = preg_split('/\s+/', $data);
//     echo 'Row ' . $row . ':      ID:    ' . $row_data[0]. '<br />';
//     echo 'Row ' . $row . ':      TEXT1: ' . $row_data[1] . '<br />';
//     echo 'Row ' . $row . ':      TEXT2: ' . $row_data[2] . '<br />';
//     echo 'Row ' . $row . ':      TEXT3: ' . $row_data[3] . '<br />';
//     echo '<br />';

    //$userid = 100 + $row_data[0];

    // if($row_data[1]!= ''){
    //     $sql = "INSERT INTO Task2 VALUES ('$userid', '$snippetid', '$row_data[1]','$row_data[2]', 0)";
    //     mysql_query($sql) or die(mysql_error());
    //     echo "add one!";
    //     $pairid = $pairid + 1;
//     }
    
// }




//-------------------------------------------------------------------------------//
//                add test-example-task2.txt to Database table Task2
//-------------------------------------------------------------------------------//
$txt_file    = file_get_contents('task2.txt');
$rows        = explode("\n", $txt_file);
array_shift($rows);

$userid = 201;

$pariid = 1;
foreach($rows as $row => $data)
{
    //get row data
    $row_data = preg_split('/\s+/', $data);
    //echo 'Row ' . $row . ':      ID:    ' . $row_data[0]. '<br />';
    //echo 'Row ' . $row . ':      TEXT1: ' . $row_data[1] . '<br />';
    //echo 'Row ' . $row . ':      TEXT2: ' . $row_data[2] . '<br />';
    //echo '<br />';
    


    if($row_data[1]!= '' && $pairid <= 50){
        $sql = "INSERT INTO Task2 VALUES ('$userid', '$pairid', '$row_data[1]','$row_data[2]', 0)";
        mysql_query($sql) or die(mysql_error());
        echo "add one!";
        $pairid = $pairid + 1;
    }
    
}

//-------------------------------------------------------------------------------//
//                end add test-example-task2.txt to Database table task2
//-------------------------------------------------------------------------------//


?>

