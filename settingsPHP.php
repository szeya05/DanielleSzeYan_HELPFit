<?php

session_start();

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "HELPFit";
 $con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
  $newpassword=$_POST['newpassword'];
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  if (isset($_POST['level'])){$level=$_POST['level'];}
  if (isset($_POST['specialty'])){$specialty=$_POST['specialty'];}
  $type=$_SESSION['user']['type'];
  $oldemail = $_SESSION['user']['email'];
  if (empty($newpassword)){$newpassword = $_SESSION['user']['password'];}

  if($type == "member"){
   $sql1 = "UPDATE  member SET fullname = '$fullname', password = '$newpassword',
   level = '$level',email = '$email'
          WHERE email = '$oldemail'";
           mysqli_query($con, $sql1);

           unset($_SESSION['user']);
           $query2 = "SELECT fullname, username, level, email, password, type FROM member WHERE email='$email'";
           $res2=mysqli_query($con,$query2);
           $row2=mysqli_fetch_assoc($res2);
           $_SESSION['user'] = $row2;
           header("location:settings.php");
         }
       else if($type == "trainer"){
         $sql2 = "UPDATE  trainer SET fullname = '$fullname', password = '$newpassword',
         specialty = '$specialty',email = '$email'
                WHERE email = '$oldemail'";
                 mysqli_query($con, $sql2);

                 unset($_SESSION['user']);
                 $query2 = "SELECT fullname, username, specialty, email, password, type FROM trainer WHERE email='$email'";
               	 $res2=mysqli_query($con,$query2);
                 $row2=mysqli_fetch_assoc($res2);
                 $_SESSION['user'] = $row2;
                 header("location:settings2.php");
       }
     }

 mysqli_close($con);
?>
