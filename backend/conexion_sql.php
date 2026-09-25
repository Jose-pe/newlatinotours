<?php
/*local

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'latinobd';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    } else{
        ('Conexion exitosa');
    }*/

//production

$host = 'lsql105.infinityfree.com';
$user = 'if0_35945180';
$pass = 'IN1H4mIuJyAMG';
$db   = 'if0_35945180_latino';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    else{
        //echo('Conexion exitosa');
    }

?>