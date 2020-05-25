SELECT COUNT(malade.idMald) AS nombreDeMalade,  departement.numDep AS numeroDuDepartement, departement.nom AS nomDuDepartement
FROM malade, lit, chambre, departement
WHERE malade.numLit = lit.numLit
AND lit.idChamb = chambre.idChamb
AND chambre.numDep = departement.numDep
GROUP BY numeroDuDepartement
ORDER BY numeroDuDepartement DESC
LIMIT 1
