<?php 
  require_once 'init.php';
  if(!$currentUser)
  {
	  header('Location: index.php');
	  exit();
  }
?>
<?php include 'header.php'; ?>

<HEAD> Doi Mat Khau </HEAD>
<?php if(isset($_POST['currentPassword']) && isset($_POST['password'])): ?>
<?php
$password = $_POST['password'];
$currentPassword = $_POST['currentPassword'];
// $hashPassword = password_hash($password,PASSWORD_DEFAULT);

$success = false;


if(password_verify($currentPassword,$currentUser['password'])){
	// $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
	// $stmt->execute(array($hashPassword, $currentUser['id']));
	updateUserPassword($currentUser['id'],$password);
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
	Đăng mat khau thất bại
	</div>
<?php endif; ?>
<?php else: ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<BODY>
	<div class="container"> 
	<h1>Đăng nhập Web</h1>
		<form action="change-password.php" method="POST">
        <div class ="form-group">
				<label for="currentPassword" > Mật khẩu hien tai </label>
				 <input type="password" class="form-control" id ="currentPassword" name="currentPassword" placeholder = "Mật khẩu hien tai">
			</div>
			<div class ="form-group">
				<label for="password" > Mật khẩu moi </label>
				 <input type="password" class="form-control" id ="password" name="password" placeholder = "Mật khẩu moi">
			</div>
			<button type="submit" class="btn btn-primary">
			Doi mat khau</button>
		</form>
<?php endif; ?>
<?php include 'footer.php'; ?>