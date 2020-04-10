
<!DOCTYPE html>
<html>
<head>
	<title>Exercice 05</title>
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
			<h3>Exercice 05 Serie_Tabaleu_Fonctions</h3>
			<div class="nice-three"></div>
			<textarea class="in-textarea"  type="text" name="numero" placeholder="Remplir ici vos numéros de téléphone svp"><?php if(isset($_POST['numero']) && preg_match("#[0-9\s,-]+#", $_POST['numero'])){echo $_POST['numero'];}?></textarea>
			<input class="btn btn-validate" type="submit" name="valider" value="Valider">
		</form>
	</div>
	<div class="result">
			<h2 class="titre">Résultat de l'algorithme</h2>
					<?php
if(isset($_POST['valider'])) {
    if(empty($_POST['numero']) or preg_match("#[^0-9^\s,-]#", $_POST['numero'])){
            echo "<h2>Vueillez saisir des numéros de téléphone</h2>";
        }
        else{
            $numero = $_POST['numero'];
            function transform_strg_arr($string){
                $n = str_replace(CHR(32), "", $string);
                $chaine = preg_split("/[\s,-]+/", $string);
                $taille = 0;
                foreach ($chaine as $numero)
                {
                    $taille = $taille +1;
                }
                $debut = 0;
                $fin = $taille;
                $T[] = array();
                if (($chaine[0] == "" && $chaine[$taille-1] == "")){
                    $debut=1;
                    $fin = $taille-2;
                    for ($i = $debut; $i < $fin; $i++){
                            $T[] = $chaine[$i];

                    }
                }
                elseif (($chaine[0] != "") && $chaine[$taille-1] == "")
                {
                    $debut = 0;
                    $fin = $taille-2;
                    for ($i = $debut; $i < $fin; $i++){

                            $T[] = $chaine[$i];

                    }
                }
                elseif (($chaine[0] != "") && $chaine[$taille-1] !=""){
                    $debut = 0;
                    $fin = $taille;
                    for ($i = $debut; $i < $fin; $i++){
                            $T[] = $chaine[$i];
                    }
                }
                return $T;
            }
            //Fonction affichage tableau
            function affichage($tab){
                foreach ($tab as $values){
                    echo "<td>-$values</td>";
                }
            }
            //Fonction size elements
            function Nbre_elements($tab){
                $nbr = 0;
                foreach ($tab as $values) {
                    $nbr = $nbr + 1;
                }
                return $nbr;
            }
            //Function pourcentage
            function pourcentage($a,$b){
                $p = ($a*100)/$b;
                return $p;
            }
            $numero = transform_strg_arr($numero);
            $orange = array();
            $expresso = array();
            $promobile=array();
            $free = array();
            $invalide = array();
            foreach ($numero as $key=>$numeros){
                if($key!=0) {
                    if(strlen($numeros)!=9){
                        $invalide[] = $numeros;
                    }
                    else{
                        if (preg_match("#^77#", $numeros) || preg_match("#^78#", $numeros) ){
                        $orange[] = $numeros;
                    }
                    elseif (preg_match("#^76#", $numeros)){
                        $free[] = $numeros;
                    }
                    elseif (preg_match("#^70#", $numeros)){
                        $expresso[] = $numeros;
                    }
                    elseif (preg_match("#^75#", $numeros)){
                        $promobile[] = $numeros;
                    }
                    }
                }
        }
            echo "<h1>Liste des numéros Orange</h1>";
            affichage($orange);
            echo "<h1>Valeur en pourcentage</h1>";
            echo pourcentage(Nbre_elements($orange),Nbre_elements($numero))."%</h2>";
            echo"<hr>";
            echo "<h1>Liste des numéros Free</h1>";
            affichage($free);
            echo "<h1>Valeur en pourcentage</h1>";
            echo pourcentage(Nbre_elements($free),Nbre_elements($numero))."%</h2>";
            echo"<hr>";
            echo "<h1>Liste des numéros Expresso</h1>";
            affichage($expresso);
            echo "<h1>Valeur en pourcentage</h1>";
            echo pourcentage(Nbre_elements($expresso),Nbre_elements($numero))."%</h2>";
            echo"<hr>";
            echo "<h1>Liste des numéros Promobile</h1>";
            affichage($promobile);
            echo "<h1>Valeur en pourcentage</h1>";
            echo pourcentage(Nbre_elements($promobile),Nbre_elements($numero))."%</h2>";
            echo"<hr>";
            echo "<h1>Liste des numéros Invalides</h1>";
            affichage($invalide);
            echo "<h1>Valeur en pourcentage</h1>";
            echo pourcentage(Nbre_elements($invalide),Nbre_elements($numero))."%</h2>";

        }
    
}
?>
	</div>
</div>

</body>
</html>