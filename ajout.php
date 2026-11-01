<?php
require_once("conn.php");
if (isset($_POST['titre'])) {
$req = $conn->prepare("INSERT INTO exercice (titre, auteur, date_creation) VALUES (?, ?, ?)");
$req->execute([$_POST['titre'], $_POST['auteur'], $_POST['date_creation']]);
}
header("Location: exercice.php");
?>
