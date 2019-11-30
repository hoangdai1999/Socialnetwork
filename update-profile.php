<?php 
  require_once 'init.php';
  if(!$currentUser)
  {
	  header('Location: index.php');
	  exit();
  }
?>
<?php include 'header.php'; ?>

<HEAD> Cập Nhật Thông Tin </HEAD>
<?php if(isset($_POST['displayname'])): ?>
<?php
$displayname = $_POST['displayname'];

$success = false;


if( $displayname != '')
{
	updateUserProfile($currentUser['id'], $displayname);
    $success = true;
}

if (isset($_FILES['avatar'])){
	$success =false;
	$file = $_FILES['avatar'];
	$fileName = $file['name'];
	$fileSize = $file['size'];
	$fileTemp = $file['tmp_name'];

	$filePath = './avatars/' . $currentUser['id'] . '.jpg';
	$success = move_uploaded_file($fileTemp, $filePath);
	$newImage = resizeImage($filePath, 400, 400);
	imagejpeg($newImage, $filePath);
  }
?>
<?php if (!$success): ?>


<div class ="alert alert-danger" role="alert">
	Cập nhật thông tin thất bại
</div>
<?php endif; ?>
<?php else: ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<BODY>
	<div class="container"> 
	<h1>Đăng nhập</h1>
		<form method="POST">
        <div class ="form-group">
				<label for="displayname" > Họ Tên </label>
				 <input type="text" class="form-control" id ="displayname" name="displayname" placeholder = "Họ Tên" value = "<?php echo $currentUser['displayname']; ?>"> 
		</div>
		<div class="form-group">
    <label for="avatar">Ảnh Đại Diện</label>
    <input type="file" class="form-control-file" id="avatar" name = "avatar">
  </div>
			<button type="submit" class="btn btn-primary">
			Cập Nhật Thông Tin Cá Nhân</button>
	<div>

		</form>
<?php endif; ?>
<?php include 'footer.php'; ?>