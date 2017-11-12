<?php
session_start(); ?>
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

  <title>Training History</title>

  <style>
  th{
    text-align: center;
  }
  tr{
    text-align: center;
  }

  table {
    border: 3px solid #f1f1f1;
    height:30%
  }

  td a:link, td a:visited{color:blue;
  }

  div.image{
    background-image: url('gym.jpg');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position:relative;
    min-height:450px;
  }

  .table-responsive{
    height: 300px;
    overflow: scroll;
    overflow-x: hidden;
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
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "HELPFit";

            // Create connection
            $con = new mysqli($servername, $username, $password, $dbname);

            $type = $_SESSION['user']['type'];

          	if($type == 'trainer'){
             echo '<a href="welcomeTrainer.php">';
           }
           if($type == 'member'){
            echo '<a href="welcomeMember.php">';
          }

            ?>
              <img src = "HELPFitLogo.jpg" alt = "HELPFitLogo" display = "inline-block"></a>
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
              <li>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "HELPFit";

                // Create connection
                $con = new mysqli($servername, $username, $password, $dbname);

                $type = $_SESSION['user']['type'];

                if($type == 'trainer'){
                 echo '<a href="settings2.php">Settings</a>';
               }
               if($type == 'member'){
                echo '<a href="settings.php">Settings</a>';
              }
                ?>

              </li>
              <li class="divider"></li>
              <li><a href="Home Page.html"> Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
	</div>
</nav>

<div class = "image"><br/>
  <section>
    <div class = "container" style="background-color:#dfdee5;">
      <div class = "row">
        <div class = "col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <h2><b>Training History</b></h3><br/>
        </div>
    </div>


    <div class="table-responsive">
      <table class="table table-hover" style = "background-color:#FFF;">
        <thead>
          <tr>
            <th>Session ID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Type</th>
          </tr>
        </thead>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HELPFit";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    $type = $_SESSION['user']['type'];
    $username = $_SESSION['user']['username'];
    $fullname = $_SESSION['user']['fullname'];

  	if($type == 'trainer'){
        $sql = "SELECT * FROM trainingsession WHERE fullname = '$fullname'";
        $result = mysqli_query($con, $sql);

        if (!$result) {
        die(mysqli_error($con));
      }

    //fix a href so that it will take to personal page
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
           while($row = mysqli_fetch_assoc($result)) {
             echo "<tbody>";
             $username = $_SESSION['user']['username'];

             if($row['gpt'] == "personal"){
                  echo('<tr><td><a href="updatePersonalSession.php?session_ID=' .$row['sessionid']. '">'. $row['sessionid'].'</a></td>');
                }
                if($row['gpt'] == "group"){
                  echo('<tr><td><a href="updateGroupSession.php?session_ID=' .$row['sessionid']. '">'. $row['sessionid'].'</a></td>');
                }

             echo "<td>".$row["title"].
             "</td><td>".$row["date"].
             "</td><td>".$row["time"].
             "</td><td>".$row["gpt"].
             "</td></tr>";
           echo "</tbody>";
         }
       }
       else {
          echo "0 results";
        }
  	}

    if($type == 'member'){
        $sql1 = "SELECT sessionid FROM joingroup WHERE username = '$username'";
        $result1 = mysqli_query($con, $sql1);

       while($row = mysqli_fetch_assoc($result1)) {

        $sessionID = $row['sessionid'];

        $sql2 = "SELECT * FROM trainingsession WHERE sessionid = '$sessionID'";
        $result2 = mysqli_query($con, $sql2);

    //fix a href so that it will take to personal page
        if (mysqli_num_rows($result2) > 0) {
            // output data of each row
           while($row = mysqli_fetch_assoc($result2)) {
             echo "<tbody>";

             if($row['gpt'] == "personal"){
                  echo('<tr><td><a href="reviewPersonalTrainer.php?session_ID=' .$row['sessionid']. '">'. $row['sessionid'].'</a></td>');
                }
                if($row['gpt'] == "group"){
                  echo('<tr><td><a href="reviewGroupTrainer.php?session_ID=' .$row['sessionid']. '">'. $row['sessionid'].'</a></td>');
                }

             echo "<td>".$row["title"].
             "</td><td>".$row["date"].
             "</td><td>".$row["time"].
             "</td><td>".$row["gpt"].
             "</td></tr>";
           echo "</tbody>";
         }
       }
       else {
          echo "0 results";
        }
      }
  	}

    $con->close();
    ?>

      </table>
    </div>
  </div>
</section><br/>
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
