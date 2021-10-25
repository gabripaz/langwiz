
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>user profile</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style2.css" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
	
</head>
<body>

<html>

<head>
  <title>LangWiz</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  </head>

<body>

<div id="main">
    <div id="header">
	
		
      <div id="logo">
		<div id="logoimgenes"></div>
        <div id="logo_text">
		
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Lang<span class="logo_colour">Wiz</span></a></h1>
          <h2>The new way to learn a new language</h2>
		  <div id="loginbox">

		  <!-- ANCOR TAGS TO REMOVE AFTER -->
		  <a href="index.php"><button class="buttons" data-toggle="modal" >Log Out</button></a>
		  </div>
		   <div class="clr"></div>
        </div>
      </div>
	 
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.html">Home</a></li>
          <li><a href="examples.html">How to Start</a></li>
          <li><a href="page.html">A Page</a></li>
          <li><a href="another_page.html">Another Page</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>

    </div>








 <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey" style="background-color:#E6E6FA;">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
             <!-- Here after we can include the option to change the picture -->
              <a href="#">
                  <img src="img/default.jpg" alt="">
              </a>
              <?php 
              require_once 'configurationdb.php';
              if(isset($_GET['userName']))
              {
                  $username=$_GET['userName'];
              
             $firstName="";$lastName="";$email="";$photo="";
              
              //$sqlStmt="SELECT `FName`,`LName`,`EmailAddress`,`Photo` FROM `users` WHERE `UserName`=$userName";
              $sqlStmt="SELECT `FName`,`LName`,`EmailAddress`,`Photo` FROM `users` WHERE `UserName`='$username'";
              $queryId=mysqli_query($connection, $sqlStmt);
              while ($rec=mysqli_fetch_array($queryId)){
                  $firstName=$rec["FName"];
                  $lastName=$rec["LName"];
                  $email=$rec["EmailAddress"];
                  $photo=$rec["Photo"];
              ?>
              <h1><?=$firstName?></h1>
              <p><?=$email?></p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"> <i class="fa fa-calendar"></i> Meet New People <span class="label label-warning pull-right r-activity">9</span></a></li>
              <li><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          <form>
              <textarea placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
          </form>
          <footer class="panel-footer">
              <button class="btn btn-warning pull-right">Post</button>
              <ul class="nav nav-pills">
                  <li>
                      <a href="#"><i class="fa fa-map-marker"></i></a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-camera"></i></a>
                  </li>
                  <li>
                      <a href="#"><i class=" fa fa-film"></i></a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-microphone"></i></a>
                  </li>
              </ul>
          </footer>
      </div>
      <div class="panel">
          <div class="bio-graph-heading">
              I want to learn Portuguese, and meet new friends
          </div>
          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: <?=$firstName?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: <?=$lastName?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Country </span>: Canada</p>
                  </div>
                  
                  <div class="bio-row">
                      <p><span>Language </span>: English</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: <?=$email?></p>
                  </div>
                 
              </div>
              <?php }}?>
          </div>
      </div>
      <div>
          <div class="row">
              <div class="col-md-6">
                  <div class="panel">
                  	<div id="badgeimg"></div>
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="250" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="red">Langwiz Badges</h4>
                              <p>Silver</p>
                              <p>250</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                      	<div id="meetingsimg"></div>
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="15" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="terques">Meetings</h4>
                              <p>Last week: 3</p>
                              <p>Last month 12</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                      <div id="rewardsimg"></div>
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="3652" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="green">Rewards</h4>
                              <p>Stars : 25</p>
                              <p>Points: 3652</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                  <div id="langimg"></div>
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="2" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="purple">Languages</h4>
                              <p>English</p>
                              <p>Spanish</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</body>
</html>
