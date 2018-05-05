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


		<form action="ajout_livre.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<h3 style=" margin:35px; text-align: center;">Ajoutez un profil</h3></fieldset>
			<table style="margin: auto;">
			
				<tr>
					<td style="padding: 15px;">
						<label style="display: inline-block; width: 300px;"> Titre du livre </label>
					</td>
					<td>
						<input type="text" name="titre">
					</td>
				</tr>
				<tr>
					<td style="padding: 15px;">
						<label style="display: inline-block; width: 300px;"> auteur </label>
					</td>
					<td>
						<input type="text" name="auteur">
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
			
			$nom_livre = $_POST['titre'];
			$auteur = $_POST['auteur'];
			$nom_livre = strtoupper($nom_livre);
			//image
			$target_dir = "image/";
			$target_file = $target_dir.basename($_FILES["image"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					echo "<div>le fichier". basename( $_FILES["image"]["name"]). " a été uploader.</div>";
    				} 
			else {
        				echo "<div>pas d'image.</div>";
						}
			$sql_add = "insert into livre(titre_livre,auteur,image_livre) VALUES('$nom_livre','$auteur','".basename( $_FILES["image"]["name"])."')";
			$resultat = mysqli_query($link,$sql_add);
			if($resultat) {header("Location: list_livres.php?ajoute=$nom_livre");}
			else echo "Error";
	
			
		}
	
	?>


	</body>

	</html>
