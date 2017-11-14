<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <!--Bootstrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="registerTraining.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>List of Available Training Sessions</title>
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
<div class="container-fluid" id="bg">
    <h2>List of Available Training Sessions</h2>
    <br/>
    <div class="col-sm-4 col-md-6">
      <button class="optionBtn" onclick="openTab('Personal')">Personal Sessions</button>
    </div>
    <div class="col-sm-4 col-md-6">
      <button class="optionBtn" onclick="openTab('Group')">Group Sessions</button>
    </div>
      <br/>
    <div id="Personal" class="session col-sm-8 col-md-10 col-lg-9">
      <br/>
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Session ID</th>
              <th>Title</th>
              <th>Date</th>
              <th>Time</th>
              <th>Fee</th>
              <th>Notes</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "HELPFit";
        $con = new mysqli($servername, $username, $password, $dbname);
        $query = "SELECT personal_t.notes,trainingsession.sessionid,trainingsession.date,
        trainingsession.fee,trainingsession.title,trainingsession.time,trainingsession.status FROM personal_t,trainingsession
        WHERE trainingsession.sessionid=personal_t.sessionid";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die(mysqli_error($con));
          }

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            $sessionID = $row['sessionid'];
            echo "<tbody>";
             echo "<td><a href='addSession.php?session_ID=".$sessionID."'>". $row['sessionid']."</a>".
             "</td><td>".$row["title"].
             "</td><td>".$row["date"].
             "</td><td>".$row["time"].
              "</td><td>".$row["fee"].
             "</td><td>".$row["notes"].
             "</td><td>".$row["status"].
             "</td>";
           echo "</tbody>";
     }
   } else {
      echo "Training Session not found.";
    }

    mysqli_close($con);
?>
</tbody>
</table>
    </div>
    <br/>
  </div>
    <div id="Group" class="session col-sm-10 col-md-10 col-lg-9" style="display:none">
      <br/>
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Session ID</th>
              <th>Title</th>
              <th>Date</th>
              <th>Time</th>
              <th>Fee</th>
              <th>Max Num of Participants</th>
              <th>Class type</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
          //establish new connection with mySQL
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "HELPFit";
          $con = new mysqli($servername, $username, $password, $dbname);
          //select the data from group training table and trainingsession table
          $query = "SELECT group_t.maxNum,group_t.classtype,trainingsession.sessionid,trainingsession.date,
          trainingsession.fee,trainingsession.title,trainingsession.time,trainingsession.status
          FROM group_t,trainingsession WHERE trainingsession.sessionid=group_t.sessionid";
          $result = mysqli_query($con, $query);
          if (!$result) {
              die(mysqli_error($con));
            }
          //if there is data in the table, do
          if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              //declare the sessionid
              $sessionID = $row['sessionid'];
              //add the data from the database table into the table for display
            echo "<tbody>";
             echo "<td><a href='addSession.php?session_ID=".$sessionID."'>". $row['sessionid']."</a>".
             "</td><td>".$row["title"].
             "</td><td>".$row["date"].
             "</td><td>".$row["time"].
              "</td><td>".$row["fee"].
             "</td><td>".$row["maxNum"].
             "</td><td>".$row["classtype"].
             "</td><td>".$row["status"].
             "</td>";
           echo "</tbody>";
       }
     } else {
       //if no data is found, display this
        echo "Training Session not found.";
      }

      mysqli_close($con);
    ?>
  </table>
    </div>
    </br>
  </div>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</div>
    <footer>
        <div class = "container">
          <div class ="row">
            <div class = "col-xs-5 col-sm-2 col-sm-offset-1">
              <h4>Links</h4>
              <ul class = "list-unstyled" id = "bottomhover">
                <li><a href = "#">About</a></li>
                <li><a href = "#">Join Us</a></li>
              </ul>
            </div>
            <div class = "col-xs-6 col-sm-5">
              <h4>Our Address</h4>
              <p>Jalan Semantan, Bukit Damansara, 50490 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia.</P>
            </div>

            <div class = "col-xs-6 col-sm-4">
              <h4>Find Us On</h4>
              <ul class = "list-unstyled" id = "bottomhover">
              <a href = "https://www.facebook.com/" class="btn btn-social-icon btn-facebook">
                  <span class="fa fa-facebook"></span>
              </a>
              <a href = "https://twitter.com/?lang=en"class="btn btn-social-icon btn-twitter">
                <span class="fa fa-twitter"></span>
              </a>
              <a href = "https://www.instagram.com/" class="btn btn-social-icon btn-instagram">
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
      <script>
      //javascript function to open the clicked tab and hide the other
      function openTab(tabName) {
          var i;
          var x = document.getElementsByClassName("session");
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";
          }
          document.getElementById(tabName).style.display = "block";
      }
      </script>
  </body>
</html>
