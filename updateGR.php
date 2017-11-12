<?php
session_start();
$session_ID = $_GET['session_ID'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HELPFit";
$con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
  $date=$_POST['date'];
  $time=$_POST['time'];
  $fee=$_POST['fee'];
  $type=$_POST['type'];
  $status=$_POST['status'];

  if($date!=""){
    $sql1 = "UPDATE trainingsession SET date = '$date' WHERE sessionid = '$session_ID'";
    mysqli_query($con, $sql1);
  }

  if($time!=""){
    $sql2 = "UPDATE trainingsession SET time = '$time' WHERE sessionid = '$session_ID'";
    mysqli_query($con, $sql2);
  }

  if($fee!=""){
    $sql3 = "UPDATE trainingsession SET fee = '$fee' WHERE sessionid = '$session_ID'";
    mysqli_query($con, $sql3);
  }

  if($status!=""){
    $sql4 = "UPDATE trainingsession SET status = '$status' WHERE sessionid = '$session_ID'";
    mysqli_query($con, $sql4);
  }

  if($type!=""){
    $sql5 = "UPDATE group_t SET classtype = '$type' WHERE sessionid = '$session_ID'";
    mysqli_query($con, $sql5);
  }
  header("location:updateGroupSession.php?session_ID=$session_ID");
}

  mysqli_close($con);

 ?>
