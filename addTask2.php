<?php
//Print out the value in table task2
include 'connectInfo.php';
$result = mysql_query("SELECT * FROM Task2");
while($row = mysql_fetch_array($result))
{
  echo $row['userid'] . " " . $row['pairid']. "  " . $row['text1']. $row['text2'];
  echo "<br />";
}
mysql_free_result($result);




//-------------------------------------------------------------------------------//
//                add test-example-task2.txt to Database table Task2
//-------------------------------------------------------------------------------//
$txt_file    = file_get_contents('task2.txt');
$rows        = explode("\n", $txt_file);
array_shift($rows);



//userid, pairid, text1, text2, read_this
for($usr = 201; $usr <= 205; $usr ++){

    foreach($rows as $row => $data)
    {
        //get row data
        $row_data = preg_split('/\s+/', $data);
        $pairid = $row_data[0] + 1;
        // echo $pairid;
        // echo 'Row ' . $row . ':      ID:    ' . $row_data[0] . '<br />';
        // echo 'Row ' . $row . ':      TEXT1: ' . $row_data[1] . '<br />';
        // echo 'Row ' . $row . ':      TEXT2: ' . $row_data[2] . '<br />';
        // echo '<br />';

        if($row_data[1]!= ''){
            $sql = "INSERT INTO Task2 VALUES ('$usr', '$pairid', '$row_data[1]','$row_data[2]', 0)";
            mysql_query($sql) or die(mysql_error());
            echo "add one!";

        }

    }

}

//-------------------------------------------------------------------------------//
//                end add test-example-task2.txt to Database table task2
//-------------------------------------------------------------------------------//

// foreach($rows as $row => $data)
// {
//     //get row data
//     $row_data = preg_split('/\s+/', $data);
//     // echo 'Row ' . $row . ':      ID:    ' . $row_data[0]. '<br />';
//     // echo 'Row ' . $row . ':      TEXT1: ' . $row_data[4] . '<br />';
//     // echo 'Row ' . $row . ':      TEXT2: ' . $row_data[5] . '<br />';
//     // echo 'Row ' . $row . ':      TEXT3: ' . $row_data[6] . '<br />';
//     //     echo 'Row ' . $row . ':      TEXT3: ' . $row_data[7] . '<br />';
//     // echo '<br />';

//     //every person has 150 articles to rate
//     $userid = $row_data[0] + 100;

//     $snippetid = 1;
//     //sinppetid + 3 is the position of text path

//      while ($userid != 100 && $snippetid < 151)
//     {
//         $sql = "INSERT INTO Task1 VALUES ($userid, $snippetid, '". $row_data[$snippetid + 3]. "', 0)";
//         mysql_query($sql) or die(mysql_error());
//         $snippetid = $snippetid + 1;
//     }

// }




?>

