SELECT COUNT(malade.numLit) AS totalMalades, departement.nom AS nomDuDepartement
FROM malade, departement, lit, chambre
WHERE chambre.numDep = departement.numDep
AND lit.idChamb = chambre.idChamb
AND malade.numLit = lit.numLit
GROUP BY nomDuDepartement
ORDER BY nomDuDepartement