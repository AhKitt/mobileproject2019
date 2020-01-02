<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];

$sql = "SELECT * FROM jobs WHERE jobowner = '$email'  ORDER BY JOBID DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["jobs"] = array();
    while ($row = $result ->fetch_assoc()){
        $joblist = array();
        $joblist[jobid] = $row["jobid"];
        $joblist[jobtitle] = $row["jobtitle"];
        $joblist[jobowner] = $row["jobowner"];
        $joblist[jobprice] = $row["jobprice"];
        $joblist[jobdesc] = $row["jobdesc"];
        $joblist[jobtime] = date_format(date_create($row["jobtime"]), 'd/m/Y h:i:s');
        $joblist[jobaddress] = $row["jobaddress"];
        $joblist[jobimage] = $row["jobimage"];
        $joblist[joblatitude] = $row["latitude"];
        $joblist[joblongitude] = $row["longitude"];
        $joblist[jobimage] = $row["jobimage"];
        $joblist[joblatitude] = $row["latitude"];
        $joblist[joblongitude] = $row["longitude"];
        $joblist[jobworker] = $row["jobworker"];
        array_push($response["jobs"], $joblist);    
    }
    echo json_encode($response);
}else{
    echo "nodata";
}


?>