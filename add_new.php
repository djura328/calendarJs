<?php
include "connector.php";
$name=$_POST['name'];
$query=mysqli_query($link, "SELECT name_emission FROM `emission` WHERE name_tv='$name'");
echo "<option></option>";
while($row=mysqli_fetch_array($query)){
	echo "<option>" . $row['name_emission'] . "</option>";
}
?>