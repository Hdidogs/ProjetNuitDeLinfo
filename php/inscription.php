<?php
include 'SQLHelper.php';

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$rue = $_POST['rue'];
$ville = $_POST['ville'];
$cp = $_POST['cp'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$mdpconfirm = $_POST['conf_mdp'];
$pays= $_POST['pays'];
$admin= $_POST['admin'];
$argent_dep=$_POST['argent_dep'];
$grade=$_POST['grade'];


if ($mdp == $mdpconfirm) {
    $newMdp = password_hash($mdp, PASSWORD_DEFAULT);

    $co = new SQLHelper();
    $requete = $co ->inscription($nom, $prenom, $mail, $mdp, $rue, $cp, $ville, $pays, $admin, $argent_dep, $grade);
} else {
    header("Location: ../html/inscription.php");
}
?>