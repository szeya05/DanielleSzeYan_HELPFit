<?php
session_start();
$session_ID = $_GET['session_ID'];
?>
<!DOCTYPE html>
<html>
<head>
  <!--Bootstrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="mainJavaScript.js"></script>
  <link rel="stylesheet" type="text/css" href="mainStyle.css">
  <link rel="stylesheet" type="text/css" href="settings.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Update Group Training Session</title>

<style>
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
<?php echo '<form action = "updateGR.php?session_ID=' .$session_ID.'" method = "post">';?>
  <div class = "container" style="background-color:#dfdee5;">
    <div class = "row">
      <h2 style = "text-align:center;">Update Group Training Session</h2><br/>
    </div>

    <div class="row">
      <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-sm-offset-1">Title:</label>
          <div class="col-xs-12 col-sm-7">
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "HELPFit";

              // Create connection
              $con = new mysqli($servername, $username, $password, $dbname);

              $sql = "SELECT * FROM trainingsession WHERE sessionid = '$session_ID'";
              $result = mysqli_query($con, $sql);

              if (!$result) {
              die(mysqli_error($con));
              }

              while($row = mysqli_fetch_assoc($result)){
                echo '<label class="col-xs-12 col-sm-7">'. $row['title'] .'</label>';
              }

              $con->close();
              ?>
          </div>
      </div>
    </div>
  </br>

  <div class="row">
    <div class="form-group">
      <label class="col-xs-12 col-sm-3 col-sm-offset-1">Date:</label>
      <div class = "col-xs-12 col-sm-7">
        <input type="date" name="date" class="form-control input-lg" id="inputName">
      </div>
    </div>
  </div>
</br>

    <div class="row">
      <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-sm-offset-1">Time:</label>
          <div class="col-xs-12 col-sm-7">
              <input type="time" name="time" class="form-control input-lg" id="inputName">
          </div>
      </div>
    </div>
    </br>

    <div class="row">
      <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-sm-offset-1">Fee:</label>
          <div class="col-xs-12 col-sm-7">
              <input type="text" name="fee" class="form-control input-lg" id="inputName" placeholder="Exp: 100.00">
          </div>
      </div>
    </div>
    </br>

    <div class="row">
      <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-sm-offset-1">Max number of participants:</label>
          <div class="col-xs-12 col-sm-7">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "HELPFit";

            // Create connection
            $con = new mysqli($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM group_t WHERE sessionid = '$session_ID'";
            $result = mysqli_query($con, $sql);

            if (!$result) {
            die(mysqli_error($con));
            }

            while($row = mysqli_fetch_assoc($result)){
              echo '<label class="col-xs-12 col-sm-3">'. $row['maxNum'] .'</label>';
            }

            $con->close();
            ?>
          </div>
      </div>
    </div>
    </br>

    <div class="row">
      <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-sm-offset-1">Class Type:</label>
          <div class="col-xs-12 col-sm-7">
            <div class="col-xs-6 col-sm-3">
                <input type="radio" name="type" value="MMA"> MMA
            </div>

            <div class="col-xs-6 col-sm-3">
                <input type="radio" name="type" value="Dance"> Dance
            </div>

            <div class="col-xs-6 col-sm-3">
                <input type="radio" name="type" value="Sports"> Sports
            </div>
          </div>
      </div>
    </div>
    </br>

    <div class="row">
      <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-sm-offset-1">Status:</label>
          <div class="col-xs-12 col-sm-7">
            <div class="col-xs-6 col-sm-3">
                <input type="radio" name="status" value="available"> Available
            </div>

            <div class="col-xs-6 col-sm-3">
                <input type="radio" name="status" value="completed"> Completed
            </div>

            <div class="col-xs-6 col-sm-3">
                <input type="radio" name="status" value="cancelled"> Cancelled
            </div>
          </div>
      </div>
    </div>
  </br><br/><br/>

    <div class = "row">
      <div class = "form-group">
        <div class="col-sm-offset-4 col-sm-3">
            <button name = "submit" type="submit" class="btn btn-default" onclick="return updateSuccess();">Update</button>
        </div>
        <div class="col-sm-3">
            <button type="reset" class="btn btn-default">Cancel</button>
        </div>
      </div>
    </div></br>

  </div>
</form><br/><br/>
</div>

    <footer>
        <div class = "container">
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
