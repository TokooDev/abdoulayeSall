<?php
// include Database connection file
require_once 'db.php';
// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $question = $_POST['question'];
    $score = $_POST['score'];
    $type = $_POST['type'];

    // Updaste User details
    $sql = "UPDATE questions SET question = '$question', score = '$score', type = '$type' WHERE id= '$id'";
    $req = $db->prepare($sql);
    $req->execute();
}