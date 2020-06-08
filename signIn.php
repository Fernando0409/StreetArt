<!--?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

// SE CONECTA A LA base de datos local
$db = mysqli_connect('localhost', 'root', '', 'registration');//PRUEBAS LOCALES


// REGISTRAR USUARIO
if (isset($_POST['reg_user'])) {
  // RECIBE TODOS LOS VALORES INSERTADOS 
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  //$code = mysqli_real_escape_string($db_code, $_POST['code_id']);

  // VALIDAR SI EL FORMULARIO ESTÁ RELLENADO CORRECTAMENTE
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  //if (empty($code)) { array_push($errors, "Code is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");}

  // CHECAR SI NO EXISTE UN USARIO CON EL MISMO USUARIO O CORREO ELECTRÓNICO
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
 // $code_check_query = "SELECT * FROM code WHERE code='$code' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
 // $result_code = mysqli_query($db_code, $code_check_query);
  $user = mysqli_fetch_assoc($result);
  //$code_ = mysqli_fetch_assoc($result_code);
  
  if ($user) { // SI EL USUARIO EXISTE
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }
    //if($code_['code'] !== $code) {
     
    //}

  // REGISTRAR SI NO HAY ERRORES
  if (count($errors) == 0 ) {
    $password = $password_1; //NO SE ENCRIPTA LA CONTRASEÑA DEBIDO A ERRORES DESCONOCIDOS MIENTRAS ESTÁ EN EL SERVIDOR *************
    //if($code_['code'] === $code) {
    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    //}
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: perfil.php');
  }
}
? -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Street Art</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    	
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="resources/css/styles.css">
	
</head>
<body>
<div id="id011" class="modal1">
<span onclick="document.getElementById('id011').style.display='none'" class="close1" title="Close Modal">&times;</span>

<div class="container1">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Street Art</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>

			<div class="card-body">
				<form action="logica/funcionalidades/register.php" method="POST">

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Nombre de usuario" name="name" autocomplete="off" required>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Nickname" name="username" autocomplete="off" required>
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="Correo Electronico" name="email" autocomplete="off" required>	
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Contraseña" name="password_1" autocomplete="off" required>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Repita la contraseña" name="password_2" autocomplete="off" required>
					</div>

					<div class="mt-4">
						<!--div class="d-flex justify-content-center links">
							I already have an account <a href="singin.php" class="ml-2">login</a>
						</div-->
					</div>
	
					<div class="clearfix1">
						<input type="submit" value="Sing In" class="btn float-right login_btn" name="reg_user" >
					</div>

				   </form>
			   </div>
		    </div>
	      </div>
	    </div>

</div>
</body>
</html>