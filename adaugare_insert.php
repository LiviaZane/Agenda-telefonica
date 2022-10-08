<?php
    require_once "conectare_db.php";
    $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($connection -> connect_errno){
        die("ERROR: Nu se poate conecta la baza de date. " . $connection->connect_error);
        exit();
    }
    $nume = mysqli_real_escape_string($connection, $_REQUEST['nume']);
    $prenume = mysqli_real_escape_string($connection, $_REQUEST['prenume']);
    $tel = mysqli_real_escape_string($connection, $_REQUEST['tel']);
    $user_id = mysqli_real_escape_string($connection, $_REQUEST['user_id']);
    $sql = "INSERT INTO numere (nume, prenume, tel, user_id) VALUES ('$nume', '$prenume', '$tel', '$user_id')";
    if(mysqli_query($connection, $sql)){
        // echo "Contact adaugat.";
    } else{
        echo "ERROR: Nu se poate executa $sql. " . mysqli_error($connection);
        exit();
    }
    $connection->close();
    //header("Location: cautare.php?user_id=" . $_REQUEST['user_id']);
?>
<html>
	<form id="autosubmit" action="cautare.php?" method="post">
		<input type="hidden" name="user_id" value= <?php echo $user_id ?> >
		<script>
			document.getElementById("autosubmit").submit();
		</script>
	</form>
</html>