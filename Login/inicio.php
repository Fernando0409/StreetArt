<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>

<span>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></span>
<div class="d-flex justify-content-center links">
<a href="login.php" class="ml-2">logout</a>
</div>
</head>
</html>