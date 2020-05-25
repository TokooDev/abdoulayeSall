SELECT COUNT(malade.idMald) AS nombreDeMalade, chambre.idChamb AS numeroChambre, chambre.categorie, chambre.typ AS typeDeChambre 
FROM malade, lit, chambre
WHERE malade.numLit = lit.numLit
AND lit.idChamb = chambre.idChamb
GROUP BY numeroChambre
ORDER BY nombreDeMalade DESC
LIMIT 1
