<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  session_start();
  ?>
  <title>ASATS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  /* Remove the navbar's default margin-bottom and rounded borders */
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
  .row.content {height: 450px}

  /* Set gray background color and 100% height */
  .sidenav {
    padding-top: 20px;
    background-color: #f1f1f1;
    height: 180%;
  }

  /* Set black background color, white text and some padding */
  footer {
    background-color: #555;
    color: white;
    padding: 15px;
  }

  /* On small screens, set height to 'auto' for sidenav and grid */
  @media screen and (max-width: 767px) {
    .sidenav {
      height: auto;
      padding: 15px;
    }
    .row.content {height:auto;}
  }
  </style>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img src="ASATS.png" style="width:100px;height:48px;">
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Information</a></li>
          <li><a href="#">Trainings</a></li>
          <li><a href="#">Contacts</a></li>
          <li><a href="./login.php">Log out</a></li>
        </ul>
        <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>-->
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="midsinfo.php">MIDS Info</a></p>
      <p><a href="#">Instructions</a></p>
      <p><a href="#">Mentors</a></p>
      <p><a href="#">Chain of Command</a></p>
    </div>
    <div class="col-sm-8 text-left">
      <h1>Welcome to ASATS</h1>
      <p style="color:#885D55; font-size: 30px;">Aviation Service Assignment Tracking System is a tool that facilitates aviation mentors and the aviation board with providing relevant information
        of each midshipman.  It is a database-driven website that efficiently stores and retrieves detailed information
        such as ASTB score, PFP and Aviation cruise performances, and interviews.  This system is easy to use and
        understand for both midshipmen and faculty, and is able to accomodate administrators without experience in SQL, PHP, or Javascript.  </p>
  
      </div>
      <div class="col-sm-2 sidenav">
        <div class="well">
          <p>Fixed Wing</p>
        </div>
        <div class="well">
          <p>Rotary Wing</p>
        </div>
      </div>
    </div>
  </div>

  <footer class="container-fluid text-center">
    <p>Developed by MIDN 1/C Landry Tamba, Grant Zaro, Joseph Kim and Enock Langat <br>
      Copyright, all rights reserved: UNITED NATIONS September 2017</p>
    </footer>

  </body>
  </html>
