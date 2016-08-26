<?php

function getNameEmission(){
	include "/../connector.php";
	
	$res=mysqli_query($link, "SELECT * FROM `emission` WHERE id='4'");
	while($fi=mysqli_fetch_array($res)){
	$a = $fi['name_tv'] . " " . $fi['name_emission'];	
	}
	return $a;
}

?>