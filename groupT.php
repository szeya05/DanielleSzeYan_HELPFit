<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "HELPFit";
 $con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
  $title=$_POST['title'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $fee=$_POST['fee'];
  $maxNum=$_POST['maxNum'];
  $classtype=$_POST['classtype'];
  $status=$_POST['status'];

  if($classtype == 'sports' || $classtype == 'dance' || $classtype == 'mma'){
   $sql1 = "INSERT INTO  group_t (title,date,time,fee,maxNum,classtype,status)
           VALUES ('$title','$date','$time','$fee','$maxNum','$classtype','$status')";
           mysqli_query($con, $sql1);
           header("location:groupTraining.html");
         }
       }

 mysqli_close($con);
?>
