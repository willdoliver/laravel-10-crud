<?php
$host = 'db';
$user = 'devuser';
$password = 'devpass';
$db = 'processoSeletivo2021_William_Souza';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error){
    echo 'connection failed' . $conn->connect_error;
} else {
    echo 'Successfully connected to MySql';
}
?>