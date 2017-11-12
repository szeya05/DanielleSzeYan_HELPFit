<?php
session_start();
$session_ID = $_GET['session_ID'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <!--Bootstrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
  <script src="mainJavaScript.js"></script>
  <link rel="stylesheet" type="text/css" href="settings.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


  <title>Reviews and Ratings</title>

  <style>
  div.stars {
    width: 270px;
    display: inline-block;
  }
  input.star { display: none; }

  label.star {
    float: right;
    width: 40px;
    padding: 5px;
    font-size: 20px;
    color: #444;
    transition: all .2s;
  }

  input.star:checked ~ label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
  }

  input.star-1:checked ~ label.star:before { color: #F62; }

  label.star:hover { transform: rotate(-15deg) scale(1.3); }

  label.star:before {
    content: '\f006';
    font-family: FontAwesome;
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
            <a href="welcomeMember.php"><img src = "HELPFitLogo.jpg" alt = "HELPFitLogo" display = "inline-block"></a>
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
              <li><a href="settings.php">Settings</a></li>
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
      <div class = "col-xs-12 col-sm-12">
      </br>
      <?php
      $session_ID = $_GET['session_ID'];
      echo "<h3>Personal Training Session ". $session_ID ."</h3>"?>
      <br/>
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
        $sql2 = "SELECT * FROM personal_t WHERE sessionid = '$session_ID'";
        $result2 = mysqli_query($con, $sql2);

        while($row = mysqli_fetch_assoc($result2)) {
        echo "<tr><th>Notes</th><td>" .$row['notes']."</td></tr>";
      }
      $con->close();
        ?>
      </tbody>
    </table>
  </div><br/>
  <?php
  $currentDate = date("Y-m-d H:i:s");
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "HELPFit";

  // Create connection
  $con = new mysqli($servername, $username, $password, $dbname);

  $sql = "SELECT * FROM trainingsession WHERE sessionid = '$session_ID'";
  $result = mysqli_query($con, $sql);

  while($row = mysqli_fetch_assoc($result)) {
    $sql2 = "SELECT date FROM trainingsession WHERE sessionid = '$session_ID'";
    $result2 = mysqli_query($con, $sql2);

    while($row = mysqli_fetch_assoc($result2)) {
      $today = date("Y-m-d");
      $thisDate = $row['date'];
      $currentDT = new DateTime($today);
      $thisDT = new DateTime($thisDate);

      if ($currentDT > $thisDT){
        echo   '<div class = "container" >
            <h3 style = "text-align: left;">Add Your Review Here</h3><br/>
              <div class = "col-xs-12 col-sm-9" style="background-color:#FFF;"><br/>
                <div class = "col-xs-12 col-sm-10">';
        echo '<form action="reviews.php?session_ID='.$session_ID.'" method = "post" name = "form">';
        echo '  <div class="stars" style = "margin-left: -70px;">
              <input class="star star-5" id="star-5" type="radio" name="star" value = "5" />
              <label class="star star-5" for="star-5"></label>
              <input class="star star-4" id="star-4" type="radio" name="star" value = "4"/>
              <label class="star star-4" for="star-4"></label>
              <input class="star star-3" id="star-3" type="radio" name="star" value = "3"/>
              <label class="star star-3" for="star-3"></label>
              <input class="star star-2" id="star-2" type="radio" name="star" value = "2"/>
              <label class="star star-2" for="star-2"></label>
              <input class="star star-1" id="star-1" type="radio" name="star" value = "1"/>
              <label class="star star-1" for="star-1"></label>
          </div><br/>
          <textarea name = "comments" style="width:100%" placeholder="Enter your comments here."></textarea><br/>
          <button name = "submit" type="submit" onclick="reviewSuccess()">Submit</button>  </form><br/>
          </div><br/>
        </div><br/>
      </div><br/><br/>';
      }
    }
    }

      $con->close();
   ?>

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
