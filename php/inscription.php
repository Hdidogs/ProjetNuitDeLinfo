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

if ($mdp == $mdpconfirm) {
    $newMdp = password_hash($mdp, PASSWORD_DEFAULT);

    $co = new SQLHelper();
    $requete = $co ->inscription( $nom,  $prenom,  $rue,  $cp,  $ville,  $mail,  $newMdp);
} else {
    header("Location: ../html/inscription.php");
}
?>