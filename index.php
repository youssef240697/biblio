<?php
	session_start();
	if(isset($_SESSION['id_gestion'])){
		header("location:menu.php");
	}
?>
<html>
<head>
<meta charset="utf_8" />
<title>index </title>
</head>

<body>
<h3> Formulaire d'inscription</h3>
<form action="index.php" method="post">
<table >
  <tr>
    <td>Login:</td>
    <td><input type="text" name= "login" size="20"></td>
  </tr>
  <tr>
    <td>Mot de Passe:</td>
    <td><input type="password" name="pass" size="20" id="pass"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="valider" id="valider" value="Envoyer"></td>
    </tr>
</table>
</form>
	<?php
	if(isset($_POST['valider'])){
		include('connexion.php');
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$sql = "select * from gestionaire where login='$login' and pass= '$pass'";
		$result_check = mysqli_query($link,$sql);
	
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result_check);
    // si row egal a 1 resultat vrai 
    if($count==1){
		$check = mysqli_fetch_assoc($result_check);
        // redirection admin" et info dont on a besoin
		$_SESSION['id_gestion'] = $check['id_gestionaire']; // si il est admin
		$_SESSION['prenom'] = $check['prenom'];
		$_SESSION['nom'] = $check['nom'];
        header("location:menu.php");
    }
    else {
        echo "mot de passe ou email incorrecte";
    }
	
	}
	?>



</body>
</html>