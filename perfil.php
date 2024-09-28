<!-- bootstrap no borrar  -->
<link href="resources/bootstrap/css/bootstrap4.min.css" rel="stylesheet" id="bootstrap-css">
<link href="resources/bootstrap/css/bootstrap3.min.css" rel="stylesheet" id="bootstrap-css">
<script src="resources/bootstrap/js/bootstrap4.min.js"></script>
<script src="resources/bootstrap/js/jquery3.min.js"></script>
<script src="resources/bootstrap/js/bootstrap3.min.js"></script>
<script src="resources/bootstrap/js/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
<link href="resources/css/stylesheet.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="resources/css/stylesheet.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="resources/css/stylesheet.css" rel="stylesheet">

<script src="resources/js/jquery-3.3.1.slim.min.js"></script>
<script src="resources/js/popper.min.js"></script>
<script src="resources/js/bootstrap4.1.min.js"></script>
</head>
<body>
<?php
    require_once 'logica/root.php';
    session_start();

    $userLink = $_SESSION['usuarioLink'];
    $estado = $_SESSION['key'];

    if(!isset($_SESSION['usernameLogin']))
        header("Location: signUp.php");
    
    else if(!empty($userLink) && $estado == 1){

        $userLink = $_SESSION['usuarioLink'];
        // De la tabla, de los datos usuarios. 
        $description_user = "";
        $name = ""; $email = "";
        $photo = ""; 

        // Consulta los datos del usuario 
        $query = "SELECT * FROM data_user WHERE username = '{$userLink}'";
        $result = mysqli_query($conn, $query);

        while($users = mysqli_fetch_array($result))
            $description_user = $users['description'];
        
        // Consulta los datos generales del usuario
        $query = "SELECT * FROM user WHERE username = '{$userLink}'";
        $result = mysqli_query($conn, $query);

        while($users = mysqli_fetch_array($result)){
            $name = $users['name'];
            $email = $users['email'];
            $photo= $users['photo'];
        }

    } else{
        $username = $_SESSION['usernameLogin'];

        // De la tabla, de los datos usuarios. 
        $description_user = "";
        $name = ""; $email = "";
        $photo = ""; 

        // Consulta los datos del usuario 
        $query = "SELECT * FROM data_user WHERE username = '{$username}'";
        $result = mysqli_query($conn, $query);

        while($users = mysqli_fetch_array($result))
            $description_user = $users['description'];
        
        // Consulta los datos generales del usuario
        $query = "SELECT * FROM user WHERE username = '{$username}'";
        $result = mysqli_query($conn, $query);

        while($users = mysqli_fetch_array($result)){
            $name = $users['name'];
            $email = $users['email'];
            $photo= $users['photo'];
        }
    }
 ?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="row panel">
    <!-- aqui es donde llama la foto de bootstrap o quien sabe de donde pero pues es solo cambiar la direccion de donde la va a tomar -->
        <div class="col-md-8  col-xs-12">
           <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail picture hidden-xs" />
           <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail visible-xs picture_mob" />
           <div class="header">
                <h1> <?php 
                        if(!empty($userLink) && $estado == 1)
                            echo $userLink;
                        else
                            echo $username;
                    ?>
                </h1>
                <h4>Areas: </h4>
                <span><?php if(!empty($userLink) && $estado == 1)
                                echo $description_user;
                            else
                                echo $username; 
                        ?>
                </span>
           </div>
        </div>
        <!-- son 3 botones difertentes que se encuentran en el archivo stylesheet.css -->
        <div class="col-md-3 bg_blur ">
        <form action="logica/funcionalidades/follow.php" method="post">
            <button type="submit" style="border: none;"><a class="follow_btn hidden-xs">Seguir</a></button>
        </form>
          <a href="#" class="follow_btn2 hidden-xs">Mensaje</a>
          <a href="#" class="follow_btn3 hidden-xs">Donar</a>
    </div>
    <div class="row nav">    
        <div class="col-md-1"></div>
        <div class="col-md-18 col-xs-12" style="margin:0px;padding:0px;">
    </div>   
</div>
</div>
</div>
    <!-- la barra aqui las imagenes fa fa no se muestran aun que esten no se por que, pueden solucionarlo estaria genial pero asi simple tambien se ve cool  <3  -->
    <div class="row nav">    
        <div class="col-md-1"></div>
        <div class="col-md-18 col-xs-12" style="margin:0px;padding:0px;">
            <!--well lo llama del archivo stylesheet.css es una clase -->
            <a  href="index.php" class="col-md-2 col-xs-2 well"><i class="fa fa-camera fa-lg"> Home</i> </a>
            <a  href="#" class="col-md-2 col-xs-2 well"><i class="fa fa-camera fa-lg"> Fotos</i> </a>
            <a  href="#" class="col-md-2 col-xs-2 well"><i class="fa fa-camera fa-lg"> Videos</i> </a>
            <a  href="#" class="col-md-2 col-xs-2 well"><i class="fa fa-camera fa-lg"> Seguidores</i> </a>
            <a  href="#" class="col-md-2 col-xs-2 well"><i class="fa fa-camera fa-lg "> Seguidos</i> </a>
             <a href="sett.php" class="col-md-2 col-xs-2 well"><i class="fa fa-camera fa-lg "> Configuración</i> </a>
        </div>
    </div>
</div>
<div class="container-fluid gedf-wrapper">
    <!-- este containet tiene la parte inferior izquierda -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">seguidores recientes</div>
                            <div class="h5">5.2342</div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">videos mas populares</div>
                            <div class="h5">aun no hay videos, ¡que esperas! sube tu primer video</div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Donde hacen las publicaciones ---->
            <div class="col-md-6 gedf-main">
                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                            <!--aqui y un poco mas abajo es para que aparezca la opcion de escribir y subir imagenpero  tiene un bug que no deberia tener y es cuando entras no aparecen tienes que cambiar a "imagen" y ahi te aparece despues todo bien despues regresas a "make a publication" y ya sale el recuadro para escribir -->
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make a publication</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                            </li>
                            <!-- importante aqui no me aparece esto en ningun lado y es mega importante asi que si pudieran hacer que aparezca y funcione estaria excelente ya que trate estos 2 dias saliera pero no lo logre -->
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                                </div>
                            </div>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div>
                                </div>
                                <div class="py-4"></div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">share</button>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Post /////-->
                            <!-- aqui estan las publicaciones que pues ya tienes que jalar de la base de datos -->
                <!--- \\\\\\\Post-->

    <?php
        if(!empty($userLink) && $estado == 1){

            $query = "SELECT * FROM post WHERE username = '{$userLink}'";
            $result = mysqli_query($conn, $query);

            while($users = mysqli_fetch_array($result)){
                $file = $users['file'];
                echo 
                    "
                    <div class='card gedf-card'>
                    <div class='card-header'>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='d-flex justify-content-between align-items-center'>
                                <div class='mr-2'>
                                    <img class='rounded-circle' width='45' src='https://picsum.photos/50/50' alt='Imagen de perfil'>
                                </div>
                                <div class='ml-2'>
                                    <div class='h4 m-0'>".$userLink."</div>
                                    <div class='h5 text-muted'>".$userLink."</div>
                                </div>
                            </div>
                        <div>
                            <div class='dropdown'>
                                <button class='btn btn-link dropdown-toggle' type='button' id='gedf-drop1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='fa fa-ellipsis-h'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='gedf-drop1'>
                                    <div class='h6 dropdown-header'>Configuration</div>
                                    <a class='dropdown-item' href='#'>Save</a>
                                    <a class='dropdown-item' href='#'>Hide</a>
                                    <a class='dropdown-item' href='#'>Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='card-body'>
                    <div class='text-muted h7 mb-2'> <i class='fa fa-clock-o'></i>Fecha de la publicacion</div>
                    <p class='card-text'>".$users['description']."</p>"?><?php
                    if(!empty($users['file'])){
                        echo "<img src='/Universidad/Equipo5_PI/servidor/imagenes/$file' width='65%' align='center'>";
                    } ?>
                <?php
                echo "
                    </div>
                    <div class='card-footer'>
                        <a href='#' class='card-link'><i class='fa fa-gittip'></i> Like</a>
                        <a href='#' class='card-link'><i class='fa fa-comment'></i> Comment</a>
                        <a href='#' class='card-link'><i class='fa fa-mail-forward'></i> Share</a>
                    </div>
                </div>
                    ";
            }

        } else{
            $description = "";
            $date = "";     $file = "";
            $tags = "";     $reactions = "";
            $comments = "";

            $query = "SELECT * FROM post WHERE username = '{$username}'";
            $result = mysqli_query($conn, $query);

            while($users = mysqli_fetch_array($result)){
                $file = $users['file'];
                echo 
                    "
                    <div class='card gedf-card'>
                    <div class='card-header'>
                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='d-flex justify-content-between align-items-center'>
                                <div class='mr-2'>
                                    <img class='rounded-circle' width='45' src='https://picsum.photos/50/50' alt='Imagen de perfil'>
                                </div>
                                <div class='ml-2'>
                                    <div class='h4 m-0'>".$username."</div>
                                    <div class='h5 text-muted'>".$name."</div>
                                </div>
                            </div>
                        <div>
                            <div class='dropdown'>
                                <button class='btn btn-link dropdown-toggle' type='button' id='gedf-drop1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <i class='fa fa-ellipsis-h'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='gedf-drop1'>
                                    <div class='h6 dropdown-header'>Configuration</div>
                                    <a class='dropdown-item' href='#'>Save</a>
                                    <a class='dropdown-item' href='#'>Hide</a>
                                    <a class='dropdown-item' href='#'>Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='card-body'>
                    <div class='text-muted h7 mb-2'> <i class='fa fa-clock-o'></i>Fecha de la publicacion</div>
                    <p class='card-text'>".$users['description']."</p>"?><?php
                    if(!empty($users['file'])){
                        echo "<img src='/Universidad/Equipo5_PI/servidor/imagenes/$file' width='65%' align='center'>";
                    } ?>
                <?php
                echo "
                    </div>
                    <div class='card-footer'>
                        <a href='#' class='card-link'><i class='fa fa-gittip'></i> Like</a>
                        <a href='#' class='card-link'><i class='fa fa-comment'></i> Comment</a>
                        <a href='#' class='card-link'><i class='fa fa-mail-forward'></i> Share</a>
                    </div>
                </div>
                    ";
            }
        }   
    ?>

            </div>
        </div>
    </div>
    </body>
