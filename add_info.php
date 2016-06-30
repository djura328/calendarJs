<?php
include "connector.php";
$name=$_POST['name'];
$name_emission=$_POST['name_emission'];

$query=mysqli_query($link, "SELECT duration, time, id FROM `emission` WHERE name_tv='$name' AND name_emission='$name_emission'");
while($row=mysqli_fetch_array($query)){
	 $return_data['a']=$row['duration'];
	 $return_data['b']=$row['time'];
	 $return_data['c']=$row['id'];
}


echo json_encode($return_data);
?>