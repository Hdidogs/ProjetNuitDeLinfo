<?php
include '../SQLHelper.php';
$co = new SQLHelper();

$res = $co->conbdd()->query("SELECT * FROM message");
$messages = $res->fetchAll();
foreach ($messages as $_messages) {
?>
    <div class="message">
        <p><?= $_messages['ref_user'] . " - " . $_messages['libelle']?></p>
    </div>
<?php
}
?>