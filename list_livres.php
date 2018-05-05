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


	$sql = "select * from livre";
	$resultat = mysqli_query($link,$sql);
	echo "<table>";
	echo "<tr id='head'>";
	echo "<td> Numéro Isbn </td>";
	echo "<td> Titre du livre </td>";
	echo "<td> auteur </td>";
	echo "<td> image du livre </td>";
	while($data=mysqli_fetch_assoc($resultat)){
		echo "<tr>";
		if(isset($_GET['ajoute']) and $_GET['ajoute'] == $data['titre_livre'] ){
			echo "<tr id='ajoute'>";
		}
		echo "<td>".$data['isbn']."</td>";
		echo "<td>".$data['titre_livre']."</td>";
		echo "<td>".$data['auteur']."</td>";
		echo "<td><img src ='image/".$data['image_livre'].".png' alt='pas dimage' </td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
</body>
</html>
s