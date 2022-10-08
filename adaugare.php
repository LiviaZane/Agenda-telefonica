<!DOCTYPE html>
<html lang="en">
<head>
	<title>Agenda Telefonica - Adaugare</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<form class=form_adaugare action="adaugare_insert.php" method="post">
    	<p>
        	<label for="firstName">Nume:</label>
        	<input type="text" name="nume" id="firstName" autofocus>
   		</p>
    	<p>
        	<label for="lastName">Prenume:</label>
        	<input type="text" name="prenume" id="lastName">
    	</p>
    	<p>
        	<label for="telefon">Telefon:</label>
        	<input type="text" name="tel" id="telef">
        
        	<input type="hidden" name="user_id" value= <?php echo $_POST["user_id"] ?> >
    	</p>
    	<button type="submit">Salveaza contact</button>
	</form>
</body>
</html>