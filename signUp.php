<?php

 $errMsg ="";
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "HELPFit";
 $con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $level=$_POST['level'];
  $specialty=$_POST['specialty'];
  $type=$_POST['type'];

  if($type == "member"){
   $sql1 = "INSERT INTO  member (username,password,fullname,email,level, type)
           VALUES ('$username','$password','$fullname','$email','$level','$type')";
           mysqli_query($con, $sql1);
           $errMsg = "Succesfully signed up";
           header("location:signUpA1.html");
         }
       else if($type == "trainer"){
         $sql2 = "INSERT INTO  trainer (username,password,fullname,email,specialty,type)
                 VALUES ('$username','$password','$fullname','$email','$specialty','$type')";
                 mysqli_query($con, $sql2);
                 $errMsg = "Succesfully signed up";
                 header("location:signUpA1.html");
       }
     }

 mysqli_close($con);
?>
