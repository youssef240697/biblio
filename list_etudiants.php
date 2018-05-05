<?php
	session_start();
	if(!isset($_SESSION['id_gestion'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="">
<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title></title>
<style>
	
	table,tr,td{
		margin: auto;
		width: 50%;
		border: 1px solid cornflowerblue;
		color: black;
	}
	#head{
		color:cornflowerblue;
		font-size:20px;
		background-color: skyblue;
	}
	#ajoute{
		background-color: yellow;
	}
	</style>
	
</head>

<body>
				

<?php
	include("connexion.php");


	$sql = "select * from etudiant";
	$resultat = mysqli_query($link,$sql);
	echo "<table>";
	echo "<tr id='head'>";
	echo "<td>Numéro Apogée</td>";
	echo "<td>Nom</td>";
	echo "<td>Prénom</td>";
	echo "<td>Photo</td>";
	while($data=mysqli_fetch_assoc($resultat)){
		echo "<tr>";
		if(isset($_GET['ajoute']) and $_GET['ajoute'] == $data['num_apogee'] ){
			echo "<tr id='ajoute'>";
		}
		echo "<td>".$data['num_apogee']."</td>";
		echo "<td>".$data['nom']."</td>";
		echo "<td>".$data['prenom']."</td>";
		echo "<td><img src ='photo/".$data['image'].".png' alt='pas dimage' </td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
</body>
</html>
