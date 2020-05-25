SELECT malade.idMald AS numero, malade.nom, malade.dateNaissance,departement.numDep AS numeroDuDepartement,departement.nom AS nomDudepartement
FROM malade ,lit,chambre, departement
WHERE malade.numLit = lit.numLit
AND lit.idChamb = chambre.idChamb
AND chambre.numDep = departement.numDep
AND malade.dateNaissance = '2012-04-22'
