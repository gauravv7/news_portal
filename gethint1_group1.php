<?php
include("opendb.php");
// get the q parameter from URL
echo $new_grp=$_REQUEST["new_grp"]; 
$query1 = "SELECT sno FROM grouptable WHERE group_name = '$new_grp'";
 $result1  = mysql_query($query1) or die(mysql_error());
 $num = mysql_num_rows($result1);
while($row1 = mysql_fetch_array($result1)){
 $group_name = $row1[0];
}

if($num != '0'){
echo "This Groupname is already in use";


}
else{

}
?>