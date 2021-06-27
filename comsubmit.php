
<?php
    // Start the session
    ob_start();
    session_start();

    if (!isset($_POST['id']) && $_POST['problem'] == ""&& $_POST['med'] == "") {
        header("Location: index.php");
    } 
	else
	{
		$id=$_POST['id'];
		$problem=$_POST['problem'];
		$med=$_POST['med'];
		mysql_connect("localhost","root","") or die("connection error");
		mysql_select_db("my_clinic") or die("database error");

		$query = mysql_query("INSERT INTO comment (id, problem, med) VALUES ('$id','$problem', '$med')");
		
		var_dump($query);
		
		$query = mysql_query("SELECT * FROM comment WHERE id=$id");
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
			?>
		
			<tr><td><font size="4">Problem: </font><font color="#4d4d4d"> <?php echo $problem; ?></font></td></tr>	
			<tr><td><font size="4">Medicine: </font><font color="#4d4d4d"> <?php echo $med; ?></font></td></tr>
			<tr><td><font size=3 color="grey">time: </font><font size=2 color="grey"><?php echo $time; ?></font></td></tr>
<tr><td><span><a href="#" id="<?php echo $time; ?>" class="delete text-danger" title="Delete">DELETE</a></span></td></tr>
<tr><td><hr></td></tr>
		<?php	
		}
		}
	
	}
?>