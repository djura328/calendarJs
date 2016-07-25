<?php
include "connector.php";
	if(isset($_POST['submit']) && !empty($_POST["submit"])){
		//if($_POST['rowCount']==0){
			$user=$_POST['user'];
			$name_tv=$_POST['name_tv'];
			$name_emission=$_POST['name_emission'];
			$brClanaka=$_POST['brClanaka'];
			$duration=$_POST['duration'];
			$da=$_POST['datum'];
				$dan=date('l',strtotime($da));
			$idUser=$_POST['idUser'];
			$idEmission=$_POST['idEmission'];
			$selekt=$_POST['se'];
			$napomena=$_POST['napomena'];
			
			//$ch=mysqli_query($link, "SELECT id FROM `broadcast` WHERE date='$da' AND id_user='$idUser' AND id_emission='$idEmission'");
			$ch=mysqli_query($link, "SELECT id FROM `broadcast` WHERE date='$da' AND id_emission='$idEmission'");
			if(mysqli_num_rows($ch)==1){
				$info="emisija je vec uradjena";
				header("Location: index2.php?datum=$da&info=$info");
				//echo "1";
			}
			else{
				if($selekt==0){
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena) VALUES ('$idUser', '$idEmission', '$da', '$duration', '$brClanaka', 'complete', '$napomena')");
				header("Location: index2.php?datum=$da");
				//echo "2";
				}
				else{
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena) VALUES ('$idUser', '$idEmission', '$da', '0', '0', 'stuck', '$napomena')");
				header("Location: index2.php?datum=$da");
				//cho "3";
				}
			}
			
		//}
		/*else{
			$info="Emisija je vec uneta u bazu, mozete je samo izmeniti";
			header("Location: index2.php?datum=$da");
			}	 */
	}
?>