SELECT idMald AS numero, nom, adresse
FROM malade
WHERE EXTRACT(MONTH FROM dateOccupLit) = 2
OR EXTRACT(MONTH FROM dateOccupLit) = 12