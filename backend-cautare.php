<?php
    if(isset($_REQUEST["term"])){
        require_once "conectare_db.php";
        $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($connection -> connect_errno){
            die("ERROR: Nu se poate conecta la baza de date. " . $connection->connect_error);
            exit();
        }
        $sql = "SELECT * FROM numere WHERE nume LIKE ? OR prenume LIKE ? ORDER BY nume";
        if($stmt = $connection->prepare($sql)){
            $param_term = '%' . $_REQUEST["term"] . '%';         // setare parameterul de cautare ....nume/prenume sa contina term
            $stmt->bind_param("ss", $param_term, $param_term);            // leaga variabila de parametru si construieste un enunt
            if($stmt->execute()){                                               // executa enuntul construit anterior
                $result = $stmt->get_result();
                    if($result->num_rows > 0){                                  // verifica numarul de randuri din result
                        while($row = $result->fetch_array(MYSQLI_ASSOC)){       // aduce intr-o matrice aociata randurile resultate
                            echo "<p>" . $row["nume"] . " " . $row["prenume"] . "</p>";
                        }
                    } else{
                        echo "Nu exista un contact cu aceste litere.";
                    }
            } else{
                echo "ERROR: Nu se poate executa" . $sql . mysqli_error($connection);
                exit();
            }
        }
        $stmt->close();
        $connection->close();
    }
?>