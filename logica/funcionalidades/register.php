<?php
    require_once '../root.php';

    session_start();

    $errors = array();

    $nickname = mysqli_real_escape_string($db, $_POST['nickname']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if(!empty($password_2) && !empty($nickname) && !empty($email) && !empty($password1) && !empty($name)){
        if($password1 == $password_2){
            
            // Verifica si no existe un usuario
            $user_check_query = "SELECT * FROM user WHERE username='$nickname' OR email='$email' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if($user){ // Si existe
                if ($user['username'] === $username)
                    array_push($errors, "Username already exists");
                    
                else if ($user['email'] === $email)
                    array_push($errors, "Email already exists");

            } else{ // Si no
                $sql = "INSERT INTO user (name, nickname, email, password)
                VALUES ('{name}', '{$nickname}', '{$email}','{$password}')";
                
                if(mysqli_query($conn, $sql)){
                    echo "Usuario registrado";
                    $_SESSION['username'] = $nickname;
                    header('location: ../../feed.php');
                }
                else {
                    echo "Error: ".mysqli_error($conn);
                    header('location: ../../index.html');
                }
    
            }
        }
    }

