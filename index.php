<?php

define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'univerity');
define('DB_PORT', '3306');

//var_dump(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
//var_dump($connection);

if($connection && $connection->connect_error){
    echo 'connection failed: ' . $connection->connect_error;
    die();
}

echo 'Connection Successeful!';

$sql = "SELECT `students`.`name` FROM `students` WHERE YEAR(`date_of_birth`)=1990";
//var_dump($sql);
$results = $connection->query($sql);
//var_dump($results);

if($results && $results->num_rows > 0){
    while($student = $results->fetch_assoc()){
?>
        <h2><?php echo $student['name']; ?></h2>
   <?php 
    }
}elseif($results){
    echo 'Nessun Risultato';
}else{
    echo 'Errore Query';
}

$connection->close();
?>