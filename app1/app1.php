<!DOCTYPE html>
<html lang='fr'>
<head>
	<title>Matrice carée</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Abdoulaye SALL" />
	<meta name="description" content="Sonatel Academy, projet_02 php"/>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php
		$colors=['blue','black'];
	?>
	<div class="container">
		<div class="title">
			<h1>Sonatel académie</h1>
		</div>
		<div class="formulaire">
			<form method="POST" action="">
				<div class="section">
				<label for="taille" class="label">Taille de la matrice carrée</label>
				<img class="icone icone-taille" src="icone1.png">
				<input class="input" value="<?php if(isset($_POST['dessiner'])){echo $_POST['taille'];} ?>" type="text" name="taille" id="taille">
				</div>
				<div class="section">
				<label for="c1" class="label">Select C1</label>
				<img class="icone icone-select icone-select-rouge" src="icone2_3.png">
				<select class="select red-select" name="c1" id="c1">
					<?php
						foreach ($colors as $value) {
							echo "<option value=".$value.">".$value."</option>";
						}
					?>
				</select>
				</div>
				<div class="section">
				<label for="c2" class="label">Select C2</label>
				<img class="icone icone-select icone-select-vert" src="icone2_3.png">
				<select class="select green-select" name="c2" id="c2">
					<?php
						foreach ($colors as $value) {
							echo "<option value=".$value.">".$value."</option>";
						}
					?>
				</select>
				</div>

				<div class="section">
				<label for="position" class="label">Position</label>
				<img class="icone icone-select icone-select-gris" src="interrogation.png">
				<select class="select gray-select" name="position" id="position">
					<option value="">Choisir la position</option>
					<option value="haut">Haut</option>
					<option value="bas">Bas</option>
				</select>
				</div>
				<div class="btn-section">
					<input class="btn btn-annuler" value="Annuler" type="submit" name="annuler">
					<input class="btn btn-dessiner" type="submit" name="dessiner" value="Dessiner">
				</div>			
			</form>
			<div class="matrice">
				<table class="table" border="1">
				<?php
					if (isset($_POST['dessiner'])){
						if (empty($_POST['taille'])) {
							echo "Vueillez donner la taille de la matrice";
						}else{
						$taille=(int)$_POST['taille'];
						$couleur1=$_POST['c1'];
						$couleur2=$_POST['c2'];
						$position=$_POST['position'];
						if (empty($_POST['position'])) {
							echo "Donnez la position svp";
						}else{
							if($position=='bas'){
							if($couleur1=='blue' or $couleur2=='black'){
							for($i=0;$i<$taille;$i++){
							echo "<tr>";
							for ($j=0; $j <$taille ; $j++) {
								if($i>=$j or $j==$taille-$i-1){
									echo "<td bgcolor='$couleur1'></td>";
									
								}else{
									echo "<td bgcolor='$couleur2'></td>";

								}
								
							}
							echo"</tr>";
							
						}
						}

						if ($couleur1=='black' or $couleur2=='blue'){
							for($i=0;$i<$taille;$i++){
							echo "<tr>";
							for ($j=0; $j <$taille ; $j++) {
								if($i>=$j or $j==$taille-$i-1){
									echo "<td bgcolor='$couleur2'></td>";

									
								}else{
									echo "<td bgcolor='$couleur1'></td>";


								}
								
							}
							echo"</tr>";
							
						}
						}
					}

					if($position=='haut'){
							if($couleur1=='blue' or $couleur2=='black'){
							for($i=0;$i<$taille;$i++){
							echo "<tr>";
							for ($j=0; $j <$taille ; $j++) {
								if($i<=$j or $j==$taille-$i-1){
									echo "<td bgcolor='$couleur1'></td>";

									
								}else{
									echo "<td bgcolor='$couleur2'></td>";


								}
								
							}
							echo"</tr>";
							
						}
						}

						if ($couleur1=='black' or $couleur2=='blue'){
							for($i=0;$i<$taille;$i++){
							echo "<tr>";
							for ($j=0; $j <$taille ; $j++) {
								if($i<=$j or $j==$taille-$i-1){
									echo "<td bgcolor='$couleur2'></td>";

									
								}else{
									echo "<td bgcolor='$couleur1'></td>";


								}
								
							}
							echo"</tr>";
							
						}
						}
					}
						}
						}

				}
				
				?>
			</table>
			
			</div>
		</div>
		
		
	</div>

</body>
</html>