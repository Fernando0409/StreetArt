<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>StreetArt</title>
    <link rel="stylesheet" href="resources/css/styles_fotografia.css">
    <script src="https://kit.fontawesome.com/66fa17c514.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        session_start();
        $user_email = $_SESSION['usernameLogin'];

        if(!isset($user_email))
            header("Location: signUp.php");
    ?>
        <div class="wrapper">
            <div class="sidebar">
                <h2>StreetArt</h2>
                <div class="perfil">
                    <div class="foto_perfil"><img src="resources/img/icons/profile.png" alt=""></div>
                    <div class="name">
                        <?php echo "<span> $user_email </span>"?></div>
                </div>
                <ul class="menu">
                    <li><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="#"><i class="fas fa-bell"></i></i>Notifications</a></li>
                    <li><a href="#"><i class="fas fa-comment-dots"></i>Messages</a></li>
                    <li><a href="#"><i class="fas fa-align-justify"></i>Categories</a>
                        <ul>
                            <li><a href="baile.php"><i class="fas fa-shoe-prints"></i>Dance</a></li>
                            <li><a href="dibujo.php"><i class="fas fa-pencil-alt"></i>Drawing</a></li>
                            <li><a href="film.php"><i class="fas fa-film"></i>Film</a></li>
                            <li><a href="pintura.php"><i class="fas fa-palette"></i>Paint</a></li>
                            <li><a href="animacion.php"><i class="fas fa-file-video"></i>Animation</a></li>
                            <li><a href="fotografia.php"><i class="fas fa-camera-retro"></i>Fotography</a></li>
                            <li><a href="canto.php"><i class="fas fa-music"></i>Sing</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="settings">
                    <ul>
                        <li><a href="#"><i class="fas fa-cogs"></i>Settings</a></li>
                        <li><a href="logica/funcionalidades/exit.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="main_content">
                <div class="header">
                    <div id="navbar">
                        <nav>
                            <form action="#">
                                <input type="search" placeholder="Search..." aria-label="Search">
                                <input type="submit" value="Search">
                            </form>
                        </nav>
                    </div>
                </div>
                <div class="info">
                    <form action="#">
                        <div class="subtitle">
                            <h3>What are you think?...</h3>
                        </div>
                        <div class="publications"><textarea placeholder="Write your comments" name="comentarios" rows="3"></textarea></div>
                        <div class="categories">
                            <h3>Selecciona la categoria de la publicacion</h3>
                            <table>
                                <tr>
                                    <td><input type="checkbox" name="baile" id="baile" value="baile" />&nbsp;<label for="baile"><i class="fas fa-shoe-prints"></i>&nbsp; Baile</label> &nbsp;</td>
                                    <td><input type="checkbox" name="dibujo" id="dibujo" value="dibujo" />&nbsp;<label for="dibujo"><i class="fas fa-pencil-alt"></i>&nbsp;Dibujo</label> &nbsp;</td>
                                    <td><input type="checkbox" name="Film" id="Film" value="Film" />&nbsp;<label for="Film"><i class="fas fa-film"></i>&nbsp;Film</label>&nbsp;</td>
                                    <td><input type="checkbox" name="pintura" id="pintura" value="pintura" />&nbsp;<label for="pintura"><i class="fas fa-palette"></i>&nbsp;Pintura</label></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="animacion" id="animacion" value="animacion" />&nbsp;<label for="animacion"><i class="fas fa-file-video"></i>&nbsp;Animacion</label> &nbsp;</td>
                                    <td><input type="checkbox" name="fotografia" id="fotografia" value="fotografia" />&nbsp;<label for="fotografia"><i class="fas fa-camera-retro"></i>&nbsp;Fotografia</label> &nbsp;</td>
                                    <td><input type="checkbox" name="canto" id="canto" value="canto" />&nbsp;<label for="canto"><i class="fas fa-music"></i>&nbsp;Canto</label></td>
                                </tr>
                            </table>
                        </div>
                        <div id="buttons">
                            <div id="button_file">
                                <input type="file" value="File" id="file">
                                <label id="label_file" for="file"><i class="fas fa-upload"></i> &nbsp; Upload your files</label>
                            </div>
                            <div id="button_post">
                                <input type="submit" value="Publish">
                                <label id="label_post" for="submit"> Publish</label>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="post">
                    <div class="description">
                        <img src="resources/img/icons/profile1.png" alt="my_perfil"> <span>Mario Hazael</span>
                        <p id="info_post">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum, numquam deserunt reiciendis necessitatibus placeat maxime ut qui doloribus est magni dignissimos. Culpa eos fugiat perspiciatis temporibus unde aperiam debitis neque?
                        </p>
                        <p id="date">May 28th 2020 11:06</p>
                    </div>
                    <div class="file_post">
                        <img src="resources/img/Github.jpg" alt="">
                    </div>
                    <div class="comments">
                        <div class="header_comments">
                            <h3>comments
                                <a id="share" href="#"><i class="fas fa-share"></i></a>
                                <a id="like" href="#"><i class="fas fa-thumbs-up"></i></a></h3>
                        </div>
                        <textarea placeholder="Write your comments" name="comentarios" rows="1"></textarea>
                    </div>
                    <div class="subcomments">
                        <div id="perfil_subcomments"><img src="resources/img/icons/profile1.png" alt="my_perfil"></div>
                        <div id="subcomment">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur veritatis harum eaque mollitia perferendis blanditiis atque temporibus maxime cumque! Dicta ullam reprehenderit dolor quis nobis at labore dolores delectus error!
                            </p>
                            <a id="share" href="#"><i class="fas fa-share"></i></a>
                            <a id="comments" href="#"><i class="fas fa-comments"></i></a>
                            <a id="like" href="#"><i class="fas fa-thumbs-up"></i></a>
                        </div>
                    </div>
                </div>
        <?php
               require_once '../logica/root.php';
            $categoria = "";
            $query = "SELECT * FROM categorias WHERE categoria = 'fotografia'";
            $result = mysqli_query($conn, $query);
            
            while($users = mysqli_fetch_array($result)){
                $id_post = $users['id_post'];
            
                $query = "SELECT * FROM post WHERE id = '$id_post'";
                $result = mysqli_query($conn, $query);
            
                while($users1 = mysqli_fetch_array($result)){
                    $ruta_img = $users1['file'];
                    echo "
                        <div class='post'>
                            <div class='description'>
                                <img src='../resources/img/icons/profile1.png' alt='my_perfil'> <span>".$users1['username']."</span>
                                <p id='info_post'>".$users1['description']."</p>
                                <p id='date'>Categoria: Animacion</p>
                            </div>
                            <div class='file_post'>
                                <img src='/Universidad/Equipo5_PI/servidor/imagenes/$ruta_img' alt='Hola'/>
                            </div>
                            <div class='comments'>
                                <div class='header_comments'>
                                    <h3>comments
                                    <a id='share' href='#'><i class='fas fa-share'></i></a>
                                    <a id='like' href='#'><i class='fas fa-thumbs-up'></i></a></h3>
                                </div>
                                <textarea placeholder='Write your comments' name='comentarios' rows='1'></textarea>
                            </div>
                            <div class='subcomments'>
                                <div id='perfil_subcomments'><img src='../resources/img/icons/profile1.png' alt='my_perfil'></div>
                                <div id='subcomment'>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                        Tenetur veritatis harum eaque mollitia perferendis blanditiis 
                                        atque temporibus maxime cumque! Dicta ullam reprehenderit dolor 
                                        quis nobis at labore dolores delectus error!</p>
                                    <a id='share' href='#'><i class='fas fa-share'></i></a>
                                    <a id='comments' href='#'><i class='fas fa-comments'></i></a>
                                    <a id='like' href='#'><i class='fas fa-thumbs-up'></i></a>
                                </div>
                            </div>
                        </div>";
                }
            }
        ?>
            </div>
</body>

</html>