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
  $notes=$_POST['notes'];

   $sql1 = "INSERT INTO  personal_T (title,date,time,fee,notes)
           VALUES ('$title','$date','$time','$fee','$notes')";
           mysqli_query($con, $sql1);
           header("location:personalTraining.html");
         }

 mysqli_close($con);
?>
