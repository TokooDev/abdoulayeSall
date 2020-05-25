SELECT idMald AS numero, nom, dateNaissance 
FROM malade 
WHERE sexe = 'feminin' 
AND adresse LIKE 'p%' 
ORDER BY nom