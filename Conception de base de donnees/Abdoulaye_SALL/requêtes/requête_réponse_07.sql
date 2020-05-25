SELECT malade.idMald AS numero, malade.nom, malade.dateNaissance
FROM malade, medecin, feuilleevolution
WHERE feuilleevolution.idMed = medecin.idMed
AND feuilleevolution.idMald = malade.idMald
AND medecin.nom = "M3"