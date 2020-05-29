<div class="row">
    <div class="col-12 mt-4">
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
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Question</th>
      <th scope="col">Nombre de points</th>
      <th scope="col">Type de réponses</th>
      <th scope="col">Réponse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>La date d'indépendence du sénégal est :</td>
      <td>7</td>
      <td>text</td>
      <td>1960</td>
      <td><a href="#" class="text-warning"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
      <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    <tr>
      <td>La date d'indépendence du sénégal est :</td>
      <td>7</td>
      <td>text</td>
      <td>1960</td>
      <td><a href="#" class="text-warning"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
      <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    <tr>
      <td>La date d'indépendence du sénégal est :</td>
      <td>7</td>
      <td>text</td>
      <td>1960</td>
      <td><a href="#" class="text-warning"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
      <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    <tr>
      <td>La date d'indépendence du sénégal est :</td>
      <td>7</td>
      <td>text</td>
      <td>1960</td>
      <td><a href="#" class="text-warning"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
      <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
  </tbody>
</table>
    </div>
</div>
<!-- Modal -->
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
      <div class="row">
          <div class="col-3">
              <h5 class="text-secondary mt-1"><label for="question">Question</label></h5>
          </div>
          <div class="col-9">
              <input type="text" id="question" name="question" class="form-control" placeholder="Tapez la question">
          </div>
      </div>
      <div class="row mt-4">
          <div class="col-6">
             <h5 class="text-secondary mt-1"><label for="nbrPoint">Nombre de points</label></h5>
          </div>
          <div class="col-4">
             <input type="number" id="nbrPoint" name="nbrPoint" class="form-control">
          </div>
      </div>
      <div class="row mt-4">
          <div class="col-5">
              <h5 class="text-secondary mt-1"><label for="type">Type de réponse</label></h5>
          </div>
          <div class="col-5">
                <div class="form-group">
                <select class="form-control" id="type">
                    <option value="">Séléctionner</option> 
                    <option value="text">Texte</option>
                    <option value="unique">Unique</option>
                    <option value="multiple">Multiple</option>
                </select>
                </div>
          </div>
          <div class="col-2">
                <a class="btn-plus" href="#" name="nbrInput"><i class="fas fa-2x fa-plus-square"></i>
                </a>
          </div>
      <div class="row mt-4">
          <div class="col-4 offset-2">
             <input class="btn btn-success btn-green" name="valider" type="submit" value="Enregistrer">
          </div>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>