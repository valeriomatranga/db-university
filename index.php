<?php

//definite le constanti
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'univerity');
define('DB_PORT', '3306');


//stabilita la connessione al database
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);


// verifica la connessione
if($connection && $connection->connect_error){
    echo 'connection failed: ' . $connection->connect_error;
    die();
}


//creata una richiesta query
$sql = "SELECT `students`.`name`,`students`.`surname` FROM `students` WHERE YEAR(`date_of_birth`)=1990";
$results = $connection->query($sql);


//stampa tramite ciclo while i risultati della query
if($results && $results->num_rows > 0){
    while($student = $results->fetch_assoc()){ ?>

    <ul>
        <li>
            <div>
                <span><?php echo $student['surname'];?></span>
                <span><?php echo $student['name'];?></span>
            </div>
        </li>
    </ul>
    
   <?php 
    }
}elseif($results){
    echo 'Nessun Risultato';
}else{
    echo 'Errore Query';
}

//chiude la connessione al database
$connection->close();
?>