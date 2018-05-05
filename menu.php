<?php
	session_start();
	if(!isset($_SESSION['id_gestion'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<style>
					div{
						background-color:azure;
						display: block;
						border: 1px solid black;
						font-size: 100px;
						margin: auto;
						width: 50%;
						
					}
					a{
						text-decoration:none;
						color: black;
					}
					a:hover{
						color:aqua;
					}
				</style>
				<title></title>
</head>

<body>
				

<?php
echo "<h3>Gestionnaire connecté(e) :  <h1>".$_SESSION['prenom']." ".$_SESSION['nom']."</h1></h3>";
echo "<a style='font-weight:bold;' href='logout.php'>Déconnecter</a>";
echo "<div><a href='list_etudiants.php'>liste étudiants</a></div><br>";
echo "<div><a href='list_livres.php'>liste livres</a></div><br>";
echo "<div><a href='list_empruntes.php'>liste empruntes</a></div><br>";
echo "<div><a href='ajout_livre.php'>ajouter un livre</a></div><br>";
echo "<div><a href='ajout_etudiant.php'>ajouter un etudiant</a></div><br>";
echo "<div><a href='ajout_emprunte.php'>ajouter un emprunte</a></div><br>";

?>
	
	</body>
</html>
