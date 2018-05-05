<?php
session_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title></title>
</head>

<body>
			<form action="Ajouter_etudiant.php" method="post" enctype="multipart/form-data">
                    <fieldset><h3 style=" margin:35px; text-align: center;">Ajoutez un étudiant</h3></fieldset>
                        <table style="margin: auto;">
						<tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">numéro apogée : </label></td>
                        <td><input type="text" name="num_apogee" ></td></tr>
							<tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">Nom : </label></td>
                        <td><input type="text" name="nom" ></td></tr>
							<tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">prénom : </label></td>
                        <td><input type="text" name="prenom" ></td></tr>
                        <tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">photo : </label></td>
                        <td><input type="file" name="image"></td></tr>
						
                        <tr><td></td><td><input type="submit" name="envoyer" value="Ajouter"></td></tr>
                        </table>
                </form>	
</body>
	
	
	
	<?php
	if(isset($_POST['envoyer'])){
		include("connexion.php");
		$num_apogee = addslashes($_POST['num_apogee']);
		$nom = addslashes($_POST['nom']);
		$prenom = addslashes($_POST['prenom']);
		
		$target_dir = "photo/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["image"]["tmp_name"]);
    	if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		   && $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			} else {
        echo "Sorry, there was an error uploading your file.";
			}
		}
		//check si etudiant deja dans basename
		$sql = "select * from etudiant where num_apogee = $num_apogee";
		$resultat = mysqli_query($link,$sql);
		if(mysqli_num_rows($resultat) == 0){
		
		//insere
		$sql = "insert into etudiant(num_apogee,nom,prenom,image) VALUES('$num_apogee','$nom','$prenom','".basename($_FILES["image"]["name"])."')";
		$resultat = mysqli_query($link,$sql);
		if($resultat) header("Location: list_etudiants.php");
	}
		else{
			echo "etudiant deja dans base";
		}
	}
	
	
	
	?>
</html>
s