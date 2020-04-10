<!DOCTYPE html>
<html lang='fr'>
<head>
	<title>Matrice carée</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Abdoulaye SALL" />
	<meta name="description" content="Sonatel Academy, projet_02 php"/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$colors=['red','blue','gray','yellow'];
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
				<label for="c3" class="label">Select C3</label>
				<img class="icone icone-select icone-select-jaune" src="icone2_3.png">
				<select class="select yellow-select" name="c3" id="c3">
					<?php
						foreach ($colors as $value) {
							echo "<option value=".$value.">".$value."</option>";
						}
					?>
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
						$taille=(int)$_POST['taille'];
						$c1=$_POST['c1'];
						$c2=$_POST['c2'];
						$c3=$_POST['c3'];
						if (!empty($taille)) {
							for ($i=0; $i <$taille ; $i++) { 
							echo "<tr>";
							for ($j=0; $j <$taille ; $j++) { 
								if($j==$i || $i+$j==$taille-1 ||($i<$j && $i+$j<=$taille-1) ){
									echo "<td bgcolor='$c1'></td>";
								}elseif ($i>$j && $i+$j>=$taille-1) {
									echo "<td bgcolor='$c2'></td>";
								}else{
									echo "<td bgcolor='$c3'></td>";
								}
							}
						}
						}else{
							echo "Vueillez donner la taille de la matrice";
						}

				}
				?>
			</table>
			
			</div>
		</div>
		
		
	</div>

</body>
</html>