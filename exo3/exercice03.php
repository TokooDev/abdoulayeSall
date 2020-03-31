<?php
function taille($objet){
        $taille=0; 
        $index=0;
        while ( isset($objet[$index]) ) { 
            $taille++;
            $index++;
        }
        return $taille;
     }
     function nombreMotsContenantM($tabd){
        $somme =0;
       for ($i=0; $i <taille($tabd) ; $i++) { 
          if(preg_match("#[mM]#",$tabd[$i])){
              $somme ++;
          }
       }
       return $somme;
     }
     function est_numeric($donne){
         $tabChifre=['0','1','2','3','4','5','6','7','8','9',' '];
         $bool=1;
         $index=0;
         while ( $index < taille($donne) and $bool == 1 ){

            $i=0;
            $bool2=0;
            while ($i < taille($tabChifre) and $bool2 == 0){
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
     function est_chaine($donne){
         $tabChifre=['0','1','2','3','4','5','6','7','8','9',' ',',','-',';','?','/','\\','.',''];
         $bool=1;
         $index=0;
         while ( $index < taille($donne) and $bool == 1 ){
            $i=0;
            $bool2=0;
            while ($i < taille($tabChifre) and $bool2 == 0){
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

     function formulaire($val){
      $form='';
      for ($i=1; $i <=$val ; $i++) { 
          if ( est_chaine($_POST['mots'.$i])==1) {
            $form=$form.'<input type="text" class="in-word" name="mots'.$i.'" value="'.$_POST['mots'.$i].'">';
          }else{
            $form=$form.'<br><label style="color:red;">Ce mot est invalide</label>';
           $form=$form.'<input class="in-word" type="text" name="mots'.$i.'" value="'.$_POST['mots'.$i].'"><br>';
          }
      }
      $form=$form.'<input class="btn btn-validate" value="Résultat" id="btn" name="resultat" type="submit"> ';
      return $form;
     }
      $val;
      $succes="";
      $erreur="";
      $form="";
      $tabMotsValide =array();
      $tabMostInValide =array();
      $j=0;
  if (isset($_POST['val'])) {
    if ( !empty($_POST['val']) ){
         $val =$_POST['val'];
        for ($i=1; $i<=$val ; $i++) { 
          $form=$form.'<input type="text" placeholder="Mot n°'.$i.'" class="in-word" name="mots'.$i.'">';
        }
        $form=$form.'<input class="btn btn-validate" value="Résultat" id="btn" name="resultat" type="submit"> ';
         if (est_numeric($val)==1 && $val>0) { 
        for ($i=1; $i <=$val; $i++) { 
           if (isset($_POST['resultat'])) {
              if(!empty($_POST['mots'.$i])){
                if (est_chaine($_POST['mots'.$i])==1 && taille($_POST['mots'.$i]) <=20) {
                  $tabMotsValide[] = $_POST['mots'.$i]; 
              }else{
                  $tabMostInValide[] = $_POST['mots'.$i];
                  $erreur="Le mot n ° ".$i." doit être une chaine de caractère et doit être supérieur à 20";
              }
              if (taille($tabMostInValide)>0) { 
              $form = formulaire($val);
              $succes="Vueillez vérifier les mots que vous avez saisi";
              }else{
                $form = formulaire($val);
              $succes='Les mots saisis sont : ';
              foreach ($tabMotsValide as $key => $value) {
                 $succes=$succes."$value | "; 
              }
              $nbrM = nombreMotsContenantM($tabMotsValide);
              $succes=$succes."<div>Et les mots contenant la lettre « M/m » sont au nombre de <span class='nbreMotAvecM'>$nbrM</span></div>";
              }
            }else{
              $form = formulaire($val);
              $erreur="Tous les champs sont obligatoires";
            }
        }
        }
        
      }else{
         $erreur="Seuls les nombres sont autorisés";
      }
     }else{
      $val='';
        $erreur="Ce champ est obligatoire";
     }
        
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
  <div class="form">
    <form action="" method="POST" id="form">
            <h3>Exercice 03 Serie_Tabaleu_Fonctions</h3>
                 <label for="nbrMots">Combien de mots voulez vous saisir ? </label>
                 <input type="text" value="<?php if(isset($_POST['val'])){echo $val ;} ?>" class="in-word" name="val" id="nbrMots">
                 <input class="btn btn-validate" id="btn" name="valider" type="submit"> 
                 <?php if (isset($form)) {
                    echo $form;
                 } ?>           
        </form>
  </div>
  <div class="result">
    <h2 class="titre">Résultat de l'algorithme</h2>
     <div>
            <?php
            if (isset($succes)) {
              ?>
              <h5>
                <?php echo"$succes";?>     
            </h5>
            <h4>
                <?php
                    echo"$erreur"; 
                ?>
            </h4>
            <?php
            }

            ?>   
    </div>
  </div>
</div>

</body>
</html>