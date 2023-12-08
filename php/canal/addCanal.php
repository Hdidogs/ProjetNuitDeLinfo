<?php
include '../SQLHelper.php';
$co = new SQLHelper();

$nom = $_GET['nom'];
$theme = $_GET['theme'];

$add_user = $co->conbdd()->prepare("INSERT INTO canal (nom, theme) VALUES ( :nom, :theme)");
$add_user->execute(['nom' => $nom, 'theme' => $theme]);

header("Location: ../../html/PanelAdmin.php");
?>
