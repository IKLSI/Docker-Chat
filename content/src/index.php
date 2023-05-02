<?php

$mysqli = new mysqli('db', 'root', 'example', 'chat');
if ($mysqli->connect_error) {
	die('Erreur de connexion (' . $mysqli->connect_errno . ') '
		. $mysqli->connect_error);
}

if (isset($_POST['valider'])) {
	if (!empty($_POST['pseudo'])) {
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$message = nl2br(htmlspecialchars($_POST['message']));
		$heure = date('Y-m-d H:i:s', strtotime('+2 hours'));
		$insererMessage = $mysqli->prepare("INSERT INTO utilisateurchat(pseudoUtilisateur, messageUtilisateur, heure) VALUES(?, ?, ?)");
		$insererMessage->bind_param("sss", $pseudo, $message, $heure);
		$insererMessage->execute();
	} else {
		$erreur = "Veuillez entrer un pseudo";
	}
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Messagerie instantanée</title>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		header {
			background-color: #333;
			color: #fff;
			padding: 20px;
			text-align: center;
		}

		.container {
			margin: 50px auto;
			padding: 20px;
			width: 80%;
			border: 1px solid #333;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}

		form {
			display: flex;
			flex-direction: column;
			margin-bottom: 20px;
		}

		input[type="text"], textarea {
			margin-bottom: 10px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0,0,0,0.2);
			resize: none;
			font-size: 16px;
		}

		input[type="submit"] {
			background-color: #333;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0,0,0,0.2);
			cursor: pointer;
			font-size: 16px;
		}

		#messages {
			padding: 10px;
			height: 400px;
			overflow-y: scroll;
			border: 1px solid #333;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0,0,0,0.2);
		}

		.message {
			margin-bottom: 10px;
			padding: 10px;
			background-color: #eee;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0,0,0,0.2);
		}

		.message h4 {
			margin-top: 0;
			margin-bottom: 5px;
			font-size: 16px;
			font-weight: bold;
		}

		.message p {
			margin-top: 0;
			margin-bottom: 0;
			font-size: 14px;
		}

		.message span {
			font-style : italic;
			font-size: 12px;
			color: grey;
			float: right;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<header>
		<h1>Bienvenue sur notre messagerie instantanée</h1>
		<p>Ici, vous pouvez discuter avec vos amis en temps réel !</p>
	</header>

	<div class="container">
		<form method="post" action="">
			<input type="text" name="pseudo" placeholder="Votre nom">
			<textarea name="message" placeholder="Votre message"></textarea>
			<input type="submit" name="valider" value="Envoyer">
		</form>
		<section id="messages">
		</section>
	</div>

	<script>
		setInterval(load_messages, 500);

		function load_messages() {
			$('#messages').load('loadMessages.php');
		}
	</script>
</body>
</html>
