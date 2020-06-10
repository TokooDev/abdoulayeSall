<?php
require_once ('db.php');
$perPage = 5;
$page = 0;
if (isset($_POST['page'])) { 
	$page  = $_POST['page']; 
} else { 
	$page=1; 
};
$startFrom = ($page-1) * $perPage; 
$users= $db->prepare("SELECT *  FROM users WHERE profil='player' ORDER BY idUser DESC LIMIT $startFrom, $perPage");
$users->execute();
$data = '';
while ($row = $users->fetch(PDO::FETCH_ASSOC)) {  
	if($row['statut']=='actif'){
        $data.='<tr>'; 
        $data.='<td>'.$row["prenom"].'</td>';
        $data.='<td>'.$row["nom"].'</td>'; 
        $data.='<td>'.$row["login"].'</td>';
        $data.='<td>'.$row["mdp1"].'</td>';
        $data.='<td>'.$row["statut"].'</td>';
        $data.='<td><button onclick="blockPlayer('.$row["idUser"].')" class="btn btn-danger"><i class="fas fa-lock"></i></button>
        </td>'; 
        $data.='</tr>';
    }else{
        $data.='<tr>'; 
	$data.='<td>'.$row["prenom"].'</td>';
	$data.='<td>'.$row["nom"].'</td>'; 
	$data.='<td>'.$row["login"].'</td>';
    $data.='<td>'.$row["mdp1"].'</td>';
    $data.='<td>'.$row["statut"].'</td>';
	$data.='<td><button onclick="deblockPlayer('.$row["idUser"].')" class="btn btn-success btn-green"><i class="fas fa-lock-open"></i></button>
    </td>'; 
	$data.='</tr>';
    }  
} 
echo ($data); 
?>