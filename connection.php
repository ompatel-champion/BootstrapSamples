<?php
/**
 * Created by PhpStorm.
 * User: Jacob Davidson
 * Date: 6/24/2020
 * Time: 11:15 AM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedcalc_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


//Feeds DB Update
if (isset($_POST['feedDB_update'])) {
    $matID = $_POST['mat_ID'];
    $fieldName = $_POST['FieldName'] ;
    $updateVal = $_POST['UpdateValue'];

    $result = mysqli_query($conn, "UPDATE feed_db SET $fieldName = '$updateVal' WHERE id='$matID'");
    if ($result) {
        return 'Data Updated';
    }
}
//Get Data in the Main Table
if (isset($_POST['mainTable_GetData'])) {
    $matID = $_POST['mat_ID'];

    $result = mysqli_query($conn, "SELECT * FROM feed_db WHERE id='$matID'");
    if ($result) {
        if ($matID > 0 && $matID <= 150) {
            $row = mysqli_fetch_row($result);
            $row_tem_str = "";
            foreach ($row as $each_row) {
                $row_tem_str .= $each_row . ";";
            }
            echo $row_tem_str;
        } else {
            echo "none";
        }
    } else {
        echo mysqli_error();
    }
}

//mysqli_close($conn);