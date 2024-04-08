<?php
$msg = "Saisie obligatoire";
$logins = array('jean_valjean@academie.net' => "hugo", 'steve_ostin@lesseries.org' => "3md", 'david_banner@marvel.com' => "hulk");
var_dump($_POST);
if(isset($_POST['cmd_valid'])){
	$msg="";
	if(empty($_POST['mail'])){
		$msg.= "Le champs doit etre renseigné <br>";
	}
	if (empty($_POST['password'])) {
		$msg .= "Le Champs password doit etre saisie <br>";
	}
	if(!empty($_POST['mail']) && !empty($_POST['password'])){
		if(array_key_exists($_POST['mail'], $logins) && $logins[$_POST['mail']] === $_POST['password']){
						
				//$msg .= "";	
				setcookie('id', $_POST['mail'], time() + 3600);
				header('Location:form2.php');

		}else{
			$msg .= "Erreur d'indentification";	
		}
	}

}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Redirection après Traitement</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
	<link rel="stylesheet" href="./css/style.css" />
</head>

<body>
	<h2>Identifiez-vous</h2>
	<br>
	<div class='MonTableau'>
		<form method="post">
			<table class='table table-bordered table-dark table-hover'>
				<tr>
					<td class="MonLabel">Email</td>
					<td><input type="text" name="mail" autocomplete="false"></td>
				</tr>
				<tr>
					<td class="MonLabel">Mot de passe</td>
					<td><input type="password" name="password" value="" autocomplete="false"></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2"><input class="btn btn-sample" type="submit" name="cmd_valid" value="Valider">
						<input class="btn btn-sample" type="reset" id="reset" name="reset" value="Annuler">
					</td>
					<td><i id="message"><?php echo $msg; ?></i></td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>