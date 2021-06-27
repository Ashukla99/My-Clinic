<!DOCTYPE HTML>
	<?php

    // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,
    $username = "navneet";
    $password = "1234";

    // Error message
    $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: home.php');
    } 
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['loggedIn'] = true;
            header('Location: home.php');
        } else {
            $_SESSION['loggedIn'] = false;
		    $error = "Invalid username or password!";
        }
    }
?>
<html>
<head>
<title>madical project</title>
<link rel="shortcut icon" href="IMG/icon.png" type="image/x-icon"></link>
	<script src="boot/jquery.js" type="text/javascript"></script>
    <link href="boot/boot.css" rel="stylesheet" type="text/css"/>
    <script src="boot/boot.js" type="text/javascript"></script>
<style>
 body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
	  font-size: 15px;
	  text-align: center
	  }
.cn
{
text-align: center
}
.cr
{
font-size: 15px;
color: #FF0000;
}
.ck
{
text-align: center
}

.margin 
{
margin-bottom: 25px;
}
  .container-fluid {
      padding-top: 25px;
      padding-bottom: 25px;
	  }
</style>
</head>
<body>
<div class="container">
<div class="container-fluid bg-1 text-center">
  <h1 class="margin cn">HELLO CLINIC!</h1>
<img src="img/icon.png" class="img-circle cn" alt="Cinque Terre" width="130" height="130">
</div>
<div class=col-md-4></div>
<div class=col-md-4>

        <!-- form for login -->
<form method="post" action="index.php">
  <div class="form-group">
    <label for="username">User Name:</label>
    <input type="text" name="username" class="form-control" id="username">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <!-- Output error message if any -->
		<div class="cr">
        <?php echo $error; ?>
        </div>
  <br>
  <button type="submit" value="Log In!" class="btn btn-default">Start &#10148;</button>
</form>
</div>
<div class=col-md-4></div>
</div>
<br>
<br>
<footer class="cn navbar-fixed-bottom bg-4">
<p class="ck">App Made By <a href="https://www.facebook.com/nobi.27" target="_blank">Abhav & Group</a> (7424960472)</p>
</footer>
</body>
</html>