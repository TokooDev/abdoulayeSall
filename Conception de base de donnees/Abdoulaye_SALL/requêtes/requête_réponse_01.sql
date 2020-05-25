SELECT medecin.idMed AS numero, medecin.nom 
FROM medecin , specialite
WHERE medecin.idSpec = specialite.idSpec
AND specialite.libelle = 'S1'