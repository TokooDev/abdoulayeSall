SELECT malade.idMald AS numero, malade.nom, malade.dateNaissance, chambre.idChamb AS chambreN°, lit.numLit AS litN°
FROM malade, chambre, lit, medecin, feuilleevolution, specialite
WHERE malade.numLit = lit.numLit
AND lit.idChamb = chambre.idChamb
AND feuilleevolution.idMed = medecin.idMed
AND feuilleevolution.idMald = malade.idMald
AND medecin.idSpec = specialite.idSpec
AND specialite.libelle = "S2"