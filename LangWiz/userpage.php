<?php 

session_start();
$userName=$_SESSION["userName"];
$userFname=$_SESSION["FName"];
$userLname=$_SESSION["LName"];
$userPhoto=$_SESSION["Photo"];
$userEmail=$_SESSION["email"];
$userLang=$_SESSION["lang"];
$userCountry=$_SESSION["country"];
$userCity=$_SESSION["city"];
$userBadges=$_SESSION["badges"];


?>
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
	  <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	  <script type="text/javascript" src="js/upload.js"></script>
	
</head>

<body>

<div id="main">
    <div id="header">
	
		
      <div id="logo">
		<div id="logoimgenes"></div>
        <div id="logo_text">
		
         
          <h1><a href="index.html">Lang<span class="logo_colour">Wiz</span></a></h1>
          <h2>The new way to learn a new language</h2>
		  <div id="loginbox">

		 
		  <form method="get" action="LoginHandler.php">
		  	 	<input type="submit" class="buttons" name="logOut" value="Log Out"></input>
		  </form>
		  </div>
		   <div class="clr"></div>
        </div>
      </div>
	 







 <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<div id="UserAccContainer" class="container bootstrap snippets bootdey" >
<div class="row">
  <div class="profile-nav col-md-3">
      <div  class="panel">
          <div class="user-heading round">
             <!-- Here after we can include the option to change the picture -->
             
              
                  <div id='preview'><?php echo "<img id='userpicture' src='$userPhoto' class='preview'>"?></div>	
				<form id="image_upload_form" method="post" enctype="multipart/form-data" action='image_upload.php' autocomplete="off">
					<div class="file_input_container">
						<div class="upload_button"><input type="file" name="photo" id="photo" class="file"/>
						<label for="photo">Change Picture</label></div>
					</div><br clear="all">
				</form>
             
              <h1><?=$userName?></h1>
              <h2><?php echo "$userFname  $userLname"?></h2>
              <p><?=$userEmail?></p>
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
              <h1>Your Information</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: <?=$userFname?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: <?=$userLname?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Country </span>:<?=$userCountry?></p>
                       <p><span>City </span>:<?=$userCity?></p>
                  </div>
                  
                  <div class="bio-row">
                      <p><span>Language </span>:<?=$userLang?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: <?=$userEmail?></p>
                  </div>
                 
              </div>
             
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
                              <p><?=$userBadges?>Silver</p>
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
                              <h4 class="purple">Language</h4>
                              <p><?=$userLang?></p>
                              
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
