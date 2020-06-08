<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'streetart_1'; /*recuerden poner la suya :V*/

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Error al conectarse");
    //mysqli_close($conn);
?>