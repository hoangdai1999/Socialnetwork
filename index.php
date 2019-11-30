<?php require_once 'init.php';?>
<?php include 'header.php'; ?>
<?php include 'footer.php'; ?>   
<?php 
  require_once 'init.php';

  $posts = getNewFeeds();

?>
<?php if($currentUser): ?>
<p>Chào mừng <?php echo $currentUser['displayname']; ?> đã trở lại </p>
<?php foreach ($sposts as $post): ?>
<p> <img src = ""></p>
<p> <?php echo $post['displayname'];  ?> </p>
<p> <?php echo $post['content'];  ?> </p>
<p> <?php echo $post['CreatedAt']; ?> </p>

<div class="card">
  <img class="card-img-top" src="avatars/<?php echo $post['userId']; ?>.jpg" alt="<?php echo $post['displayname'];  ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $post['displayname'];  ?></h5>
    <p class="card-text"><?php echo $post['content'];  ?></p>
  </div>
</div>

<?php endforeach ?>
<?php else: ?>
<?php include 'header.php'; ?>
<h1>Chào mừng các bạn đến với trang đăng nhập môn Web 1</h1>
<?php endif ?>
<?php include 'footer.php'; ?>