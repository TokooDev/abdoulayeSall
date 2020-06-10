<?php
$dbhost = 'mysql-tokosel-abdoulaye-sall.alwaysdata.net';
$dbname = 'tokosel-abdoulaye-sall_saquizz';
$dbuser = '208377_tokosel';
$dbpswd = 'tokosel01++';
/*$dbhost = 'localhost';
$dbname = 'quizzdb';
$dbuser = 'root';
$dbpswd = '';*/

try{
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}catch(PDOexception $e){
    die("Une erreur est survenue lors de la connexion a la base de donnees");
}

?>
