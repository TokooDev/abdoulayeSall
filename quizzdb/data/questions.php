<?php
require_once ('../functions/db.php');
$perPage = 5;
$page = 0;
if (isset($_POST['page'])) { 
	$page  = $_POST['page']; 
} else { 
	$page=1; 
};
$startFrom = ($page-1) * $perPage; 
$questions= $db->prepare("SELECT * FROM questions ORDER BY id DESC LIMIT $startFrom, $perPage");
$questions->execute();
$data = '';
while ($row = $questions->fetch(PDO::FETCH_ASSOC)) {
        $data.='<tr>'; 
        $data.='<td>'.$row["question"].'</td>';
        $data.='<td>'.$row["score"].'</td>'; 
        $data.='<td>'.$row["type"].'</td>';
        $data.='<td class="text-center">
        		<button onclick="GetQuestionDetails('.$row["id"].')" class="btn btn-info"><i class="fas fa-marker"></i></button>
                <button onclick="DeleteQuestion('.$row["id"].')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>'; 
        $data.='</tr>';
        
    
} 
$jsonData = array(
	"html"	=> $data,	
);
echo json_encode($jsonData); 
?>