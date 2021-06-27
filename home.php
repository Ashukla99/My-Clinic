<!DOCTYPE HTML>
<head>
<title>madical project</title>
<link rel="shortcut icon" href="img/icon.png" type="image/x-icon"></link>
</head>
<?php
    // Start the session
    ob_start();
    session_start();

    // Check to see if actually logged in. If not, redirect to login page
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location: index.php");
    } 
?> 

<?php
mysql_connect("localhost","root","") or die("connection error");
mysql_select_db("my_clinic") or die("database error");
$output = '';
if(isset($_POST['search']))
{
$searchq = $_POST['search'];
$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

$query = mysql_query("SELECT * FROM npatient WHERE fname LIKE '%$searchq%' OR lname LIKE '%$searchq%' OR nname LIKE '%$searchq%'") or die("search error");
$count = mysql_num_rows($query);
if($count == 0) {
$output = 'Match not found!';
}else{
while($row = mysql_fetch_array($query)) {
	$id = $row['id']; 
	$fname = $row['fname'];
	$lname = $row['lname'];
	$nname = $row['nname'];
	$age = $row['age'];
	$area = $row['area'];

	$output .= '<tr><td><a href="http://localhost/my_clinic/profile.php?ptid='.$id.'">'.$fname.' '.$lname.'</a></td><td>'.$nname.'</td><td>'.$age.'</td><td>'.$area.'</td><td><span><a href=duser.php?uid='.$id.' class="delete text-danger confirmation" title="Delete">DELETE</a></span></td></tr>';    
}
}
}
?>

<body oncontextmenu="return false">
<div class="container">
<form method="post" action="logout.php">
<div class=col-md-10></div>
<div class=col-md-2>
	<button type="submit" class="btn btn-danger" align="center" value="Logout">LogOut &nbsp; &#9940;</button></div>
</form>
<br>
<br>
<div class="well well-sm"><div style="text-align: center;">--------WELCOME!--------</div></div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> &#10009; Add new patient!</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Patient?</h4>
        </div>
        <div class="modal-body">
          <form data-toggle="validator" role="form" method="post" action="addpatient.php">
  <div class="form-group">
    <label for="fname">first name :</label>
    <input type="text" name="fname" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="lname">last name :</label>
    <input type="text" name="lname" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="nname">nick name :</label>
    <input type="text" name="nname" class="form-control">
  </div>
  <div class="form-group">
    <label for="age">age :</label>
    <input type="text" name="age" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="area">area :</label>
    <input type="text" name="area" class="form-control" required>
  </div>
  <br>
  <button type="submit" value="insert" class="btn btn-default">Submit >></button>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<br>
<br>
<div class="well well-sm"><div style="text-align: center;">--------All patient!--------</div></div>
<br>
<form method="post" action="home.php">
<div class=col-md-10>
<input type="text" name="search" placeholder="search for patient...." class="form-control"">
</div
<div class=col-md-2>
<input type="submit" value="search  &#128269; " class="btn btn-success" />
</div>
</form>
<br>
<br>
<div class=col-md-4></div>
<div class=col-md-4>
<table class="table table-bordered">
<th><u>Patient Name</u></th>
<th><u>Nick name</u></th>
<th><u>Age</u></th>
<th><u>Area</u></th>
<th><u>Action</u></th>
<?php print("$output"); ?>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
<div class=col-md-4></div>
<br>
<br>
<br>
<br>
</div>
<footer class="cn navbar-fixed-bottom bg-4">
  <p class="ck">App Made By <a href="https://www.facebook.com/nobi.27" target="_blank">Abhav & Group</a> (7424960472)</p> 
</footer>
<body>
<style>

 .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
	  font-size: 15px;
	  text-align: center
	  }
.red
{
color:red;
text-align:center;
}
.ck
{
text-align: center
}

</style>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure? \n you want to delete all the data of this patient?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
	<script src="boot/jquery.js" type="text/javascript"></script>
    <link href="boot/boot.css" rel="stylesheet" type="text/css"/>
    <script src="boot/boot.js" type="text/javascript"></script>
</html>