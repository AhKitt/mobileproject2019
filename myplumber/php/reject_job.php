<?php
error_reporting(0);
include_once("dbconnect.php");
$jobid = $_POST['jobid'];
$email = $_POST['email'];
$credit = $_POST['credit'];

$sql = "UPDATE jobs SET jobworker = null  WHERE jobid = '$jobid'";
if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>
