<?php
    require_once '../root.php';
    session_start();

    $user = $_GET["username"];
    $sql = "SELECT username FROM user WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);

    $perfil = "";

    while($user = mysqli_fetch_array($result)){
        $_SESSION['usuarioLink'] = $user['username'];
        $_SESSION['key'] = 1;
        header("location: ../../perfil.php");
    } 

    