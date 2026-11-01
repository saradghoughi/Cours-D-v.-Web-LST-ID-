<?php
require_once("conn.php");
$req = $conn->query("SELECT * FROM exercice");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Gestion des exercices</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include("formulaire.php"); ?>
<table border="1">
<tr><th>id</th><th>titre</th><th>auteur</th><th>date_creation</th><th colspan="2">Actions</th>
</tr>
<?php while ($row = $req->fetch(PDO::FETCH_ASSOC)) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['titre']; ?></td>
<td><?php echo $row['auteur']; ?></td>
<td><?php echo $row['date_creation']; ?></td>
<td><a href="modif_exe.php?id=<?php echo $row['id']; ?>">Modifier</a></td>
<td><a href="supp_exe.php?id=<?php echo $row['id']; ?>">Supprimer</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>
