<?php
  session_start();
  //Connect to Database
  $errMsg = "";
  $servername = "localhost";
  $name = "root";
  $password = "";
  $dbname = "helpfit";
  $con = new mysqli($servername, $name, $password, $dbname);

  if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

  //select all of the data from user table
	$query1 = "SELECT * FROM user WHERE username='$username'
  AND password='$password'";
	$res1=mysqli_query($con,$query1);

	// check whether user exists in the database
	$row1=mysqli_fetch_assoc($res1);
	$count1 = mysqli_num_rows($res1);
  $type = $row1['type'];
  $username = $row1['username'];

//for trainer
if($type == 'trainer'){
			$_SESSION['user'] = $row1;
      $query1 = "SELECT * FROM trainer WHERE username='$username'";
    	$res1=mysqli_query($con,$query1);
      if (mysqli_num_rows($res1) == 1) {
        $_SESSION['trainer']=mysqli_fetch_assoc($res1);
      }
      echo "<script>
      alert('Successfully logged in');
		  location.href='welcomeTrainer.php';
      </script>";
      exit();
		}

 //for member
  else if ($type == 'member') {
        $_SESSION['user'] = $row1;
        $query1 = "SELECT * FROM member WHERE username='$username'";
      	$res1=mysqli_query($con,$query1);
        $_SESSION['member']=mysqli_fetch_assoc($res1);
        echo "<script>
        alert('Successfully logged in');
        location.href='welcomeMember.php';
        </script>";
        exit();
  }
  //if the data doesn't exist in the database, show a pop up alert
  else{
    echo "<script>
    alert('Invalid username or password');
    location.href='Login.html';
    </script>";
    exit();
  }
}

    mysqli_close($con);
?>
