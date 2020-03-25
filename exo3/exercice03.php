<?php

      $val;
      $msg="";
      $msg2="";
      $form="";
      $chtmp="";
      $tab =array();
      $tabMotsValide =array();
      $tabMostInValide =array();
      $j=0;
     if ( !empty($_POST['val'])  ){
         $val =$_POST['val'];
        // --------------------------------------------------------------------------------
      if (isNombreValide($val)==1 && $val>0) { // recuperation des mots 
        for ($i=0; $i <$val; $i++) { 
           if (isset($_POST['mots'.$i])) {
              if (isMotsValide($_POST['mots'.$i])==1 && counte($_POST['mots'.$i]) <=20) {
                  $tabMotsValide[] = $_POST['mots'.$i]; // si mots valide
              }else{
                  $tabMostInValide[] = $_POST['mots'.$i]; //si mots invalide
              }
           }
        }
        if (counte($tabMostInValide)>0) { // si il exixte des mots invalide
         $form = reaffissageFormulair($val); //fonction qui reaffiche le formulaire en gardant les mots valide
        }else{
        $msg='Les mots saisis sont : ';
        foreach ($tabMotsValide as $key => $value) { // recuperrations des mots valide dans le tableau

           $msg=$msg."| $value | "; // concatenation des mots dans la variable $msg
        }
        $nbrM = nombreMotsContenantM($tabMotsValide);
        $msg=$msg."<div>Et les mots contenant la lettre « M/m » sont au nombre de <span class='nbreMotAvecM'>$nbrM</span></div>";
        }
      }else{
         $msg2="Seuls les nombres sont autorisés";
      }
        // -----------------------------------------------------------------------------------
     }else{
        $val=0;
     }

     function counte($objet){ // fonction pour calculer la taille d'un objet donne
        $taille=0; // taille
        $index=0;
        while ( isset($objet[$index]) ) { // verification de l'element a un position donne
            $taille++;
            $index++;
        }
        return $taille;
     }
     function nombreMotsContenantM($tabd){
        $somme =0;
       for ($i=1; $i < counte($tabd) ; $i++) { 
          if(preg_match("#[mM]#",$tabd[$i])){
              $somme ++;
          }
       }
       return $somme;
     }
     function isNombreValide($donne){ // fonction pour valider un nombre
         $tabChifre=['0','1','2','3','4','5','6','7','8','9',' '];
         $bool=1;
         $index=0;
         while ( $index < counte($donne) and $bool == 1 ){

            $i=0;
            $bool2=0;
            while ($i < counte($tabChifre) and $bool2 == 0){
                if ($tabChifre[$i]== $donne[$index]) {
                    $bool2 =1;
                }
                $i++;
            }
             if ($bool2==0) {
                 $bool=0;
             }
            $index++;        
         }
         return $bool;
     }
     function isMotsValide($donne){ // fonction pour valider un nombre
         $tabChifre=['0','1','2','3','4','5','6','7','8','9',' ',',','-',';','?','/','\\','.',''];
         $bool=1;
         $index=0;
         while ( $index < counte($donne) and $bool == 1 ){
            $i=0;
            $bool2=0;
            while ($i < counte($tabChifre) and $bool2 == 0){
                if ($tabChifre[$i]== $donne[$index]) {
                    $bool2 =1;
                }
                $i++;
            }
             if ($bool2==1) {
                 $bool=0;
             }
            $index++;        
         }
         return $bool;
     }

     function reaffissageFormulair($val){
      $form='';
      for ($i=0; $i <$val ; $i++) { 
          if ( isMotsValide($_POST['mots'.$i])==1) {
            $form=$form.'<input type="text" class="in-word" name="mots'.$i.'" value="'.$_POST['mots'.$i].'">';
          }else{
            $form=$form.'<br><label style="color:red;">Ce mot est invalide</label>';
           $form=$form.'<input class="in-word" type="text" name="mots'.$i.'" value="'.$_POST['mots'.$i].'"><br>';
          }
      }
      return $form;
     }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exercice 03</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Abdoulaye SALL" />
	<meta name="description" content="Sonatel Academy, projet_02 php"/>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="all">
	<div class="form-exo3">
		<form action="" method="POST" id="form">
            <h3>Exercice 03 Serie_Tabaleu_Fonctions</h3>
                 <label for="nbrMots">Combien de mots voulez vous saisir ? </label>
                 <input type="text" class="in-word" value="<?php  echo $val ;?>" name="val" onkeyup="generInput();" id="nbrMots">
                 <div id="divInputAuto">
                       <?php 
                           echo $form;
                        ?>
                 </div>
                 <input class="btn btn-validate" id="btn" type="submit">            
        </form>
	</div>
	<div class="result">
		<h2 class="titre">Résultat de l'algorithme</h2>
		 <div>
            <h5>
                <?php echo"$msg";?>     
            </h5>
            <h4>
                <?php // Affissage du contenue des variable $msg et $msg2
                    echo"$msg2"; 
                ?>
            </h4>
        </div>
	</div>
</div>
<script type="text/javascript">
            function generInput(){
              var nbrMots = document.getElementById('nbrMots').value;     // recupearation du valeur saisir
              var divInputAuto = document.getElementById('divInputAuto');  
              if (parseInt(nbrMots)!='') {   
                for (var i = 0; i <parseInt(nbrMots); i++){               // boucle pour cree le nombre d'input demander
                   var newInput = document.createElement( "input" );      // creation d'input auto
                   var newBr = document.createElement( "br" );
                   newInput.setAttribute('type','text');                  // typage de l'input
                   newInput.setAttribute('class','in-word');
                   newInput.setAttribute('placeholder','Entrez ici votre mot');
                   newInput.setAttribute('name','mots'+i);                // atribute name enfonction du position i
                   divInputAuto.appendChild(newInput);                    // ajout de l'input dans le div
                   divInputAuto.appendChild(newBr);                 
                }
              }
            }
        </script>
</body>
</html>