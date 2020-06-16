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
$users= $db->prepare("SELECT *  FROM users WHERE profil='admin' ORDER BY idUser DESC LIMIT $startFrom, $perPage");
$users->execute();
$data = '';
while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
        $data.='<tr>'; 
        $data.='<td>'.$row["prenom"].'</td>';
        $data.='<td>'.$row["nom"].'</td>'; 
        $data.='<td>'.$row["login"].'</td>';
        $data.='<td class=" text-center d-none d-md-block d-sm-none d-xs-none d-xs-none d-lg-block">'.$row["statut"].'</td>';
        $data.='<td class="text-center">
        <button onclick="GetAdminDetails('.$row["idUser"].')" class="btn btn-info"><i class="fas fa-marker"></i></button>
                <button onclick="DeleteAdmin('.$row["idUser"].')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        </td>'; 
        $data.='</tr>';
    
} 
$jsonData = array(
	"html"	=> $data,	
);
echo json_encode($jsonData); 
?>