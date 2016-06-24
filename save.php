<?php

include "connector.php";

$brClanaka=$_POST['brClanaka'];
$trajanje=$_POST['trajanje'];
$idUser=$_POST['idUser'];
$idArticle=$_POST['idArticle'];
$date=$_POST['date'];
mysqli_query($link, "UPDATE `broadcast` SET duration='$trajanje', article='$brClanaka' WHERE id_user='$idUser' AND id_emission='$idArticle' AND date='$date'");
?>