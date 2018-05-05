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
			<form action="Ajouter_emprunt.php" method="post" enctype="multipart/form-data">
                    <fieldset><h3 style=" margin:35px; text-align: center;">Ajoutez une	 emprunte</h3></fieldset>
                        <table style="margin: auto;">
                        <tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">étudiant</label></td>
							<td><select name="id_etudiant" size="1">
							<?php
								include("connexion.php");
								$sql = "select * from etudiant";
								$resultat = mysqli_query($link,$sql);
								while($data = mysqli_fetch_assoc($resultat)){
									echo "<option value='".$data['num_apogee']."'>".$data['nom']." ".$data['prenom']."</option>";
								}
								?>
						</select>
							 </td></tr>
							<tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">titre du livre</label></td>
							<td><select name="isbn" size="1">
							<?php
								include("connexion.php");
								$sql = "select * from livre";
								$resultat = mysqli_query($link,$sql);
								while($data = mysqli_fetch_assoc($resultat)){
									echo "<option value='".$data['isbn']."'>".$data['titre_livre']."</option>";
								}
								?>
						</select>
							 </td></tr>
						<tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">Date emprunte : </label></td>
                        <td><input type="date" name="dt_debut" ></td></tr>
                        <tr><td style="padding: 15px;"><label style="display: inline-block; width: 300px;">Date retour : </label></td>
                        <td><input type="date" name="dt_retour"></td></tr>
						
                        <tr><td></td><td><input type="submit" name="envoyer" value="Ajouter"></td></tr>
                        </table>
                </form>	
</body>
	
	
	
	<?php
	if(isset($_POST['envoyer'])){
		include("connexion.php");
		$num_apogee = addslashes($_POST['id_etudiant']);
		$isbn = addslashes($_POST['isbn']);
		$dt_debut = addslashes($_POST['dt_debut']);
		$dt_retour = addslashes($_POST['dt_retour']);
		//insere
		$sql = "insert into emprunt(id_etudiant,id_livre,dt_debut,dt_retour,id_gestionaire) VALUES('$num_apogee','$isbn','$dt_debut','$dt_retour','".$_SESSION['id']."')";
		$resultat = mysqli_query($link,$sql);
		if($resultat) header("Location: list_emprunts.php");
	}
	
	
	
	?>
</html>
