<?php
mysql_connect("localhost","root","") or die("connection error");
mysql_select_db("my_clinic") or die("database error");
if($_POST['id'])
{
$tym=mysql_real_escape_string($_POST['id']);
$delete = "DELETE FROM comment WHERE time='$tym'";
$new=mysql_query( $delete);
echo $new;
}
?>