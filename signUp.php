<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "helpfit";
 $con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
  //declare the variables
  $username=$_POST['username'];
  $password=$_POST['password'];
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  if (isset($_POST['level'])){$level=$_POST['level'];}
  $specialty=$_POST['specialty'];
  $type=$_POST['type'];

  //search for the username in the database
  $u_username = mysqli_query($con, "SELECT username FROM user WHERE
    username='$username'");
    while(mysqli_num_rows($u_username)){
      //if it exists, show a error message saying the username has been taken
      echo "<script>
                alert('This username has been taken. Please try again');
                location.href='signUpA1.html';
            </script>";exit;
    }
    //if not taken, add the user into the user table and respective member/trainer table
  $sql1 = "INSERT INTO  user (username,password,fullname,email,type)
          VALUES ('$username','$password','$fullname','$email', '$type')";
          mysqli_query($con, $sql1);
      if($type == "member"){
      $sql2 = "INSERT INTO member (level, username, type)
               VALUES ('$level', '$username', '$type')";
               mysqli_query($con, $sql2);
               echo "<script>
                         alert('Account successfully created. Please proceed to log in.');
                         location.href='signUpA1.html';
                     </script>";exit;
             }
      if($type == "trainer"){
             $sql4 = "INSERT INTO trainer (specialty, username, type)
                     VALUES ('$specialty', '$username', '$type')";
                     mysqli_query($con, $sql4);
                     echo "<script>
                               alert('Account successfully created. Please proceed to log in.');
                               location.href='signUpA1.html';
                           </script>";exit;
           }
       }

 mysqli_close($con);
?>
