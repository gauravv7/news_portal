<?php


mysql_select_db ("*****", $con);
$aa=$_POST['lit'];
print_r($aa);
echo$rr="grp_".implode('_',$aa);
echo$bb=$_POST['ank'];




$con = mysql_connect("localhost", "ebangup_tanuj", "lokesh@4321");
if (!$con)
{
die('Could not connect to DB: ' . mysql_error() );
}
mysql_select_db ("ebangup_signup", $con);
$sql="INSERT INTO profile (profile_name,date)
VALUES ('$rr',now())";
if (!mysql_query($sql,$con))
{
die ('Error: ' . mysql_error());
}
echo "Record added";
mysql_close($con)
?>