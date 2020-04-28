<?php
if (isset($_POST['question'], $_POST['score'], $_POST['type_question'])){
    $questions = array();
    if(empty($_POST['question']) || empty($_POST['score'])){
        if(empty($_POST['question'])){
            $erreurMessage= 'Veuillez entrer votre question';
        }
        elseif (empty($_POST['score']) || $_POST['score']<=0){
            $erreurMessage='Le nombre de point doit être supérieur ou égal à 1';
        }
    }
    else{
        $question = $_POST['question'];
        $score = $_POST['score'];
        $type_reponse = $_POST['type_question'];

        if(($type_reponse== '1')) {
            if ((isset($_POST['reponse_simple']))) {
                if ((empty($_POST['reponse_simple']))) {
                    $erreurMessage= 'Veuillez entrer votre reponse';
                }else{
                    $reponse_text = array(
                'type'=>"text",
                'questions'=>$question,
                'score'=>$score,
                'reponse'=>$_POST['reponse_simple'],
            );

            $questions = $reponse_text;
                }
            }
        }
        if($type_reponse == '3'){
            if(isset($_POST['number_reponse']) && $_POST['number_reponse'] <= 0){
                $erreurMessage= 'veuillez entrer un nombre strictement positif';
            }
            else{
                for ($i=1; $i<=$_POST['number_reponse'];$i++){
                    if(isset( $_POST['reponse'.$i]) && empty( $_POST['reponse'.$i])){
                        $erreurMessage= 'Donner la reponse '.$i.'!';
                    }else{
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
                    'type'=>"unique",
                    'questions'=>$question,
                    'score'=>$score,
                    'reponse'=>$rep
                );

            }
                    }
                }
            }
        }

        elseif($type_reponse == '2'){
            if(isset($_POST['number_reponse']) && $_POST['number_reponse'] <= 0){
                $erreurMessage= 'veuillez entrer un nombre strictement positif';
            }
            else{
                for ($i=1; $i<=$_POST['number_reponse'];$i++){
                    if(isset( $_POST['reponse'.$i]) && empty( $_POST['reponse'.$i])){
                        $erreurMessage= 'Donner la reponse '.$i.'!';
                    }else{
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
                }
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
                    <?php if (isset($erreurMessage)) {
                echo "<p class='erreurMessage'>".$erreurMessage."</p>";
            } ?>
                    <div class="questions-creation">
                        <form action="#" method="post" name="form" id="form-create-question">
                            <div class="create-question-section">
                                <label for="question" class="create-question-label">Questions</label>
                                <input type="text" id="question" error="error-1" name="question" class="create-question-input-question">
                            </div>
                            <p class='input-validation' id="error-1"></p>
                            <div class="create-question-section">
                                <label for="score" class="create-question-label">Nbre de points</label>
                                <input class="create-question-input-question" error="error-2" id="score" type="number" name="score">
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
                             <img width="45" height="50" src="Images/Icônes/ic-ajout-réponse.png">
                            </a>
                            </div>
                            <div class="create-question-section">
                                <div id='ajout_type_reponse'>
                                <p id="titre" class="titre"></p>
                                </div>
                            </div>

                            <div id="unique">
                            </div>
                            <div id="conteneur">
                            </div>
                            <div class="create-question-section">
                                <button class="create-question-btn">Enregistrer</button>
                            </div>
                            
                           
                        </form>
                    </div>
                    <br>

                </div>

</body>
</html>
<script type="text/javascript">
    
    function deleteInput(){
    let nbChampsAjout = document.getElementById('number_reponse').value;
    for (let i = 1 ; i <= nbChampsAjout; i++){
        let log = document.getElementById("btnDelete"+i);
        log.addEventListener('click', function (){
            let label = document.getElementById("label"+i);
            let checkbox = document.getElementById("c"+i);
            let input = document.getElementById("reponse"+i);
            label.remove();
            input.remove();
            checkbox.remove();
            log.remove(); 
        });
    }
}
var nbrCheckbox = 0; 
function ajoutCheckbox(){
    var nbChampsAjout = document.getElementById('number_reponse').value;
    var DivToLoad = document.getElementById('conteneur');
        tempInput = "";
        for(let i = 1 ; i <= nbChampsAjout; i++){
            nbrCheckbox++;
            tempInput+= '<p class="create-question-section"><label id="label'+i+'" for="reponse'+i+'" class="reponse-label">Réponse n°'+i+'</label><input type="text" name="reponse'+i+'" error="error'+i+'" class="create-question-input-generated"  id="reponse'+i+'"/><span class="reponse-icones"><input class="multipleCheckbox"  type="checkbox" name="c'+i+'" id="c'+i+'"/><a href="#"  onclick="deleteInput();" id="btnDelete'+i+'"><img  src="images/Icônes/ic-supprimer.png" class="img-delete"/></a></span></p>' +
                '<p class="input-validation" id="error'+i+'"></p>';
        }
        DivToLoad.innerHTML = tempInput;
}
var nbrRadio = 0; 
function ajoutRadio(){
    var nbChampsAjout = document.getElementById('number_reponse').value;
    var DivToLoad = document.getElementById('conteneur');
        tempInput = "";
        for(let i = 1 ; i <= nbChampsAjout; i++){
            nbrRadio++;
            tempInput+= '<p class="create-question-section"><label id="label'+i+'" for="reponse'+i+'" class="reponse-label">Réponse n°'+i+'</label><input type="text" name="reponse'+i+'" error="error'+i+'" class="create-question-input-generated"  id="reponse'+i+'"/><span class="reponse-icones"><input class="multipleCheckbox"  type="radio" name="c'+i+'" id="c'+i+'"/><a href="#"  onclick="deleteInput();" id="btnDelete'+i+'"><img  src="images/Icônes/ic-supprimer.png" class="img-delete"/></a></span></p>' +
                '<p class="input-validation" id="error'+i+'"></p>';
        }
        DivToLoad.innerHTML = tempInput;
}

function type_questions(){
    var type_question = document.getElementById('type_question');
    var type_reponse = document.getElementById('ajout_type_reponse');
    var titre = document.getElementById("titre");
    var select_type = type_question[type_question.selectedIndex].value;
    if(select_type === '3'){
        titre.innerHTML = '<div class="create-question-section"><label class="create-question-label">Nbre réponses</label>\n' +
                '        <input type="number" error="error-11" class="create-question-input-generated" name="number_reponse" placeholder="Tapez le nombre de réponses Ex:3" id="number_reponse">\n' +
                '<a class="create-question-plus" href="#" name="ajoutchamp"  onclick="ajoutRadio()"><img src="Images/Icônes/ic-ajout-réponse.png" width="45" height="43"></a>'+
                '<p class="input-validation" id="error-11"></p></div>'

                ;
            titre.body.appendChild(titre);
        
    }else{
        if(select_type === '1'){
            titre.innerHTML = '<div class="create-question-section"><label  for="reponse" class="reponse-label">Réponse</label><input type="text" error="error-10" class="create-question-input-question" id="reponse"  name="reponse_simple"</div>'+
                                '<p class="input-validation" id="error-10"></p>';
            titre.body.appendChild(titre);
        }
        else{
            if(select_type=='2'){
                titre.innerHTML = '<div class="create-question-section"><label class="create-question-label">Nbre réponses</label>\n' +
                '        <input type="number" error="error-11" class="create-question-input-generated" name="number_reponse" placeholder="Tapez le nombre de réponses Ex:3" id="number_reponse">\n' +
                '<a class="create-question-plus" href="#" name="ajoutchamp"  onclick="ajoutCheckbox()"><img src="Images/Icônes/ic-ajout-réponse.png" width="45" height="43"></a>'+
                '<p class="input-validation" id="error-11"></p></div>'

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
</script>