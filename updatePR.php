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
  $status=$_POST['status'];
  $notes= $_POST['notes'];

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

  if($notes!=""){
    $sql5 = "UPDATE personal_t SET notes = '$notes' WHERE sessionid = '$session_ID'";
    mysqli_query($con, $sql5);
  }

  header("location:updatePersonalSession.php?session_ID=$session_ID");
}

  mysqli_close($con);
 ?>
