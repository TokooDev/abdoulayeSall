<?php
require_once ('functions/db.php');
    $perPage = 5;
    $s = $db->prepare("SELECT * FROM questions");
    $s->execute();
    $total_results = $s->rowCount();
    $totalPages = ceil($total_results/$perPage);

?>
<div class="row">
    <div class="col-12 mt-4 ml-3">
        <div class="row">
            <div class="col-10">
                <h5 class="title-green"> <i class="fas fa-list"></i> LISTE DES QUESTIONS</h5>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success btn-green" data-toggle="modal" data-target="#addQuestion"><i class="fas fa-plus-circle"></i> Ajouter</button>
            </div>
        </div>
    </div>
      <div class="col-12 mt-4">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Question</th>
              <th scope="col">Nombre de points</th>
              <th scope="col">Type de question</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody id="questionContent" class="questions_data">
            
          </tbody>
        </table>
        <div id="questions_data">
        </div>    
        <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
    </div>
</div>
<!-- Add Modal -->
<div class="modal" id="addQuestion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addQuestionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title-green" id="addQuestionLabel"><i class="fas fa-plus-square"></i> CREATION DE QUESTION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mt-3">
                <div class="col-12">
                    <div class="error-return"></div>
                    <form  method="post" class="formulaire-creation-question" id="formulaireCreation">
                        <?php
                        if(isset($msgError) && !empty($msgError)){
                            echo '<div class="alert alert-danger align-center">'.$msgError.'</div>';
                        }
                        ?>
                        <div class="form-group row">
                            <label for="question" class="col-sm-2 mt-lg-4 p col-form-label">Question</label>
                            <div class="col-sm-10">
                                <textarea class="form-control pb-lg-5" id="question" name="question" placeholder="Taper ici la question"><?php if(isset($_POST['question']) && !empty($_POST['question'])){echo $_POST['question'];} ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="score" class="col-sm-2 col-form-label">Score</label>
                            <div class="col-sm-10">
                                <input type="text" name="score"  class="form-control w-25" id="score"value="<?php if(isset($_POST['score'])){echo $_POST['score'];} ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" id="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                  <option value="text">Séléctionner le type de question</option>
                                  <option value="text">Text</option>
                                  <option value="unique">Unique</option>
                                  <option value="multiple">Multiple</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reponse" class="col-4 mt-lg-1">Nombre Reponse</label>
                            <div class="col-6">
                                <input type="text" name="nombre-reponse" id="nombre-reponse" class="form-control"
                                       value="<?php if(isset($_POST['nombre-reponse'])){echo $_POST['nombre-reponse'];} ?>">
                            </div>
                            <div class="col-2 reponse mt-1">
                                <a><i class="fas fa-2x fa-plus-circle text-green"></i></a>
                            </div>
                        </div>
                        <div class="reponses"></div>
                        <div class="form-group row">                         
                          <div class="col-12">
                            <input type="submit" name="btnAddQuestion" id="submitQuestion" class="btn btn-success btn-green enregistrer" value="Enrégistrer">
                          </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>

<!--Edit Modal -->
<div class="modal" id="editQuestion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addQuestionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title-green" id="addQuestionLabel"><i class="fas fa-edit"></i> MODIFICATION DE QUESTION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mt-3">
                <div class="col-12">
                    <div class="error-return"></div>
                        <div class="form-group row">
                            <label for="update_question" class="col-sm-2 mt-lg-4 p col-form-label">Question</label>
                            <div class="col-sm-10">
                                <textarea class="form-control pb-lg-5" id="update_question" name="question" placeholder="Taper ici la question"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="update_score" class="col-sm-2 col-form-label">Score</label>
                            <div class="col-sm-10">
                                <input type="text" name="score" class="form-control w-25" id="update_score">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="update_type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <select name="type" id="update_type" class="form-control">
                                  <option value="text">Séléctionner le type de question</option>
                                  <option value="text">Text</option>
                                  <option value="unique">Unique</option>
                                  <option value="multiple">Multiple</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">                         
                          <div class="col-12">
                            <button type="button" class="btn btn-success btn-green" onclick="UpdateQuestion()">Enregistrer</button>
                            <input type="hidden" id="hidden_id">
                          </div>
                        </div>
                    
                </div>
            </div>
      </div>
    </div>
  </div>
</div>