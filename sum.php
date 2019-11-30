<?php 
  require_once 'init.php';
  if(!$currentUser)
  {
	  header('Location: index.php');
	  exit();
  }
?>
<?php include 'header.php'; ?>
<HEAD> 1760025 - Tính Tổng Hai Số </HEAD>
<?php if(isset($_POST['number1']) && isset($_POST['number2'])): ?>
<?php
$number1 = $_POST['number1'];
$number2 = $_POST['number2'];
$sum = sum($number1,$number2);
?>
<div class ="alert alert-primary" role="alert">Kết quả tổng hai số là <?php echo $number1; ?> và <?php echo $number2; ?> là <?php echo $sum; ?>
	</div>
<?php else: ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<BODY>
	<div class="container"> 
	<h1>Tính tổng hai số</h1>
		<form action="sum.php" method="POST">
			<div class ="form-group">
				<label for="number1" > Số thứ nhất </label>
				 <input type="text" class="form-control" id ="number1" name="number1" placeholder = "number1" value=""/>
			</div>
			<div class ="form-group">
				<label for="number2" > Số thứ hai </label>
				 <input type="text" class="form-control" id ="number2" name="number2" placeholder = "number2" value=""/>
			</div>
			<button type="submit" class="btn btn-primary">
			Tính tổng</button>
		</form>
<?php endif; ?>
<?php include 'footer.php'; ?>