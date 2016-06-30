<?php
include "connector.php";
	if(isset($_POST['submit']) && !empty($_POST["submit"])){
		//if($_POST['rowCount']==0){
			echo "user:" . $user=$_POST['user'] . "</br>";
			echo "name tv :" .$name_tv=$_POST['name_tv']. "</br>";
			echo "name emison:" . $name_emission=$_POST['name_emission']. "</br>";
			echo "br calnaka:" . $brClanaka=$_POST['brClanaka']. "</br>";
			echo "duration:" .$duration=$_POST['duration']. "</br>";
			echo "datum:" .$da=$_POST['datum']. "</br>";
				$dan=date('l',strtotime($da));
			echo "id user:" .$idUser=$_POST['idUser']. "</br>";//
			echo "id emison:" .$idEmission=$_POST['idEmission']. "</br>";//
			echo "selekt:" .$selekt=$_POST['se']. "</br>";
			echo "napomena:" .$napomena=$_POST['napomena']. "</br>";
			
			$ch=mysqli_query($link, "SELECT id FROM `broadcast` WHERE date='$da' AND id_user='$idUser' AND id_emission='$idEmission'");
			if(mysqli_num_rows($ch)==1){
				//header("Location: index2.php?datum=$da");
				echo "1";
			}
			else{
				if($selekt==0){
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena) VALUES ('$idUser', '$idEmission', '$da', '$duration', '$brClanaka', 'complete', '$napomena')");
				//header("Location: index2.php?datum=$da");
				echo "2";
				}
				else{
				mysqli_query($link, "INSERT INTO `broadcast` (id_user, id_emission, date, duration, article, status, napomena) VALUES ('$idUser', '$idEmission', '$da', '0', '0', 'stuck', '$napomena')");
				//header("Location: index2.php?datum=$da");\
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