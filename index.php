<?php
//definite le constanti
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'univerity');
define('DB_PORT', '3306');
//var_dump(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

//stabilita la connessione al database
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
//var_dump($connection);


// verifica la connessione
if($connection && $connection->connect_error){
    echo 'connection failed: ' . $connection->connect_error;
    die();
}
//echo 'Connection Successeful!';


//creata una richiesta query
$sql = "SELECT `students`.`name`,`students`.`surname` FROM `students` WHERE YEAR(`date_of_birth`)=1990";
//var_dump($sql);
$results = $connection->query($sql);
//var_dump($results);


//stampa tramite ciclo while i risultati della query
if($results && $results->num_rows > 0){
    while($student = $results->fetch_assoc()){
    ?>
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

$connection->close();
?>