<?php
 //AdminDetails
require_once ('../functions/db.php');
 if(isset($_POST['id']) && isset($_POST['id']) != "")
 {
     // get User ID
     $id = $_POST['id'];
     $sql="SELECT *  FROM questions WHERE id = '$id'";
     $questions = $db->query($sql);
     $response = array();
     if($questions->rowCount() > 0) {
         while ($row = $questions->fetch(PDO::FETCH_ASSOC)) {
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