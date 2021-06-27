<!DOCTYPE HTML>
<head>
<title>madical project</title>
<link rel="shortcut icon" href="img/icon.png" type="image/x-icon"></link>
</head>
<body oncontextmenu="return false">
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
$iduse=$_GET['ptid'];
mysql_connect("localhost","root","") or die("connection error");
mysql_select_db("my_clinic") or die("database error");
$output = '';


$query = mysql_query("SELECT * FROM npatient WHERE id=$iduse") or die("search error");
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
}
}

?>
<div class="container">
<form method="post" action="logout.php">
<div class=col-md-10><a href="home.php" type="button" class="btn btn-default"> &#8656; back</a></div>
<div class=col-md-2>
	<button type="submit" class="btn btn-danger" align="center" value="Logout">LogOut &nbsp; &#9940;</button></div>
</form>
<br>
<br>
<div class="well well-sm"><div style="text-align: center;">--------PROFILE!--------</div></div>
</div>
<div class=col-md-2></div>
<div class="col-md-4 boxx">
<label>Patient name :<font color="grey"> <?php echo $fname." ".$lname?></font></label>
<br><label>nickname :<font color="grey"> <?php echo $nname?></font></label>
<br><label>Patient age :<font color="grey"> <?php echo $age?></font></label>
<br><label>Address :<font color="grey"> <?php echo $area?></font></label>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="well well-sm"><div style="text-align: center;">--------UPDATES!--------</div></div>

 <div class="col-md-2"></div>
 <div class="col-md-8">
 <div id="comsec">
<table>
<?php
$query = mysql_query("SELECT * FROM comment WHERE id=$id");
$result = mysql_query("SELECT * FROM comment ORDER BY id ASC");
		$count = mysql_num_rows($query);
		if($count == 0) {
		
		}
		else{
		while($row = mysql_fetch_array($query))
			{
			$id = $row['id'];			
			$med = $row['med'];
			$problem = $row['problem'];
			$time = $row['time'];
			$sno = $row['sno'];
			?>
<div class="show">
			<tr><td><font size="4">Problem: </font><font color="#4d4d4d"> <?php echo $problem; ?></font></td></tr>	
			<tr><td><font size="4">Medicine: </font><font color="#4d4d4d"> <?php echo $med; ?></font></td></tr>
			<tr><td><font size=3 color="grey">time: </font><font size=2 color="grey"><?php echo $time; ?></font></td></tr>
<tr><td><span><a href="#" id="<?php echo $time; ?>" class="delete text-danger" title="Delete">DELETE</a></span></td></tr>
<tr><td><hr></td></tr>
</div>
		<?php	
		}
		}
		
		?>
		

</table>
</div>
<hr>
<form data-toggle="validator" role="form">
 <div class="form-group">
<div class="col-xs-12">
     <label>PROBLEM :</label>
    <input type="text" id="problem" name="problem" class="form-control" required>
</div>
  </div>
 <div class="form-group">
<div class="col-xs-8">
     <label>MEDICINE :</label>
    <textarea type="text" id="med" name="medicine" class="form-control" required></textarea>
</div>
</div>
<div class="col-xs-4">
</div>
<br>
<br>
<br>
<br>
<br>
<div class="col-xs-2">
   <button type="button" value="insert" onclick="comment()" class="btn btn-default"> ADD >></button>
</div>
<br>
<hr>
<br>
<br>
  </div>
  </form>
   <div class="col-md-2"></div>
<footer class="cn navbar-fixed-bottom bg-4">
  <p class="ck">App Made By <a href="https://www.facebook.com/nobi.27" target="_blank">Abhav & Group</a> (7424960472)</p> 
</footer>
</body>
<style>
.boxx {
    width: 320px;
    padding: 10px;
    border: 2px solid black;
    margin: 0px;
}
 .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
	  font-size: 15px;
	  text-align: center
	  }
.ck
{
text-align: center
}
</style>

	<script src="boot/jquery.js" type="text/javascript"></script>
	<script>
	function comment()
	{
		var med=$("#med").val();
		var problem=$("#problem").val();
		var id=<?php echo $_GET['ptid']; ?>;
		    $.ajax({
                 url:"comsubmit.php",
                 type:"POST",
                 async:true,
                 data:{
                   "med":med,
                   "problem":problem,
		   "id":id  
                 },
                 success: function(d){
					$("#comsec").html(d);
					$("#med").val("");
					$("#problem").val("");

                 }
               });
	}
	</script> 
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "delete.php",
   data:{ "id":info  },
   success: function(data){
	   location.reload();
 }
});
  $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});
</script>
    <link href="boot/boot.css" rel="stylesheet" type="text/css"/>
    <script src="boot/boot.js" type="text/javascript"></script>
</html>