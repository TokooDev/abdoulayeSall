<?php
if(isset($_POST['idUser']) && isset($_POST['idUser']) != "")
{
    include_once'db.php';
    $idUser = $_POST['idUser'];
    $sql = "UPDATE users SET statut = 'actif' WHERE idUser= '$idUser'";
    $req = $db->prepare($sql);
    $req->execute();
}
?>