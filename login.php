<?php 
  require_once 'init.php';

?>
<?php include 'header.php'; ?>
<?php if(isset($_POST['email']) && isset($_POST['password'])): ?>
<?php
$email = $_POST['email'];
$password = $_POST['password'];
$success = false;

$user = findUserByEmail($email);
if($user && password_verify($password, $user['password'])){
	$success = true;
	$_SESSION['userId'] = $user['id'];
}
?>

<?php if($success):?>
<div class ="alert alert-primary" role="alert">
	Đăng nhập thành công
	</div>
<?php else: ?>
<div class ="alert alert-danger" role="alert">
	Đăng nhập thất bại
	</div>
<?php endif; ?>
<?php else: ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<BODY>
	<div class="container"> 
	<h1>Đăng nhập</h1>
		<form action="login.php" method="POST">
			<div class ="form-group">
				<label for="email" > Email </label>
				 <input type="email" class="form-control" id ="email" name="email" placeholder = "Tên đăng nhập ">
			</div>
			<div class ="form-group">
				<label for="password" > Mật khẩu </label>
				 Password: <input type="password" class="form-control" id ="password" name="password" placeholder = "Mật khẩu"><br><br>
				 <input type="checkbox" onclick="myFunction()">Show Password
				 <script>
                    function myFunction() {
                      var x = document.getElementById("password");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }
                    </script>
				 
			</div>
			<button type="submit" class="btn btn-primary">
			Đăng nhập</button>
		</form>
<?php endif; ?>
<?php include 'footer.php'; ?>