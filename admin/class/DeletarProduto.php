<?php

session_start();
include('../../controller/db_connect.php');

$prod_id = $_GET['prod_id'];

$sql = "DELETE FROM produtos WHERE prod_id='$prod_id'";

if (mysqli_query($connect, $sql)) {
    echo "Record deleted successfully id : " . $prod_id;
} else {
    echo "Error deleting record: ";
}

mysqli_close($connect);