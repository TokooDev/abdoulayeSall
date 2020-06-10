<?php
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    include_once'db.php';
    $id = $_POST['id'];
    $sql = "DELETE questions,reponses FROM questions
        INNER JOIN
    	reponses ON reponses.id_question = questions.id 
		WHERE questions.id = ' $id';";
    $req = $db->prepare($sql);
    $req->execute();
}
?>