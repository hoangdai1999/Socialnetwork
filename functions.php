<?php
function sum($a,$b)
{
	$c = $a + $b;
	return $c;
}

function detectPage()
{
	$uri = $_SERVER ['REQUEST_URI'];
$parts = explode('/', $uri);
$fileName = $parts[2];
$parts = explode('.', $fileName);
$page = $parts[0];
return $page;
}

function findUserByEmail($email)
{
	global $db;
	$stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
	$stmt->execute(array($email));
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserById($id)
{
	global $db;
	$stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
	$stmt->execute(array($id));
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUserPassword($id,$password)
{
	global $db;
	$hashPassword = password_hash($password,PASSWORD_DEFAULT);
	$stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    return $stmt->execute(array($hashPassword, $id));
   
}

function createUser($displayname, $email, $password)
{
	global $db;
	$hashPassword = password_hash($password,PASSWORD_DEFAULT);
	$stmt = $db->prepare("INSERT INTO users (displayname, email, password)  VALUES (?,?,?)");
    $stmt->execute(array($displayname, $email, $hashPassword));
   return $db->lastInsertId();
}

function updateUserProfile($id, $displayname)
{
	global $db;
	$stmt = $db->prepare("UPDATE users SET displayname = ? WHERE id = ?");
    return $stmt->execute(array($displayname, $id));
}

function resizeImage($filename, $max_width, $max_height)
{
  list($orig_width, $orig_height) = getimagesize($filename);

  $width = $orig_width;
  $height = $orig_height;

  # taller
  if ($height > $max_height) {
      $width = ($max_height / $height) * $width;
      $height = $max_height;
  }

  # wider
  if ($width > $max_width) {
      $height = ($max_width / $width) * $height;
      $width = $max_width;
  }

  $image_p = imagecreatetruecolor($width, $height);

  $image = imagecreatefromjpeg($filename);

  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

  return $image_p;
}

function getNewFeeds()
{
	global $db;
	$stmt = $db->query ("SELECT p.*, u.displayName FROM posts AS p JOIN users AS u ON p.userid = u.id ORDER BY createAt DESC");
	return $stmt->fetchall(PDO::FETCH_ASSOC);
}
function createPost($userid, $content){
	global $db;
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	$stmt = $db->prepare("INSERT INTO posts ( content, userid) VALUES (?, ?)");
    $stmt->execute (array($content, $userid));
    return $db->lastInsertId();
}

