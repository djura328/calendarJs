<?php
include "connector.php";
	if(isset($_POST['submit']) && !empty($_POST["submit"])){
		//if($_POST['rowCount']==0){
			echo $user=$_POST['user'];
			echo "</br>naziv tv";
			echo $name_tv=$_POST['name_tv'];
			echo "</br>naziv emisije";
			echo $name_emission=$_POST['name_emission'];
			echo "</br> broj clanaka";
			echo $brClanaka=$_POST['brClanaka'];
			echo "</br>trajanje";
			echo $duration=$_POST['duration'];
			echo "</br>datum";
			echo $da=$_POST['datum'];
			echo "</br>id user";
				$dan=date('l',strtotime($da));
			echo $idUser=$_POST['idUser'];
			echo "</br>id emisije - ";
			echo $idEmission=$_POST['idEmission'];
			echo "</br>selekt";
			echo $selekt=$_POST['se'];
			echo "</br>napomena";
			echo $napomena=$_POST['napomena'];
			echo "</br>datum objave";
			echo $date_publish=$_POST['datum_objave'];
			
			//$ch=mysqli_query($link, "SELECT id FROM `broadcast` WHERE date='$da' AND id_user='$idUser' AND id_emission='$idEmission'");
			$ch=mysqli_query($link, "SELECT id FROM `broadcast` WHERE date='$da' AND id_emission='$idEmission'");
			if(mysqli_num_rows($ch)==1){
				$info="Emisija je vec uradjena";
				//header("Location: index2.php?datum=$da&info=$info");
				echo "1";
			}
			else{
				if($selekt==0){
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena, date_publish) VALUES ('$idUser', '$idEmission', '$da', '$duration', '$brClanaka', 'complete', '$napomena', '$date_publish')");
				$info="Emisija je uspesno uneta";
				//header("Location: index2.php?datum=$da&info=$info");
				echo "2";
				}
				else{
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena, date_publish) VALUES ('$idUser', '$idEmission', '$da', '0', '0', 'stuck', '$napomena', '$date_publish')");
				$info="Emisija je uspesno uneta";
				//header("Location: index2.php?datum=$da&info=$info");
				echo "3";
				}
			}
			
		//}
		/*else{
			$info="Emisija je vec uneta u bazu, mozete je samo izmeniti";
			header("Location: index2.php?datum=$da");
			}	 */
	}
?>