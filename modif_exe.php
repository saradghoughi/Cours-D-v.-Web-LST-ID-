<?php
require_once("conn.php");
if (isset($_POST['modifier'])) {
$req = $conn->prepare("UPDATE exercice SET titre = ?, auteur = ?, date_creation = ? WHERE id = ?");
$req->execute([$_POST['titre'], $_POST['auteur'], $_POST['date_creation'], $_POST['id']]);
header("Location: exercice.php");
}
// lien <a href="..."> envoie TOUJOURS une requête GET. Un lien ne peut jamais envoyer de POST
 elseif (isset($_GET['id'])) {
 $req = $conn->prepare("SELECT * FROM exercice WHERE id = ?");
$req->execute([$_GET['id']]);
$exe = $req->fetch();
?>
<link rel="stylesheet" href="style.css">
<form action="modif_exe.php" method="POST">
<div>
Modifier un exercice <br/>
<input type="hidden" name="id" value="<?php echo $exe['id']; ?>">
<label for="titre">Titre de l'exercice</label>
<input type="text" name="titre" id="titre" value="<?php echo $exe['titre']; ?>"><br>
<label for="auteur">Auteur de l'exercice</label>
<input type="text" name="auteur" id="auteur" value="<?php echo $exe['auteur']; ?>"><br>
<label for="date_creation">Date creation</label>
<input type="date" name="date_creation" id="date_creation" value="<?php echo $exe['date_creation']; ?>"><br>
<input type="submit" name="modifier" value="Modifier">
</div>
</form>
<?php 
} else {header("Location: exercice.php");
} 
?>