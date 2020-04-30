For å sette opp nettstedet
	1. kjør dist\sql\tables.sql i mariaDB
	2. åpne dist\php\sign_up.php og registrer en bruker
	3. åpne mariaDB-konsoll og kjør "INSERT INTO admin(user_id) VALUES(<dinID>);" hvor <dinID> er 1 om
	   det er den første registrerte brukeren. For å være helt sikker kjør "SELECT * FROM users" og se hvilken
	   id det er som korresponderer med din bruker. Denne skal være <dinID>
	4. åpne dist\php\admin.php
	5. Under "Add category:" legg til typer komponenter, f.eks: CPU, GPU, RAM, SSD, HDD, osv. osv.
Nå er nettsiden brukbar