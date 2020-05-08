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
        $succesMessage="Question créée avec succés";
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
        <?php 
            if (isset($erreurMessage)) {
            echo "<p class='erreurMessage'>".$erreurMessage."</p>";
            } elseif (isset($succesMessage)) {
                    echo "<p class='succesMessage'>".$succesMessage."</p>";
            }
        ?>
        <div class="questions-creation">
            <form action="#" method="post" name="form" id="form-validation">
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
                 <img width="45" height="50" src="Images/icones/ic-ajout-réponse.png">
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