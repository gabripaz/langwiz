<html>

<head>
  <title>LangWiz</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src=".\js\geolocalization.js"></script>
  <script type="text/javascript" src=".\js\passwordValidation.js"></script>
  <script type="text/javascript" src=".\js\AjaxGetCities.js"></script>

</head>

<body>
<!--Modal-->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div  class="modal-dialog" role="document">
     <form  action="userpage.php" method="get">
    <div class="modal-content" id="boxmodal">
      <div class="modal-header text-center">
      <h3 class="modal-title w-100 font-weight-bold">Welcome</h3>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-email">User Name :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="userName" required>
         </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Password :</label>
          <input type="password" id="defaultForm-password" class="form-control validate" name="userPassword" required>
          
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-default" id="login" name="Login" value="Login"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!--Modal-->
<div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div  class="modal-dialog" role="document">
     <form  action="createaccount.php" method="get" onsubmit="validatePassword()">
    <div class="modal-content" id="boxmodal2">
      <div class="modal-header text-center">
      <h3 class="modal-title w-100 font-weight-bold">Create an Account</h3>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-text">User Name :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="userName" required>
         </div>
		<div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-text">First Name :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="firstName" required>
         </div>
		 <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-text">Last Name :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="LastName" required>
         </div>
          <div class="md-form mb-5">

          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-email">Email :</label>
          <input type="text" id="defaultForm-text" class="form-control validate" name="email" required>
         </div>
          <div class="md-form mb-5">
         <label data-error="wrong" data-success="right" for="defaultForm-text">Country :</label>
         <select name="countryselect" id="countryselect" class="form-control validate" onchange = "populateOptionsInfo(this)" required>
    	   <option value=""></option>
          <?php  
              require_once 'configurationdb.php';
              $sqlStmt="Select Distinct Country from location ORDER BY Country";
              $queryId=mysqli_query($connection, $sqlStmt);
              while($rec=mysqli_fetch_array($queryId))
              {
                $country=$rec["Country"];              
                echo "<option value='$country'>$country</option>";
               }?>
  		  </select>
  		  </div>
  		  <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-text">City :</label>
          <!-- <input type="text" id="defaultForm-text" class="form-control validate" name="city"> -->
          <select name="cityselect" id="cityselect" class="form-control validate" required>
          
          <?php 
              $country = $_GET[countryId];
              echo "<option id = 'testing' value='hello'></option>";//#testing
              if(!empty($country))
              {  
                echo "<option value='hello'>hello</option>";//#testing
                $sqlStmt="Select Distinct City from location WHERE Country = '$country' ORDER BY City";
                $queryId=mysqli_query($connection, $sqlStmt);
                while($rec2=mysqli_fetch_array($queryId)){
                    $city=$rec2["City"];
                }
              }
                ?>
             </select>
         </div>
		 <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
           <label data-error="wrong" data-success="right" for="defaultForm-email">Mother Language :</label>
          <select name="motherlang" id="motherlang" class="form-control validate">
          <option value=""></option>
            
          <?php 
            $sqlStmt="Select LangName from languages";
            $queryId=mysqli_query($connection, $sqlStmt);
            
            while($rec=mysqli_fetch_array($queryId)){
               $langName=$rec["LangName"];
               echo "<option value='$langName'>$langName</option>";
             }?>
          </select>
         </div>
		 
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Password :</label>
          <input type="password" id="password1" class="form-control validate" name="userPassword"  onkeyup='validatePassword();' required> 
        </div>
		<div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass"> Repeat Password :</label>
          <input type="password" id="password2" class="form-control validate" name="userPasswordconfirm"   onkeyup='validatePassword();' required> 
        </div>
		<div class="md-form mb-4">
          <span id="errorMatch"></span><br/>
          <span id="errorPassw"></span>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-default" id="createacc" name="CreateAcc" value="Create Account" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    </form>
  </div>
</div>




  <div id="main">
    <div id="header">
	
		
      <div id="logo">
		<div id="logoimgenes"></div>
        <div id="logo_text">
		
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Lang<span class="logo_colour">Wiz</span></a></h1>
          <h2>The new way to learn a new language</h2>
		  <div id="loginbox">
		  <button class="buttons" data-toggle="modal" data-target="#modalLogin">Login</button>
		  <button class="buttons" data-toggle="modal" data-target="#modalSignIn">Sign In</button>
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
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
	  <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3>Latest News</h3>
            <h5><strong>Now you can find friends in other countries</strong></h5>
            <h5>October 1st, 2021</h5>
            <p> Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Useful Links</h3>
            <ul>
              <li><a href="https://translate.google.ca">Google Translate</a></li>
              <li><a href="https://www.google.com/">Google</a></li>
              <li><a href="https://www.google.ca/maps">Google Maps</a></li>
              <li><a href="#">link 4</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Search</h3>
            <form method="post" action="#" id="search_form">
              <p>
                <input class="search" type="text" name="search_field" value="Enter keywords....." />
                <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
              </p>
            </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Welcome to <span id="langwiz">LangWiz</span></h1>
        <p>With LangWiz you can learn and practice a new language, find new friends, share and get to know new cultures.</p>
		<p>We already know how complicated it is to practice a new language, especially if you are in a place or surrounded by people who speak the same mother tongue as you, and despite taking language courses there comes a point where you need to put your knowledge into practice.</p>
		<p>That is why LangWiz is created that It allows you to meet another person who speaks the language you want to improve and in turn you can help that person to know and share your language and culture. </p>
        <h2 id="title2">It is time to learn a new language</h2>
        <p>In this Website you can :</p>
        <ul>
          <li>Explore New Cultures</li>
          <li>Meet new frieds</li>
          <li>Learn as many languages as you want</li>
        </ul>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.html">Home</a> | <a href="examples.html">Examples</a> | <a href="page.html">A Page</a> | <a href="another_page.html">Another Page</a> | <a href="contact.html">Contact Us</a></p>
      <p>Copyright &copy;  WebServer Applications| <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | </p>
    </div>
  </div>
  
  
  
</body>
</html>
