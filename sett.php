<?php
    session_start();
    require_once 'logica/root.php';

    $username = $_SESSION['usernameLogin'];

    if(!isset($username))
        header("Location: signUp.php");
    
 ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  
        <div class="row">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu"  >
                    <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i> datos generales</a></li>
                    <li><a href="" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Cambiar contraseña</a></li>
                    <li><a href="" data-target-id="logout"><i class="glyphicon glyphicon-share-alt"></i> Regresar</a></li>
                    <li><a href="" data-target-id="exit"><i class="glyphicon glyphicon-log-out"></i>Cerrar sesion</a></li>
                </ul>
            </div>

            <div class="col-md-9  admin-content" id="profile">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading" >
                        <h3 class="panel-title">username</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $username; ?>    
<button onclick="document.getElementById('id011').style.display='block'" type="submit" style="width:auto;">editar</button>
  <div id="id011" class="modal1">
     <div class="clearfix1">
            <div class="panel panel-info" style="margin: 1em;">
                         <div class="panel-heading">
                              <h3 class="panel-title"><label for="new_username" class="control-label panel-title">nuevo nombre de usuario</label></h3>
                         </div>
                            <div class="panel-body">
                               <div class="form-group">
                                  <div class="col-sm-10">
                                     <input class="form-control" name="username" id="new_username" >
                                </div>
                            </div>

                        </div>
                    </div>

             
            <div class="panel panel-info" style="margin: 1em;">
                <div class="panel-heading">
                     <h3 class="panel-title"><label for="confirm_username" class="control-label panel-title">confirmar nuevo nombre</label></h3>
                        </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <div class="col-sm-10">
                                    <input class="form-control" name="username_confirmation" id="confirm_username" >
                                </div>
                            </div>
                        </div>
                    </div>
                            <button type="button" onclick="document.getElementById('id011').style.display='none'" class="cancelbtn1">Cancel</button>
        <button type="submit" class="signupbtn1" name="reg_username">Guardar</button>
               </div>
         </div>
     </div>
</div>
<script>
var modal1 = document.getElementById('id011');

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
</script>
                <div class="panel panel-info" style="margin: 1em; " >
                    <div class="panel-heading">
                        <h3 class="panel-title">Email</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $_SESSION['email']; ?>
 <button onclick="document.getElementById('id012').style.display='block'" type="submit" style="width:auto;">editar</button>

<div id="id012" class="modal1">
    <div class="clearfix1">
           <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="new_email" class="control-label panel-title">nuevo correo</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input class="form-control" name="Email" id="new_email" >
                                </div>
                            </div>

                        </div>
                    </div>

             
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
            <h3 class="panel-title"><label for="confirm_email" class="control-label panel-title">confirmar correo</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input class="form-control" name="email_confirmation" id="confirm_email" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="document.getElementById('id012').style.display='none'" class="cancelbtn1">Cancel</button>
        <button type="submit" class="signupbtn1" name="reg_email">Guardar</button>
      </div>
</div>
                    </div>
                </div>
                <script>
var modal1 = document.getElementById('id012');

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
</script>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Talentos</h3>

                    </div>
                    <div class="panel-body">
                        Todos soy la mera vrg
                    </div>
                </div>

            </div>


            <div class="col-md-9  admin-content" id="change-password">
                <form action="/password" method="post">

           
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="new_password" class="control-label panel-title">New Password</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="new_password" >
                                </div>
                            </div>

                        </div>
                    </div>

             
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="confirm_password" class="control-label panel-title">Confirm password</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm_password" >
                                </div>
                            </div>
                        </div>
                    </div>

           
                    <div class="panel panel-info border" style="margin: 1em;">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="pull-left">
                                    <input type="submit" class="form-control btn btn-primary" name="submit" id="submit">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


            <div class="col-md-9  admin-content" id="logout">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Regresar </h3>
                    </div>
                    <div class="panel-body">
                       ¿quiere regresar al perfil?
                        <a  href="#" class="label label-danger"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span >   No  </span>
                        </a>    
                        <a href="perfil.php" class="label label-success"> <span >  Yes   </span></a>
                    </div>
                    <form id="logout-form" action="#" method="POST" style="display: none;">
                    </form>

                </div>
            </div>
            <div class="col-md-9  admin-content" id="exit">
                
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cerrar sesion</h3>
                    </div>
                    <div class="panel-body">
                       ¿quiere salir de streetart?
                        <a  href="#" class="label label-danger"
                            onclick="event.preventDefault();
                                                     document.getElementById('exit-form').submit();">
                            <span >   No  </span>
                        </a>    
                        <a href="logout.php" class="label label-success"> <span >  Yes   </span></a>
                    </div>
                    <form id="logout-form" action="#" method="POST" style="display: none;">
                    </form>

                </div>
            </div>



            </div>
            <!-- esto va en un archivo js si lo quiere uno mas ordenado y me dio hueva hacer el js para ahorrarme un paso :v  -->
<script>
         $(document).ready(function()
      {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');
        allWellsExceptFirst.hide();
        navItems.click(function(e)
        {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');
            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
        });

        

</script>
<!-- hasta aqui -->
        </div>
