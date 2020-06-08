<?php
    require_once '../root.php';

    session_start();

    $errors = array();

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if(!empty($password_2) && !empty($username) && !empty($email) && !empty($password_1) && !empty($name)){
        if($password_1 == $password_2){
            
            // Verifica si no existe un usuario
            $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($conn, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if($user){ // Si existe
                if ($user['username'] === $username)
                    echo "Username already exists";
                    
                else if ($user['email'] === $email)
                    echo "Email already exists";

            } else{ // Si no
                $sql = "INSERT INTO user (name, username, email, password)
                VALUES ('{$name}', '{$username}', '{$email}','{$password_1}')";
                
                if(mysqli_query($conn, $sql)){
                    echo "Usuario registrado";
                    $_SESSION['username'] = $username;
                    //header('location: ../../feed.php');
                }
                else {
                    echo "Error: ".mysqli_error($conn);
                    //header('location: ../../index.html');
                }
    
            }

        } else
            echo "Las contraseñas no son iguales";
    }else
        echo "Hay campos vacios";

