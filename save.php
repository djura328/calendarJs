<?php

include "connector.php";

$brClanaka=$_POST['brClanaka'];
$trajanje=$_POST['trajanje'];
$idUser=$_POST['idUser'];
$idArticle=$_POST['idArticle'];
$date=$_POST['date'];
$date_publish=$_POST['date_publish'];
$ch1=mysqli_query($link, "SELECT id FROM `user` WHERE id=$idUser");
$res1=mysqli_fetch_array($ch1);
$ch2=mysqli_query($link, "SELECT id_user FROM `broadcast` WHERE id_emission=$idArticle AND date='$date'");
$res2=mysqli_fetch_array($ch2);
$ch3=mysqli_query($link, "SELECT duration FROM `emission` WHERE id_user=$idUser AND id=$idArticle");
$res3=mysqli_fetch_array($ch3);
if($res1['id']==$res2['id_user']){
	if($trajanje!=$res3['duration']){
	mysqli_query($link, "UPDATE `broadcast` SET duration='$trajanje', article='$brClanaka', status='changed', napomena='', date_publish='$date_publish'	WHERE id_user='$idUser' AND id_emission='$idArticle' AND date='$date'");
	echo "Uspesno prmenjeno";
	}
	else{
	mysqli_query($link, "UPDATE `broadcast` SET duration='$trajanje', article='$brClanaka', status='edited', napomena='', date_publish='$date_publish' WHERE id_user='$idUser' AND id_emission='$idArticle' AND date='$date'");
	echo "Uspesno prmenjeno";
	}
}
else{
	echo "Nemate dozvolu";
}
?>