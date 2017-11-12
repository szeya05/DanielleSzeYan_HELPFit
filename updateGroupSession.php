<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <!--Bootstrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
  <link rel="stylesheet" type="text/css" href="settings.css">
  <script src="mainJavaScript.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Reviews and Ratings</title>

  <style>
  .rating {
  unicode-bidi: bidi-override;
  direction: rtl;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 1.1em;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 16px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
}
button:hover {
    opacity: 0.8;
}
button a:link, a:visited{
  color:white;
  text-decoration: none;
}

div.image{
  background-image: url('gym.jpg');
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  position:relative;
  min-height:450px;
}

  </style>
</head>
  <body>
    <!--Include JQuery: necessary for Bootstrap plugins-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Include bootstrap library as needed-->
    <script src="js/bootstrap.min.js"></script>
    <!--navbar-inverse for reversing the colour of the nav menu-->
    <nav>
      <div class = "container">
        <div class = "row">
          <div class = "col-sm-4 col-md-2 col-lg-2">
            <a href="welcomeTrainer.php"><img src = "HELPFitLogo.jpg" alt = "HELPFitLogo" display = "inline-block"></a>
          </div>
          <div class = "col-sm-2 col-md-1 col-lg-1 col-md-offset-6">
          <a class="navlink" id = "tophover" href = "loginAbout.html">About</a>
          </div>
        <div class = "col-sm-4 col-md-1 col-lg-1">
        <a class="navlink" id = "tophover" href = "loginFitness.html">Fitness</a>
        </div>
        <div class="col-sm-4 col-md-1 col-lg-2">
          <div class="nav navlink">
            <a class="dropdown-toggle" id="tophover" data-toggle="dropdown">Welcome!
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" id="navhover">
              <li><a href="settings2.php">Settings</a></li>
              <li class="divider"></li>
              <li><a href="Home Page.html"> Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
	</div>
</nav>

<div class = "image"><br/>
  <div class = "container" style="background-color:#dfdee5;">
    <div class = "row">
      <div class = "col-xs-12 col-sm- col-md-9 col-lg-9">
      </br>

      <?php
      $session_ID = $_GET['session_ID'];
      echo "<h3>Group Training Session ". $session_ID ."</h3>"?>

      <br/>
      </div>
      <div class = "col-xs-12 col-sm-3 col-md-3 offset-md-1 col-lg-3">
      <button type="button">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "HELPFit";

      // Create connection
      $con = new mysqli($servername, $username, $password, $dbname);

      $fullname = $_SESSION['user']['fullname'];
      $sql = "SELECT * FROM trainingsession WHERE sessionid = '$session_ID'";
      $result = mysqli_query($con, $sql);
       while($row = mysqli_fetch_assoc($result)) {
      echo '<a href = "updateGroupRecord.php?session_ID=' .$row['sessionid'].'">Update Session</a>';
    }
      ?></button>
      </div>
  </div>
  <div class = "col-xs-12 col-sm-12">
    <table class="table" style="background-color:#FFF;">
      <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "HELPFit";

        // Create connection
        $con = new mysqli($servername, $username, $password, $dbname);
        $session_ID = $_GET['session_ID'];

        $sql = "SELECT * FROM trainingsession WHERE sessionid = '$session_ID'";
        $result = mysqli_query($con, $sql);

        if (!$result) {
        die(mysqli_error($con));
      }

      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><th>Title</th><td>".$row['title']."</td></tr>".
         "<tr><th>Date</th><td>" .$row['date']."</td></tr>".
         "<tr><th>Time</th><td>" .$row['time']."</td></tr>".
         "<tr><th>Fee</th><td>" .$row['fee']."</td></tr>".
         "<tr><th>Status</th><td>" .$row['status']."</td></tr>".
         "<tr><th>Trainer</th><td>" .$row['fullname']."</td></tr>";
       }
        $sql2 = "SELECT * FROM group_t WHERE sessionid = '$session_ID'";
        $result2 = mysqli_query($con, $sql2);

        while($row = mysqli_fetch_assoc($result2)) {
        echo "<tr><th>Type</th><td>" .$row['classtype']."</td></tr>".
         "<tr><th>Max number of participants</th><td>" .$row['maxNum']."</td></tr>";
      }
      $con->close();
        ?>
      </tbody>
    </table>
  </div><br/>

  <div class = "container">
    <h3 style = "text-align: left;">Your Average Rating</h3>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HELPFit";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    $query2 = "SELECT sessionid, rating FROM review WHERE sessionid = '$session_ID'";
    $rating = $con->query($query2);
    $totalrating = 0;
    $ratingcount = 0;
    $averagerating = "";
    while($row = $rating->fetch_assoc()){
       $totalrating += $row['rating'];
       $ratingcount ++;
    }
    if($ratingcount == 0){
      $averagerating = "N.A.";
    }
    else{
      $average = $totalrating/$ratingcount;
      $averagerating = number_format((float)$average, 2, '.', '');
    }
    echo $averagerating;
     ?>
  </div><br/>

</div><br/>
</div>

    <footer>
        <div class = "container-fluid">
          <div class ="row">
            <div class = "col-xs-5 col-sm-2 col-sm-offset-1">
              <h4>Links</h4>
              <ul class = "list-unstyled" id = "bottomhover">
                <li><a href = "About.html">About</a></li>
                <li><a href = "Fitness.html">Fitness</a></li>
              </ul>
            </div>
            <div class = "col-xs-6 col-sm-5">
              <h4>Our Address</h4>
              <p>Jalan Semantan, Bukit Damansara, 50490 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia.</P>
            </div>

            <div class = "col-xs-6 col-sm-4">
              <h4>Find Us On</h4>
              <ul class = "list-unstyled" id = "bottomhover">
              <a class="btn btn-social-icon btn-facebook" onclick="facebookLink()">
                  <span class="fa fa-facebook"></span>
              </a>
              <a class="btn btn-social-icon btn-twitter" onclick="twitterLink()">
                <span class="fa fa-twitter"></span>
              </a>
              <a class="btn btn-social-icon btn-instagram" onclick="instagramLink()">
                <span class="fa fa-instagram"></span>
              </a>
            </ul>
            </div>
            <div class = "col-xs-12">
              <!--to provide invisible space for webiste-->
              <p style = "padding:10px;"</p>
              <p align = "center">Copyright &copy; HELPFit 2017. All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </footer>
  </body>
</html>
