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
	$sql = "select * from emprunt";
	$resultat = mysqli_query($link,$sql);
	echo "<table>";
	echo "<tr id='head'>";
	echo "<td>id emprunt</td>";
	echo "<td> Nom étudiant </td>";
	echo "<td> Prénom étudiant </td>";
	echo "<td> Titre livre emprunté </td>";
	echo "<td> Date emprunt </td>";
	echo "<td> Date retour </td>";
	while($data=mysqli_fetch_assoc($resultat)){
			
		//pour lid etudiant
		$sql_etudiant = "select nom,prenom from etudiant where num_apogee=".$data['id_etudiant'];
		$id = mysqli_query($link,$sql_etudiant);
		$data_etudiant = mysqli_fetch_assoc($id);
			
		//pour le livre
		$sql_livre = "select titre_livre from livre where isbn=".$data['id_livre'];
		$id = mysqli_query($link,$sql_livre);
		$data_livre = mysqli_fetch_assoc($id);
		
		echo "<tr>";
		if(isset($_GET['ajoute']) and $_GET['ajoute'] == $data['id_etudiant'] ){
			echo "<tr id='ajoute'>";
		}
		echo "<td>".$data['id_emprunt']."</td>";
		echo "<td>".$data_etudiant['nom']."</td>";
		echo "<td>".$data_etudiant['prenom']."</td>";
		echo "<td>".$data_livre['titre_livre']."</td>";
		echo "<td>".$data['dt_debut']."</td>";
		echo "<td>".$data['dt_retour']."</td>";
		echo "</tr>";
		$check_ajoute = 0;
	}
	echo "</table>";
	?>
</body>
</html>
