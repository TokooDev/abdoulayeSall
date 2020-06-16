<?php
require_once ('functions/db.php');
    $perPage = 5;
    $s = $db->prepare("SELECT * FROM users WHERE profil='player'");
    $s->execute();
    $total_results = $s->rowCount();
    $totalPages = ceil($total_results/$perPage);

?>
<div class="row">
    <div class="col-12 mt-4">
        <div class="row">
            <div class="col-10">
                <h5 class="title-green"> <i class="fas fa-list"></i> LISTE DES JOUEURS</h5>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4">
    <table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Nom d'utilisateur</th>
					<th>Mot de passe</th>
                    <th>Etat du compte</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="content" class="players_data">     
			</tbody>
	</table>   
		<div id="players_data">
        </div>    
		<input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
    </div>
    
</div>