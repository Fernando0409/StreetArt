<?php
    require_once '../root.php';
    session_start();

    $user = false;

    $correo = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($correo) && !empty($pass)){
      $query = "SELECT COUNT(*) AS contar FROM user WHERE email = '{$correo}' AND password='{$pass}'";

      $result = mysqli_query($conn, $query);
      $array = mysqli_fetch_array($result);

      if($array['contar'] > 0) {
          $_SESSION['email'] = $correo;
          header('location: ../../index.php');
      } else {
          $query = "SELECT COUNT(*) AS contar FROM user WHERE username = '{$correo}' AND password='{$pass}'";

          $result = mysqli_query($conn, $query);
          $array = mysqli_fetch_array($result);

          if($array['contar'] > 0){
            $_SESSION['email'] = $correo;
            header('location: ../../index.php');
          } else 
              echo "Verifica los datos";
      }
    } else
        echo "No se ingreso email o contraseña";
    