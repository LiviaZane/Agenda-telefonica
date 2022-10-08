<!DOCTYPE html>
<html>
<head>
    <title>Agenda Telefonica - Cautare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Agenda telefonica">
  	<meta name="keywords" content="HTML, PHP, CSS">
  	<meta name="author" content="Zane Livia, CR2.3B">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
	<input id="myInput" type="text" placeholder="Cautare..." autofocus><br><br>
	<input hidden=true type="text" id="userid" value=<?php echo $_POST["user_id"]; ?> >
    <div>
		<script src="script_filter_table.js"></script>
    	<table id="myTable">
    		<col span="2" style="visibility: collapse">  <!-- nu afiseaza primele 2 coloane...id si tel -->
  	    	<thead>
  				<tr>
    		    	<th>Id</th>
    		    	<th>Tel</th>
    		    	<th>Nume</th>
    		    	<th>Prenume</th>
  				</tr>
  	    	</thead>
  	    	<tbody id="myTab">
				<?php
   		            require_once "conectare_db.php";
   		            $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
   		            if($connection -> connect_errno){
   		                die("ERROR: Nu se poate conecta la baza de date. " . $connection->connect_error);
   		            }
		            $sql = "SELECT id, nume, prenume, tel FROM numere WHERE user_id=" . $_POST["user_id"] . " ORDER BY nume";
		            $result = $connection->query($sql);
		            if ($result->num_rows > 0) {
	  		            while($rand = $result->fetch_assoc()) {
	  		                echo '<tr><td>' . $rand['id'] . '</td><td>' . $rand['tel']  . '</td><td>' . $rand['nume'] . '</td><td>' . $rand['prenume'] . '</td></tr>';
  		                }
			            echo '</table>';
		            } else {
  	      		        echo "0 contacte selectate";
		            }
        	        $connection->close();
      		    ?>
	        </tbody>
	    </table>
    </div>
    <script src="script_to_afisare.js"></script>
    <!-- <button onclick= <?php echo "document.location='adaugare.php?user_id=" . $_POST["user_id"] . "'"; ?> >Adaugare contact nou</button>  -->

			<form action="adaugare.php?" method="post">
            	<input type="hidden" name="user_id" value= <?php echo $_POST["user_id"] ?> >
            	<button type="submit" >Adaugare contact nou</button>
    		</form>

</body>
</html>
