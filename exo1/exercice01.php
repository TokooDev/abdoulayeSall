<?php
    session_start();
    function pagination($page,$tab){
        $NbrLigne=0;
        if (count($tab)!=0)
        {$k=($page-1)*100;
        ?>
        <table border="1">
            <tbody>
                <?php
                for ($i=$k; $i <$k+100 ; $i+=10)
                {
                    echo "<tr>";
                    for ($j=$i; $j <$i+10 ; $j++)
                    { 
                        if (array_key_exists($j, $tab)) 
                            echo "<td>$tab[$j]</td>";
                        else
                            echo "<td>&nbsp;</td>";
                        
                    }
                    echo "</tr>";}?>
            </tbody>
        </table>
    <?php } else{?>
        pas de données
        <?php

    }

    }

?>
<!DOCTYPE html>
<html lang='fr'> 
<head>
	<title>Exercice 01</title>
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
			<h3>Exercice 01 Serie_Tabaleu_Fonctions</h3>
			<div class="nice-three"></div>
			<input type="text" name="nombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];}?>" class="in-name" placeholder="Donnez un nombre supérieur à 10000"/>
			<input class="btn btn-validate" type="submit" name="valider" value="Valider">
		</form>
	</div>
	<div class="result">
			<h2 class="titre">Résultat de l'algorithme</h2>
					<?php
if(isset($_POST['valider'])) {
    if (!(empty($_POST['nombre']))) {
        if ((preg_match("#[^0-9]#", $_POST['nombre'])) || ($_POST['nombre'] < 10000)) {
            echo "<h2>Donner un nombre entier supérieur à 10000</h2>";
            } else {
            $n = $_POST['nombre'];
            $som = 0;
            $nbr = 0;
            $res = "";
            $T1 = array();
            for ($i = 1; $i <= $n; $i++) {
                $res = 0;
                $som = 0;
                $nbr = 0;
                for ($j = 1; $j <= $i; $j++) {
                    $res = $i % $j;
                    if ($res == 0) {
                        $nbr = $nbr + 1;
                    }
                }
                if ($nbr == 2) {
                    $T1[] = $i;
                }
            }

        //Fonction calculer la moyenne
        function moyenne($table)
        {
            $som = 0;
            $taille = 0;
            foreach ($table as $nombres) {
                $som = $som + $nombres;
                $taille = $taille + 1;
            }
            $moyenne = $som / $taille;

            return $moyenne;
        }

        $moyenne_tableau = moyenne($T1);
        $T2 = array();
        $T3 = array();
        foreach ($T1 as $key1 => $valeur) {
            if ($valeur < $moyenne_tableau) {
                $T2[] = $valeur;
            } else {
                $T3[] = $valeur;
            }
        }
        $_SESSION['moyenne']=$moyenne_tableau;
        $_SESSION['inf']=$T2;
        $_SESSION['sup']=$T3;
        }
        }
    else{
            echo 'Ce champ est obligatoire!';
        }
}
if (isset($_SESSION['inf']) || isset($_GET['pageInf'])) {
    echo "La moyenne est égale à ".$_SESSION['moyenne'];
    echo "<h4>Tableau des nombres premiers inférieurs à la moyenne</h4>";
    
    $nombreDePage=ceil(count($_SESSION['inf'])/100);
    
    if (isset($_GET['pageInf'])) {
        $page=$_GET['pageInf'];
        pagination($page,$_SESSION['inf']);
    }else{
        pagination(1,$_SESSION['inf']);
    }
    echo "</br> Page: ";
    for ($i=1; $i <=$nombreDePage ; $i++) { 
        echo '<a href="exercice01.php?pageInf='.$i.'">'.$i.'</a>';
    }
}
echo "<br>";
if (isset($_SESSION['sup']) || isset($_GET['pageSup'])) {
    echo "<h4>Tableau des nombres premiers supérieurs à la moyenne</h4>";
   
    $nombreDePage=ceil(count($_SESSION['sup'])/100);
        if (isset($_GET['pageSup'])) {
        $page=$_GET['pageSup'];
        pagination($page,$_SESSION['sup']);
    }else{
        pagination(1,$_SESSION['sup']);
    }
     echo "</br> Page: ";
    for ($i=1; $i <=$nombreDePage ; $i++) { 
        echo '<a href="exercice01.php?pageSup='.$i.'">'.$i.'</a>';
    }

}
?>
	</div>
</div>

</body>
</html>