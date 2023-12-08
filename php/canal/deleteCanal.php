<?php
include '../SQLHelper.php';
$co = new SQLHelper();

$id = $_GET['id'];

$add_user = $co->conbdd()->prepare("DELETE FROM canal WHERE id_canal = :canal");
$add_user->execute(['canal' => $id]);

header("Location: ../../html/PanelAdmin.php");
?>
