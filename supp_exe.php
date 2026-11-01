<?php
require_once("conn.php");
if (isset($_GET['id'])) {
$id = $_GET['id'];
$req = $conn->prepare("DELETE FROM exercice WHERE id = ?");
$req->execute([$id]);
}
header("Location: exercice.php");
?>
