SELECT malade.idMald AS numero, malade.nom AS nomMalade, malade.adresse, medecin.nom AS nomMedecin
FROM malade, departement, lit, chambre,medecin, feuilleevolution
WHERE chambre.numDep = departement.numDep
AND lit.idChamb = chambre.idChamb
AND malade.numLit = lit.numLit
AND feuilleevolution.idMed = medecin.idMed
AND feuilleevolution.idMald = malade.idMald
AND departement.nom = 'D2'