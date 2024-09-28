<?php
    require_once '../root.php';
    session_start();

    $user = false;

    $correo = mysqli_real_escape_string($conn, $_POST['email']);  // Puede ser el email o username
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($correo) && !empty($pass)){ // Si no estan vacios

      // Consulta si el usuario se logeo con el email
      $query = "SELECT COUNT(*) AS contar FROM user WHERE email = '{$correo}' AND password='{$pass}'";

      $result = mysqli_query($conn, $query);
      $array = mysqli_fetch_array($result);

      // Si es asi va a recuperar el username que tiene ese correo
      if($array['contar'] > 0) {
        $username = "";
        $sql = "SELECT * FROM user WHERE email = '$correo'";
        $result = mysqli_query($conn, $sql);
        
        while($users = mysqli_fetch_array($result)){
            $username = $users['username'];
        }
          $_SESSION['usernameLogin'] = $username;
          header('location: ../../index.php');
      } 
      else { // De lo contrario revisara si se logeo con el username
          $query = "SELECT COUNT(*) AS contar FROM user WHERE username = '{$correo}' AND password='{$pass}'";

          $result = mysqli_query($conn, $query);
          $array = mysqli_fetch_array($result);

          if($array['contar'] > 0){
            $_SESSION['usernameLogin'] = $correo;
            header('location: ../../index.php');
          } else 
              echo "Verifica los datos";
      }
    } else
        echo "No se ingreso email o contraseña";
    