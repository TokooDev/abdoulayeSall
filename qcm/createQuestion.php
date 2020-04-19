<?php
if (isset($_POST['question'], $_POST['score'], $_POST['type_question'])){
    if(empty($_POST['question']) || empty($_POST['score'])){
        if(empty($_POST['question'])){
            echo '<h1>Veuillez entrer votre question</h1>';
        }
        elseif (empty($_POST['score'])){
            echo '<h1>Veuillez saisir le nombre de point de la questions</h1>';
        }
    }
    else{
        $question = $_POST['question'];
        $score = $_POST['score'];
        $type_reponse = $_POST['type_question'];

        if(($type_reponse== '1')) {
            if ((isset($_POST['reponse_simple']))) {
                if ((empty($_POST['reponse_simple']))) {
                    echo '<h1>Veuillez entrer votre reponse</h1>';
                    die();
                }
            }
        }
        if($type_reponse == '3'){
            if(isset($_POST['reponse_texte']) && empty($_POST['reponse_texte'])){
                echo '<h1>Veuillez entrer votre reponse</h1>';
                die();
            }
        }

        elseif($type_reponse == '2'){
            if(isset($_POST['number_reponse']) && empty($_POST['number_reponse'])){
                echo '<h1>veuillez entrer le nombre de reponse</h1>';
                die();
            }
            elseif(isset($_POST['number_reponse']) && !empty($_POST['number_reponse'])){
                for ($i=1; $i<=$_POST['number_reponse'];$i++){
                    if(isset( $_POST['reponse'.$i]) && empty( $_POST['reponse'.$i])){
                        echo '<h3>Donner la reponse '.$i.'</h3>';
                        die();
                    }
                }
            }
        }


        $questions = array();
        if($type_reponse == '1'){
            $reponse_text = array(
                'type'=>"text",
                'questions'=>$question,
                'score'=>$score,
                'reponse'=>$_POST['reponse_simple'],
            );

            $questions = $reponse_text;

        }
        elseif ($type_reponse == '3'){
           if (!(isset($rep)) && !(empty($rep))){
                    $rep = array(
                        'bonne_reponse'=>'',
                        'fausse_reponse'=>''
                    );
                }

                $bonne_reponse = '';
                $mauvaise_response = '';
                for($i=1; $i<=2; $i++){
                    if(isset($_POST['reponse'.$i])){
                        if(isset($_POST['c'.$i]))
                        {
                            $rep['bonne_reponse'][] = $_POST['reponse'.$i];
                        }
                        else{
                            $rep['fausse_reponse'][] = $_POST['reponse'.$i];
                        }
                    }
                }

                $questions = array(
                    'type'=>"unique",
                    'questions'=>$question,
                    'score'=>$score,
                    'reponse'=>$rep
                );
        }
        elseif ($type_reponse == '2'){
            if(isset($_POST['number_reponse'])){
                if (!(isset($rep)) && !(empty($rep))){
                    $rep = array(
                        'bonne_reponse'=>'',
                        'fausse_reponse'=>''
                    );
                }

                $bonne_reponse = '';
                $mauvaise_response = '';
                for($i=1; $i<=$_POST['number_reponse']; $i++){
                    if(isset($_POST['reponse'.$i])){
                        if(isset($_POST['c'.$i]))
                        {
                            $rep['bonne_reponse'][] = $_POST['reponse'.$i];
                        }
                        else{
                            $rep['fausse_reponse'][] = $_POST['reponse'.$i];
                        }
                    }
                }

                $questions = array(
                    'type'=>"multiple",
                    'questions'=>$question,
                    'score'=>$score,
                    'reponse'=>$rep
                );

            }
        }
        $question_js = file_get_contents('fichiers/questions.json');

        $question_js = json_decode($question_js, true);
        $question_js[] = $questions;

        $question_js = json_encode($question_js);
        file_put_contents('fichiers/questions.json', $question_js);
    }
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
                <div>
                    <p class="questions-creation-title">PARAMÉTREZ VOTRE QUESTION</p>
                    <div class="questions-creation">
                        <form action="#" method="post" name="form" id="form-create-question">
                            <div class="create-question-section">
                                <label for="question" class="create-question-label">Questions</label>
                                <textarea id="question" error="error-1" class="create-question-textarea" name="question"></textarea>
                                
                            </div>
                            <p class='input-validation' id="error-1"></p>
                            <div class="create-question-section">
                                <label for="score" class="create-question-label">Nbre de points</label>
                                <input class="create-question-input" error="error-2" id="score" type="number" name="score">
                            </div>
                            <p class='input-validation' id="error-2"></p>
                            <div class="create-question-section">
                                <label class="create-question-label" for="type_question">Type de réponse</label>
                                    <select class="create-question-select" name="type_question" id="type_question">
                                        <option class="defaut" value="defaut">Donnez le type de réponse</option>
                                        <option value="1">Choix simple</option>
                                        <option value="2">Choix multiple</option>
                                        <option value="3">Choix unique</option>
                                    </select>
                             <a class="create-question-plus" href="#" name="ajout_nombre_reponse"  onclick="type_questions()">
                             <img src="Images/Icônes/ic-ajout-réponse.png">
                            </a>
                            </div>
                            <div class="create-question-section">
                                <div id='ajout_type_reponse'>
                                <p id="titre" class="titre"></p>
                                </div>
                            </div>
                            <div class="create-question-section">
                                <div id="conteneur">
                                </div>
                            </div>
                            <div class="create-question-section">
                                <button class="create-question-btn">Enregistrer</button>
                            </div>
                            
                           
                        </form>
                    </div>

                </div>

</body>
</html>
<script type="text/javascript">
    
    function Supprimer_element() {
    var conteneur = document.getElementById('conteneur');
    var inpt_js = document.getElementById('input_js'+i);
    var check_js = document.getElementById('check_js'+i);
    var nbChampsAjout = document.getElementById('number_reponse').value;
    for (var i = 0 ; i < nbChampsAjout; i++){
        conteneur.removeChild(conteneur.childNodes[i]);
    }
}

var nbrCheckbox = 0; //On utilise une variable globale pour éviter d'avoir des inputs avec le même nom...

function ajoutCheckbox(){
    var nbChampsAjout = document.getElementById('number_reponse').value;
    var DivToAdd = document.getElementById('conteneur');
    if(nbChampsAjout <= 0){alert('Veuillez indiquer le nombre de champs à ajouter');}
    else{
        tempInput = "";
        for(let i = 1 ; i <= nbChampsAjout; i++){
            nbrCheckbox++;
            tempInput+= '<input type="text" name="reponse'+i+'" error="error'+i+'" placeholder="Réponse n°'+i+'" class="create-question-input-generated"  id="input_js"/>' +
                '<input  type="checkbox" name="c'+i+'" id="check_js" />/<a href=""><img src="Images/Icônes/ic-supprimer.png"/></a>' +
                '<p class="input-validation" id="error'+i+'"></p>'
                '<br /></br>';
        }
        DivToAdd.innerHTML = tempInput;
    }
}

function type_questions(){
    var type_question = document.getElementById('type_question');
    var type_reponse = document.getElementById('ajout_type_reponse');
    var titre = document.getElementById("titre");
    var select_type = type_question[type_question.selectedIndex].value;
    if(select_type === '3'){
        var DivToAdd = document.getElementById('conteneur');
        tempInput = "";
        for(let i =1; i<=2; i++){
          
                tempInput+= '<input type="text" name="reponse'+i+'" error="error'+i+'" placeholder="Réponse n°'+i+'" class="create-question-input-generated"  id="input_js"/>' +
                '<input  type="radio" name="c'+i+'" id="check_js" />/<a href=""><img src="Images/Icônes/ic-supprimer.png"/></a>' +
                '<p class="input-validation" id="error'+i+'"></p>'
                
                '<p class="input-validation" id="error-3"></p>';
        
        }
        DivToAdd.innerHTML = tempInput;
        
    }else{
        if(select_type === '1'){
            titre.innerHTML = '<h4>Reponse</h4><input error="error-10" class="create-question-select"  name="reponse_simple"<h4/><br><br>'+
                                '<p class="input-validation" id="error-10"></p>';
            titre.body.appendChild(titre);
        }
        else{
            if(select_type=='2'){
                titre.innerHTML = '<label class="create-question-label">Nbre réponses</label>\n' +
                '        <input type="number" error="error-11" class="create-question-select" name="number_reponse" placeholder="Tapez le nombre de réponses Ex:3" id="number_reponse">\n' +
                '<a class="create-question-plus" href="#" name="ajoutchamp"  onclick="ajoutCheckbox()"><img src="Images/Icônes/ic-ajout-réponse.png"></a>'+
                '<p class="input-validation" id="error-11"></p>'

                ;
            titre.body.appendChild(titre);
        }else{
            titre.innerHTML='<p class="input-validation">Veuillez séléctionner le type de réponses svp</p>';
            titre.body.appendChild(titre);
        }
        }
    }
}

document.getElementById("form-create-question").addEventListener("submit",function(e){
                const inputs= document.getElementsByTagName("input");
                var error=false;
                for(input of inputs){
                    if(input.hasAttribute("error")){
                        var idDivError=input.getAttribute("error");
                    if(!input.value){
                        document.getElementById(idDivError).innerText="Ce champ est obligatoire"
                        error=true;
                        }
                        
                    }
                }
                if(error){
                    e.preventDefault();
                    return false;
                }
            })
            const inputs= document.getElementsByTagName("input");
            for(input of inputs){
                input.addEventListener("keyup",function(e){
                    if (e.target.hasAttribute("error")){
                        var idDivError=e.target.getAttribute("error");
                        document.getElementById(idDivError).innerText=""
                    }
                })
            }
document.getElementById("form-create-question").addEventListener("submit",function(e){
                const textareas= document.getElementsByTagName("textarea");
                var error=false;
                for(textarea of textareas){
                    if(textarea.hasAttribute("error")){
                        var idDivError=textarea.getAttribute("error");
                    if(!textarea.value){
                        document.getElementById(idDivError).innerText="Ce champ est obligatoire"
                        error=true;
                        }
                        
                    }
                }
                if(error){
                    e.preventDefault();
                    return false;
                }
            })
            const textareas= document.getElementsByTagName("textarea");
            for(textarea of textareas){
                textarea.addEventListener("keyup",function(e){
                    if (e.target.hasAttribute("error")){
                        var idDivError=e.target.getAttribute("error");
                        document.getElementById(idDivError).innerText=""
                    }
                })
            }
</script>