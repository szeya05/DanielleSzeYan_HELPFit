<?php
session_start();

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "HELPFit";
 $con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
  //declare variables
  $title=$_POST['title'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $fee=$_POST['fee'];
  $notes=$_POST['notes'];
  $status=$_POST['status'];
  $gpt='personal';
  $fullname = $_SESSION['user']['fullname'];

  $u_ps = mysqli_query($con, "SELECT date,time FROM trainingsession WHERE
    time='$time' AND date='$date'");
    while(mysqli_num_rows($u_ps)){
      //if it exists, show a error message saying the session already exists at this time
      echo "<script>
                alert('A session already exist at this time!');
                location.href='personalTraining.html';
            </script>";exit;
    }

  //insert the data from the form into the trainingsession table
  $sql1 = "INSERT INTO  trainingsession (title,date,time,fee, status,gpt,fullname)
          VALUES ('$title','$date','$time','$fee','$status','$gpt','$fullname')";
          mysqli_query($con, $sql1);

  $session_ID = mysqli_insert_id($con);
 //insert data into the personal_t table
  $sql2 = "INSERT INTO  personal_t (notes, gpt,sessionid)
           VALUES ('$notes','$gpt','$session_ID')";
           mysqli_query($con, $sql2);
           //show a pop up alert that the training sessions has been created
           echo "<script>
                     alert('Training session successfully created.');
                     location.href='personalTraining.html';
                 </script>";exit;
       }

 mysqli_close($con);
?>
