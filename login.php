<?php
    require_once "conectare_db.php";
    $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($connection -> connect_errno){
        die("ERROR: Nu se poate conecta la baza de date. " . $connection->connect_error);
    }
    if (isset($_POST["user_nou"])) {
        $sql = "INSERT INTO utilizatori (user, password) VALUES ('" . $_POST["uname"] . "', '" . $_POST["psw"] . "')";
        if(mysqli_query($connection, $sql)){
            $last_id = $connection->insert_id;
            // echo "Utilizator adaugat.";
        } else{
            echo "EROARE: Nu se poate executa $sql. " . mysqli_error($connection);
            exit();
        }
        $connection->close();
        // header("Location: cautare.php?user_id=" . $last_id);
        ?>
            <html>
            	<form id="autosubmit" action="cautare.php?" method="post">
            		<input type="hidden" name="user_id" value= <?php echo $last_id ?> >
            		<script>
    					document.getElementById("autosubmit").submit();
					</script>
            	</form>
            </html>
			<?php
    } else {
        $sql = "SELECT user_id FROM utilizatori WHERE user='" . $_POST["uname"] . "' AND password='" . $_POST["psw"] . "'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $rand = $result->fetch_assoc();
            $connection->close();
            // header("Location: cautare.php?user_id=" . $rand["user_id"]);
            ?>
            <html>
            	<form id="autosubmit" action="cautare.php?" method="post">
            		<input type="hidden" name="user_id" value= <?php echo $rand["user_id"] ?> >
            		<script>
    					document.getElementById("autosubmit").submit();
					</script>
            	</form>
            </html>
			<?php
        } else {
            $connection->close();
            header("Location: index.html?err");
        }   
    }
    ?>