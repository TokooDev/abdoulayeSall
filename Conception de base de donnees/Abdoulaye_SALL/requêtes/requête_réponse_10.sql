SELECT  malade.idMald AS numero ,malade.nom, malade.dateNaissance,feuilleevolution.idFeuil AS numeroDeSuivi, feuilleevolution.date AS dateDeSuivi
FROM malade, feuilleevolution
WHERE malade.idMald = feuilleevolution.idMald
AND malade.idMald = 11
