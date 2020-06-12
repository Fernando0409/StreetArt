<?php
    require_once '../root.php';
    session_start();

    // Capturo el email o username del usuario
    $username = $_SESSION['usernameLogin'];
    $text = $_POST['comentarios'];

    // Recolecto los valores del archivo
    $nameFile = $_FILES['fileUser']['name'];
    $typeFile = $_FILES['fileUser']['type'];
    $sizeFile = $_FILES['fileUser']['size'];

    if($_POST['baile'] || $_POST['dibujo'] || $_POST['film']  || $_POST['pintura'] || $_POST['animacion'] || $_POST['fotografia'] || $_POST['canto']){
        
        $baile = $_POST['baile'];
        $dibujo = $_POST['dibujo']; 
        $film = $_POST['film'];  
        $pintura = $_POST['pintura'];
        $animacion = $_POST['animacion']; 
        $fotografia = $_POST['fotografia'];
        $canto = $_POST['canto'];

        if(!empty($username) && (!empty($nameFile) || !empty($text))){
                // Un megabyte
            if($sizeFile <= 2000000000){
                // Imagenes
                if($typeFile == "image/jpeg" || $typeFile == "image/jpeg" || $typeFile == "image/png" || $typeFile == "image/gif"){
                    //                          C:\xampp\htdocs /Universidad\Equipo5_PI\servidor\imagenes/
                    
                    $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/Universidad/Equipo5_PI/servidor/imagenes/';
                    move_uploaded_file($_FILES['fileUser']['tmp_name'], $carpetaDestino.$nameFile);

                    $sql = "INSERT INTO post (username, description, file) 
                    VALUES ('{$username}', '{$text}', '{$nameFile}')";
                    
                    if(mysqli_query($conn, $sql)){
                        // Se añaden las categorias
                        $id_post = "";
                        $sql = "SELECT id FROM post WHERE username = '$username'";
                        $result = mysqli_query($conn, $sql);
                        while($valor = mysqli_fetch_array($result))
                            $id_post = $valor['id'];

                        if($_POST['baile']){
                            $sql = "INSERT INTO categorias(username, categoria, id_post) VALUES ('{$username}', 'baile', '$id_post')";
                            mysqli_query($conn, $sql);
                        }
                        if($_POST['dibujo']){
                            $sql = "INSERT INTO categorias(username, categoria, id_post) VALUES ('{$username}', 'dibujo', '$id_post')";
                            mysqli_query($conn, $sql);
                        }
                        if($_POST['film']){
                            $sql = "INSERT INTO categorias(username, categoria, id_post) VALUES ('{$username}', 'film', '$id_post')";
                            mysqli_query($conn, $sql);
                        }
                        if($_POST['pintura']){
                            $sql = "INSERT INTO categorias(username, categoria, id_post) VALUES ('{$username}', 'pintura', '$id_post')";
                            mysqli_query($conn, $sql);
                        }
                        if($_POST['animacion']){
                            $sql = "INSERT INTO categorias(username, categoria, id_post) VALUES ('{$username}', 'animacion', '$id_post')";
                            mysqli_query($conn, $sql);

                        }
                        if($_POST['fotografia']){
                            $sql = "INSERT INTO categorias(username, categoria, id_post) VALUES ('{$username}', 'fotografia', '$id_post')";
                            mysqli_query($conn, $sql);
                        }
                        if($_POST['canto']){
                            $sql = "INSERT INTO categorias(username, categoria, id_post) VALUES ('{$username}', 'canto', '$id_post')";
                            mysqli_query($conn, $sql);
                        }
                        header("Location: ../../index.php");
                    }
                    else
                        echo "Error: ".mysqli_error($conn);
                    
                    // Videos
                } else if($typeFile == "video/mp4" || $typeFile == "video/avi" || $typeFile == "video/mkv" || $typeFile == "video/wmv"){
                    
                    $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/Universidad/Equipo5_PI/servidor/videos/';
                    move_uploaded_file($_FILES['fileUser']['tmp_name'], $carpetaDestino.$nameFile);

                    //echo "<script> alert('Se subio el video'); </script>";

                    $sql = "INSERT INTO post (username, description, file) 
                            VALUES ('{$username}', '{$text}', '{$nameFile}')";

                    if(mysqli_query($conn, $sql))
                        header("Location: ../../index.php");
                    else
                        echo "Error: ".mysqli_error($conn);

                } else{
                    echo "<script> alert('Archivos invalidos'); </script>";
                }
            }else
                echo "El archivo es demasiado grande.";
        }
    }