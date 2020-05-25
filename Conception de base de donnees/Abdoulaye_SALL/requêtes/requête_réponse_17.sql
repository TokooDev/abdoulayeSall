SELECT COUNT(feuilleevolution.idFeuil) AS nombreDeMaladeSuivi, medecin.idMed AS numeroDuMedecin, medecin.nom AS nomDuMedecin, specialite.libelle AS specialite
FROM feuilleevolution, medecin, specialite
WHERE feuilleevolution.idMed = medecin.idMed
AND medecin.idSpec = specialite.idSpec
GROUP BY numeroDuMedecin
ORDER BY nombreDeMaladeSuivi DESC
LIMIT 1
