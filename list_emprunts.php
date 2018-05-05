<!DOCTYPE html>
<html lang="">
<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title></title>
	<style>
		table,tr,td{
			border: 1px solid;
			border-color: cornflowerblue;
			border-collapse: collapse;
		}
		table{
			margin: 0px auto;
		}
		#head{
			font-size: 20px;
			font-weight: bold;
			background-color: cornflowerblue;
			
		}
		td{
			padding: 20px;
			text-align: center;
		}
	
	
	</style>
</head>

<body>
				

<?php
session_start();
if(!isset($_SESSION['nom']) and !isset($_SESSION['prenom']) and !isset($_SESSION['id']) ){
	header("Location: index.php");
}
else{
	include("connexion.php");
	$sql = "select * from emprunt";
	$resultat = mysqli_query($link,$sql);
	//pour les info detudiant
	
	echo "<table>";
	echo "<tr id='head'>";
	echo "<td> id emprunte </td>";
	echo "<td> Nom etudiant </td>";
	echo "<td> prénom etudiant </td>";
	echo "<td> titre du livre </td>";
	echo "<td> date d emprunte </td>";
	echo "<td> date du retour </td>";
	echo "</tr>";
	while($data = mysqli_fetch_assoc($resultat)){
		//etudiant
		$sql2 = "select nom,prenom from etudiant where num_apogee =".$data['id_etudiant'];
		$resultat2 = mysqli_query($link,$sql2);
		$data2 = mysqli_fetch_assoc($resultat2);
		//livre
		$sql3 = "select titre_livre from livre where isbn=".$data['id_livre'];
		$resultat3 = mysqli_query($link,$sql3);
		$data3 = mysqli_fetch_assoc($resultat3);

		echo "<tr>";
		echo "<td>".$data['id_emprunt']."</td>";
		echo "<td>".$data2['nom']."</td>";
		echo "<td>".$data2['prenom']."</td>";
		echo "<td>".$data3['titre_livre']."</td>";
		echo "<td>".$data['dt_debut']."</td>";
		echo "<td>".$data['dt_retour']."</td>";
		echo"</tr>";
		
	}
	echo "</table>";
	
	
	
}
?>
	
</body>
</html>