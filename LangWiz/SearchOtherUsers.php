<?php 
require_once 'configurationdb.php';

session_start();
$userName=$_SESSION["userName"];
$userFname=$_SESSION["FName"];
$userLname=$_SESSION["LName"];
$userEmail=$_SESSION["email"];
$userLang=$_SESSION["lang"];
$userCountry=$_SESSION["country"];
$userCity=$_SESSION["city"];
$userBadges=$_SESSION["badges"];

$sqlStmt="Select Photo from users where Username='$userName'";
$queryId=mysqli_query($connection, $sqlStmt);
while($rec=mysqli_fetch_array($queryId))
{
    $userPhoto=$rec["Photo"];
}
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
              <li ><a href="userpage.php"> <i class="fa fa-user"></i> Profile</a></li>
              <li class="active"><a href="SearchOtherUsers.php"> <i class="fa fa-calendar"></i> Meet New People <span class="label label-warning pull-right r-activity">9</span></a></li>
              <li><a data-toggle="modal" data-target="#modalUpdate"> <i class="fa fa-edit"></i> Edit profile</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          <form>
              <textarea id="status" placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
          </form>
          <footer class="panel-footer">
              <button class="btn btn-warning pull-right" onclick="changeStatus()">Post</button>
              
          </footer>
      </div>
      <div class="panel">
          <div id="postedstatus" class="bio-graph-heading">
              I want to learn Portuguese, and meet new friends
          </div>
          <div class="panel-body bio-graph-info">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
                <div id="container">
                  <h2>Select the idioma that you want to paractice</h2>
                <form action="LoginHandler.php" method="get">
                     <div class="form-group row">
                    <label for="inputgroup" class="col-sm-2 col-form-label">Language</label>
                    <div class="col-sm-10">
                    	  <select name="languageSelect" id="languageSelect" onchange="this.form.submit()">
                    	   <option value=""></option>
                    	  <?php  
                    	 
                            $sqlStmt="select LangName from languages";
                            $queryId=mysqli_query($connection, $sqlStmt);
                            
                            while($rec=mysqli_fetch_array($queryId)){
                            $laguages=$rec["LangName"];
                            
                    
                    ?>
                                <option value="<?= $laguages?>"><?= $laguages?></option>
                              <?php }?>
                  		  </select>
                  		  
                    </div>
                    </div>
                   
                 </form>
                 
                 </div>
                 <div id="container2">
                  
                    
                    <table id="table2" class="table table-striped">
                 
                  <tbody>
                  
                  <?php /*
                  $studentid="";$address="";$name="";$photo="";
                  if(isset($_GET["groupselect"])){
                      $groupid=$_GET["groupselect"];
                      $sqlStmt="SELECT `studentid`,`LastName`,`Address`,`photo` FROM `student` WHERE `groupid`=$groupid ";
                      $queryId=mysqli_query($connection, $sqlStmt);
                    while ($rec=mysqli_fetch_array($queryId)){
                      $studentid=$rec["studentid"];
                      $name=$rec["LastName"];
                      $address=$rec["Address"];
                      $photo=$rec["photo"];
                      ?>
                    <tr>            
                      <td><?=$studentid?></td>
                      <td> <?=$name?></td>
                      <td><?=$address?></td>
                      <td>
                		<div class="row">
                          <div class="col-xs-6 col-md-3">
                                      
                               <img src=<?=$photo?> alt="studentphoto"/>
                            
                          </div>
                          
                        </div>
                </td>
                    </tr>
                    <?php }}
                   */ ?>
                  </tbody>
                </table>
                </div>
 
          </div>
      </div>
  </div>
</div>
</div>



<!-- MODAL FOR UPDATE PROFILE -->

<!--Modal-->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div  class="modal-dialog" role="document">
     <form  action="LoginHandler.php" method="get">
    <div class="modal-content" id="boxmodal2">
      <div class="modal-header text-center">
      <h3 class="modal-title w-100 font-weight-bold">Edit Profile Account</h3>
      <h5>Any changes will be visible the next time that you login</h5>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-text">User Name :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="userNameEdit" >
         </div>
		<div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-text">First Name :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="firstNameEdit" >
         </div>
		 <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-text">Last Name :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="LastNameEdit" >
         </div>
          <div class="md-form mb-5">

          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-email">Email :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="emailEdit" >
         </div>
          <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-default" id="createacc" name="editProfile" value="Edit Profile" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
        
</div>
</div>
</form>
</div>
</div>
</div>
</div>

</body>
</html>
