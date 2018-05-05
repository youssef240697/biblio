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
		table,
		tr,
		td {
			margin: auto;
			width: 50%;
			border: 1px solid cornflowerblue;
			color: black;
		}
		
		#head {
			color: cornflowerblue;
			font-size: 20px;
			background-color: skyblue;
		}

	</style>






</head>

<body>


	<form action="ajout_emprunte.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<h3 style=" margin:35px; text-align: center;"> ajouter une emprunte </h3></fieldset>
		<table style="margin: auto;">
			<tr>
				<td style="padding: 15px;">
					<label style="display: inline-block; width: 300px;"> etudiant </label>
				</td>
				<td>
					<select name="id_etudiant">
							<?php
							include('connexion.php');
							$sql = "select num_apogee,nom,prenom from etudiant";
							$resultat = mysqli_query($link,$sql);
							while($data = mysqli_fetch_assoc($resultat)){
								echo "<option value='".$data['num_apogee']."'>".$data['nom']." ".$data['prenom']."</option>";
							}
							?>


					</select>
				</td>
			</tr>
			<tr>
				<td style="padding: 15px;">
					<label style="display: inline-block; width: 300px;"> Livre emprunté </label>
				</td>
				<td>
					<select name="id_livre">
							<?php
							include('connexion.php');
							$sql = "select isbn,titre_livre from livre";
							$resultat = mysqli_query($link,$sql);
							while($data = mysqli_fetch_assoc($resultat)){
								echo "<option value='".$data['isbn']."'>".$data['titre_livre']."</option>";
							}
							?>


					</select>
				</td>
			</tr>
			<tr>
				<td style="padding: 15px;">
					<label style="display: inline-block; width: 300px;"> Date d'emprunt </label>
				</td>
				<td>
					<input type="date" name="dt_emprunt">
				</td>
			</tr>
			<tr>
				<td style="padding: 15px;">
					<label style="display: inline-block; width: 300px;"> Date de retour </label>
				</td>
				<td>
					<input type="date" name="dt_retour">
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="envoyer" value="Ajouter">
				</td>
			</tr>
		</table>
	</form>
	
	
	<?php
		include('connexion.php');
		if(isset($_POST['envoyer'])){
			
			$id_etudiant = $_POST['id_etudiant'];
			$isbn = $_POST['id_livre'];
			$dt_emprunt = $_POST['dt_emprunt'];
			$dt_retour = $_POST['dt_retour'];
			
			$sql_add = "insert into emprunt(id_etudiant,id_livre,dt_debut,dt_retour,id_gestionaire) VALUES('$id_etudiant','$isbn','$dt_emprunt','$dt_retour',".$_SESSION['id_gestion'].")";
			$resultat = mysqli_query($link,$sql_add);
			if($resultat) {header("Location: list_empruntes.php?ajoute=$id_etudiant");}
			else echo "Error";
	
			
		}
	
	?>
	
	
</body>

</html>
