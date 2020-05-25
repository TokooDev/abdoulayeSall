SELECT malade.idMald AS numero, malade.nom, malade.dateNaissance ,chambre.idChamb AS chambreN°, chambre.categorie, chambre.typ AS TypeDeChambre
FROM malade, lit, chambre
WHERE malade.numLit = lit.numLit
AND lit.idChamb = chambre.idChamb