
<!DOCTYPE html>
<html>
<head>
	<title>Exercice 02</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Abdoulaye SALL" />
	<meta name="description" content="Sonatel Academy, projet_02 php"/>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="all">
	<div class="form">
		<form action="" method="POST">
			<h3>Exercice 02 Serie_Tableau_Fonctions</h3>
			<select class="in-name" name="langue">
			<option>Séléctionner votre langue</option>
            <option>Francais</option>
            <option>Anglais</option>
			</select><br>
			<input class="btn btn-validate" type="submit" name="valider" value="Valider">
		</form>
	</div>
	<div class="result">
		<h2 class="titre">Résultat de l'algorithme</h2>
<?php
if(isset($_POST['valider'])){
    if(!(empty($_POST['langue']))){
        $langues = $_POST['langue'];
        $calendrier = [
                'Francais' => [1=>'Janvier','Février', 'Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
                'Anglais' => [1=>'January', 'February', 'May', 'April','May','June', 'July', 'August','September','October', 'November', 'December']
        ];
        if($langues == 'Francais'){
            foreach ($calendrier as $key=>$valeurs){
                echo "<table>";
                foreach ($valeurs as $nombre=>$val){
                    if($key == 'Francais'){
                        if($nombre==1) {
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==2){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==3){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==4){
                            echo "<tr><td>$nombre<td>$val</td></td>";
                        }
                        elseif($nombre==5){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==6){
                            echo "<td>$nombre<td>$val</td></td></tr>";
                        }
                        elseif ($nombre==7){
                            echo "<tr><td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre == 8){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre == 9){
                            echo "<td>$nombre<td>$val</td></td></tr>";
                        }
                        elseif ($nombre == 10){
                            echo "<tr><td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre == 11){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        else{
                            echo "<td>$nombre<td>$val</td></td></tr>";
                        }
                    }
                }
                echo "</table>";
            }
        }
        elseif($langues == 'Anglais'){
            foreach ($calendrier as $key=>$valeurs){
                echo "<table>";
                foreach ($valeurs as $nombre=>$val){
                    if($key == 'Anglais'){
                        if($nombre==1) {
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==2){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==3){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==4){
                            echo "<tr><td>$nombre<td>$val</td></td>";
                        }
                        elseif($nombre==5){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre==6){
                            echo "<td>$nombre<td>$val</td></td></tr>";
                        }
                        elseif ($nombre==7){
                            echo "<tr><td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre == 8){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre == 9){
                            echo "<td>$nombre<td>$val</td></td></tr>";
                        }
                        elseif ($nombre == 10){
                            echo "<tr><td>$nombre<td>$val</td></td>";
                        }
                        elseif ($nombre == 11){
                            echo "<td>$nombre<td>$val</td></td>";
                        }
                        else{
                            echo "<td>$nombre<td>$val</td></td></tr>";
                        }
                    }
                }
                echo "</table>";
                echo"<br>";
            }
        }
        else{
            echo("Votre langue n'est pas prise en compte");
        }
}
}

?>
		
	</div>
</div>

</body>
</html>