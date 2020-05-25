SELECT malade.idMald AS numero, malade.nom,malade.dateOccupLit AS dateInternement, medecin.nom AS suiviPar, feuilleevolution.date AS dateDeSuivi
FROM malade,lit,chambre,departement,medecin,feuilleevolution
WHERE malade.numLit = lit.numLit
AND lit.idChamb = chambre.idChamb
AND chambre.numDep = departement.numDep
AND malade.idMald = feuilleevolution.idMald
AND medecin.idMed = feuilleevolution.idMed
AND departement.nom = 'D2'
AND EXTRACT(MONTH FROM malade.dateOccupLit) = 6
AND EXTRACT(YEAR FROM malade.dateOccupLit) = 2020
ORDER BY dateInternement
LIMIT 1
