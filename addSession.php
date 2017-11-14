<?php
//start the session
session_start();

//estalish a new connection with the mySQL server
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "helpfit";
 $con = new mysqli($servername, $username, $password, $dbname);
 $sessionid = $_GET['session_ID'];
 $username= $_SESSION['user']['username'];

 $a_session = mysqli_query($con, "SELECT sessionid FROM joingroup WHERE
   sessionid='$sessionid'");
   while(mysqli_num_rows($a_session)){
     //if it exists, show a error message saying the username has been taken
     echo "<script>
               alert('You already registered for this session!');
               location.href='registerTraining.php';
           </script>";exit;
   }
   //insert the values of sessionid and fullname into the joingroup table
   //and show a pop up alert that the session has been added
   $sql1 = "INSERT INTO  joingroup (sessionid,username)
           VALUES ('$sessionid','$username')";
           mysqli_query($con, $sql1);
           echo "<script>
                     alert('Your session has been added');
                     location.href='registerTraining.php';
                 </script>";
                 exit;
 //close the connecton
 mysqli_close($con);
?>
