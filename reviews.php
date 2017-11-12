<?php
session_start();
$session_ID = $_GET['session_ID'];

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "HELPFit";
 $con = new mysqli($servername, $username, $password, $dbname);

 if ($con->connect_error) {
    die('Connect Error: ' . $con->connect_error);
}


if(isset($_POST['submit'])){
  $ratings=$_POST['star'];
  $comments = $_POST['comments'];

  $sql1 = "INSERT INTO  review (sessionid, rating, comments)
          VALUES ('$session_ID','$ratings','$comments')";
          mysqli_query($con, $sql1);

  $sql2 = "SELECT * FROM trainingsession WHERE sessionid = '$session_ID'";
  $result = mysqli_query($con, $sql2);

  while($row = mysqli_fetch_assoc($result)) {
    if ($row['gpt'] == "group"){
      header("location:reviewGroupTrainer.php?session_ID=" .$row['sessionid']);
    }
    if($row['gpt'] == "personal"){
      header("location:reviewPersonalTrainer.php?session_ID=" .$row['sessionid']);
    }
  }
}
 mysqli_close($con);
?>
