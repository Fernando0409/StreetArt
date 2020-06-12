<?php
    require_once '../root.php';
    session_start();

    // Capturo el email o username del usuario
    $username = $_SESSION['username'];
    $text = $_POST['comentarios'];

    // Recolecto los valores del archivo
    $nameFile = $_FILES['fileUser']['name'];
    $typeFile = $_FILES['fileUser']['type'];
    $sizeFile = $_FILES['fileUser']['size'];

    echo $username."<br>";
    echo $nameFile."<br>";
    echo $typeFile."<br>";
    echo $sizeFile."<br>";
    echo $text."<br>";

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
                
                if(mysqli_query($conn, $sql))
                    header("Location: ../../index.php");
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