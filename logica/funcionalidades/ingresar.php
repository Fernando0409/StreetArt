<?php
    require_once '../root.php';
    session_start();

    $errors = array();

    $correo = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($correo) && !empty($pass)){
        
        $query = "SELECT * FROM user WHERE email='$correo' OR username='$correo' AND password='$pass'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1 ) {
            
            $_SESSION['email'] = $correo;
            $_SESSION['success'] = "You are now logged in";
            echo "Iniciando sesion... <br>";
            echo $correo."<br>";
            echo $pass;
            //header('location: perfil.php');

          } else
            echo "Correo electronico o contraseña erroneos";
    } else
        echo "No se ingreso email o contraseña";
    