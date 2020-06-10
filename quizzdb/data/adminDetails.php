<?php
 //AdminDetails
require_once ('../functions/db.php');
 if(isset($_POST['idUser']) && isset($_POST['idUser']) != "")
 {
     // get User ID
     $idUser = $_POST['idUser'];
     $sql="SELECT *  FROM users WHERE idUser = '$idUser'";
     $users = $db->query($sql);
     $response = array();
     if($users->rowCount() > 0) {
         while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
             $response = $row;
         }
     }
     else
     {
         $response['status'] = 200;
         $response['message'] = "Données non trouvées!";
     }
     // display JSON data
     echo json_encode($response);
 }
 else
 {
     $response['status'] = 200;
     $response['message'] = "Requête invalide!";
 }
 ?>