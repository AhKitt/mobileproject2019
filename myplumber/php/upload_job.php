<?php
error_reporting(0);
include_once ("dbconnect.php");
$email = $_POST['email'];
$jobtitle = $_POST['jobtitle'];
$jobdesc = $_POST['jobdesc'];
$jobprice = $_POST['jobprice'];
$address = $_POST['address'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$encoded_string = $_POST["encoded_string"];
$credit = $_POST['credit'];
// $rating = $_POST['rating'];
$decoded_string = base64_decode($encoded_string);
$mydate =  date('Y-m-d h:i:s');
$imagename = $mydate.'-'.$email;

$sqlinsert = "INSERT INTO jobs(JOBTITLE,JOBOWNER,JOBDESC,JOBIMAGE,LATITUDE,LONGITUDE,JOBTIME,JOBADDRESS,JOBPRICE) VALUES ('$jobtitle','$email','$jobdesc','$imagename','$latitude','$longitude','$mydate','$address','$jobprice')";


if ($credit>0){
    if ($conn->query($sqlinsert) === TRUE) {
        $path = '../jobimages/'.$imagename.'.jpg';
        file_put_contents($path, $decoded_string);
        $newcredit = $credit - 1;
        $sqlcredit = "UPDATE user SET credit = '$newcredit' WHERE email = '$email'";
        $conn->query($sqlcredit);
        echo "success";
    } else {
        echo "failed,$jobtitle','$email','$jobdesc','$imagename','$latitude','$longitude','$mydate'";
    }
}else{
    echo "low credit";
}

?>