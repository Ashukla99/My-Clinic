<?php
$con = mysqli_connect('localhost','root','');
if(!$con)
{
 echo 'Not Connected To Server';
}
if (!mysqli_select_db ($con,'my_clinic'))
{
 echo 'Database Not Selected';
}

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$nname = $_POST['nname'];
	$age = $_POST['age'];
	$area = $_POST['area'];

	$sql = "INSERT INTO npatient (fname,lname,nname,age,area) VALUES ('$fname','$lname','$nname','$age','$area')";

if (!mysqli_query($con,$sql))
{
 echo 'Not Inserted';
}
else
{
?>
<div class="typewriter">
<p><b><?php echo 'Patient Added Successfully...';
?>
</b></p><div class="pd"><img src=img/thumb.gif height="120" width="120"></div>
</div>
<?php
}

header("refresh:5; url=home.php");

?>
<style>
/* GLOBAL STYLES */
body {
  background: #333;
  color: #fff;
  font-family: monospace;
  padding-top: 10em;
  display: flex;
  font-size:28px;
  justify-content: center;
}
.pd
{
padding-left:7em;
padding-top: 1em;
}

/* DEMO-SPECIFIC STYLES */
.typewriter p {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 5s steps(25, end),
    blink-caret .35s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange; }
}