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


		<form action="ajout_etudiant.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<h3 style=" margin:35px; text-align: center;">Ajoutez un profil</h3></fieldset>
			<table style="margin: auto;">
				<tr>
					<td style="padding: 15px;">
						<label style="display: inline-block; width: 300px;"> numéro apogée </label>
					</td>
					<td>
						<input type="text" pattern="[0-9]{9}" name="num_apogee">
					</td>
				</tr>
				<tr>
					<td style="padding: 15px;">
						<label style="display: inline-block; width: 300px;"> Le nom </label>
					</td>
					<td>
						<input type="text" name="nom">
					</td>
				</tr>
				<tr>
					<td style="padding: 15px;">
						<label style="display: inline-block; width: 300px;"> Le Prenom </label>
					</td>
					<td>
						<input type="text" name="prenom">
					</td>
				</tr>
				
				<tr>
					<td style="padding: 15px;">
						<label style="display: inline-block; width: 300px;"> Photo </label>
					</td>
					<td>
						<input type="file" name="image">
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
			
			$num_apogee = $_POST['num_apogee'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$nom = strtoupper($nom);
			$prenom = strtoupper($prenom);
			//image
			$target_dir = "photo/";
			$target_file = $target_dir.basename($_FILES["image"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					echo "<div>le fichier". basename( $_FILES["image"]["name"]). " a été uploader.</div>";
    				} 
			else {
        				echo "<div>pas d'image.</div>";
						}
			$sql_add = "insert into etudiant(num_apogee,nom,prenom,image) VALUES('$num_apogee','$nom','$prenom','".basename( $_FILES["image"]["name"])."')";
			$resultat = mysqli_query($link,$sql_add);
			if($resultat) {header("Location: list_etudiants.php?ajoute=$num_apogee");}
			else echo "Error";
	
			
		}
	
	?>


	</body>

	</html>
