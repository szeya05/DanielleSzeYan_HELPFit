<?php
  session_start();
  //Connect to Database
  $errMsg = "";
  $servername = "localhost";
  $name = "root";
  $password = "";
  $dbname = "HELPfit";
  $con = new mysqli($servername, $name, $password, $dbname);

  if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

	$query1 = "SELECT fullname, username, level, email, password, type FROM member WHERE email='$email'";
	$res1=mysqli_query($con,$query1);

	$query2 = "SELECT fullname, username, specialty, email, password, type FROM trainer WHERE email='$email'";
	$res2=mysqli_query($con,$query2);

	// check whether user exists in the database
	$row1=mysqli_fetch_assoc($res1);
	$row2=mysqli_fetch_assoc($res2);
	$count1 = mysqli_num_rows($res1);
	$count2 = mysqli_num_rows($res2);

	if( $count1 == 1 && $row1['password']==$password ) {
		if ($row1['type'] == "member") {
			$_SESSION['user'] = $row1;
      $errMsg = "Successfully logged in";
		    header("Location: welcomeMember.php");
        exit();
		}
	}

	if ($count2 == 1 && $row2['password'] == $password) {
		if ($row2['type'] == "trainer"){
			$_SESSION['user'] = $row2;
      $errMsg = "Successfully logged in";
		    header("Location: welcomeTrainer.php");
        exit();
      }
    }
  }
    mysqli_close($con);
?>
