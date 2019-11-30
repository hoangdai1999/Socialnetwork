<?php 
  require_once 'init.php';

?>
<?php include 'header.php'; ?>

<?php if(isset($_POST['email']) && isset($_POST['password'])): ?>
<?php
$displayname = $_POST['displayname'];
$email = $_POST['email'];
$password = $_POST['password'];

$success = false;
$user = findUserByEmail($email);

if(!$user){
    $newUserId = createUser($displayname,$email, $password);
    $_SESSION['userID'] = $newUserId;
    $success = true;
}
?>

<?php if($success):?>
<?php header('Location: index.php'); ?>
<!-- <div class ="alert alert-primary" role="alert">
	Đăng ki thành công
	</div> -->
<?php else: ?>
<div class ="alert alert-danger" role="alert">
	Đăng ki thất bại
	</div>
<?php endif; ?>
<?php else: ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<BODY>
	<div class="container"> 
	<h1>Đăng Kí</h1>
		<form action="register.php" method="POST">
        <div class ="form-group">
				<label for="displayname" > Ho Ten </label>
				 <input type="text" class="form-control" id ="displayname" name="displayname" placeholder = "Ho Ten ">
			</div>
			<div class ="form-group">
				<label for="email" > Email </label>
				 <input type="email" class="form-control" id ="email" name="email" placeholder = "Email ">
			</div>
			<div class ="form-group">
				<label for="password" > Password </label>
				 <input type="password" class="form-control" id ="password" name="password" placeholder = "Mật khẩu"><br><br>
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
			Đăng Kí</button>
		</form>
<?php endif; ?>
<?php include 'footer.php'; ?>