<?php
$mysqli = new mysqli('db', 'root', 'example', 'chat');

if ($mysqli->connect_error) {
	die('Erreur de connexion à la base de données (' . $mysqli->connect_errno . ') '
		. $mysqli->connect_error);
}

$recupMessages = $mysqli->query("SELECT * FROM utilisateurchat");
while ($messages = $recupMessages->fetch_assoc()) {
?>
<div class="message">
	<h4><?= strtoupper($messages['pseudoUtilisateur']); ?></h4>
	<p><?= $messages['messageUtilisateur']; ?></p><span class="heure"><?= $messages['heure']; ?></span><br>
</div>
<?php
}

$mysqli->close();
?>


