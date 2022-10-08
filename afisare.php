<html>
    <head>
        <title>Agenda Telefonica - Afisare</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="Agenda telefonica">
  		<meta name="keywords" content="HTML, PHP, CSS">
  		<meta name="author" content="Zane Livia, CR2.3B">
    	<link rel="stylesheet" href="styles.css">
    </head>

    <body>
		<form class=form_afisare action="modificare.php" method="post">
	    	<input type="hidden" name="id" value=<?php echo $_GET["id"]; ?>><br><br>
	    	<input type="hidden" name="user_id" value=<?php echo $_GET["user_id"]; ?>>
	    	Nume: <input type="text" name="nume" value=<?php echo $_GET["nume"]; ?>><br><br>
	    	Prenume: <input type="text" name="prenume" value=<?php echo $_GET["prenume"]; ?>><br><br>
	    	Telefon: <input type="text" name="tel" value=<?php echo $_GET["tel"]; ?>><br><br>
	    	<button type="submit" >Modificare contact</button> <br><br>
		</form>
		<button onclick= <?php echo "document.location='stergere.php?user_id=" . $_GET["user_id"] . "&id=" . $_GET["id"] . "'"; ?> >Stergere contact</button><br><br><br>
        <!--  <button onclick= <?php echo "document.location='cautare.php?user_id=" . $_GET["user_id"] . "'"; ?> >Afisare contacte</button> -->
    
            <form action="cautare.php?" method="post">
            	<input type="hidden" name="user_id" value= <?php echo $_GET["user_id"] ?> >
            	<button type="submit" >Afisare contacte</button>
            </form>
    
    </body>
</html>