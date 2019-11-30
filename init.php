<?php
//Load core functions
require_once ('functions.php');
//Always display error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Start session
session_start();

//Detect page
$page = detectPage();

//Connect databse
//$db = new PDO('mysql:host=localhost;dbname=id11040368_socialnetwork;charset=utf8;password=123456789;dbuser=id11040368_socialnetwork');

error_reporting(0);

$CONF = $TMPL = array();

// The MySQL credentials
$CONF['host'] = 'localhost';
$CONF['user'] = 'id11040368_socialnetwork';
$CONF['pass'] = '123456789';
$CONF['name'] = 'id11040368_socialnetwork';

// The Installation URL
$CONF['url'] = 'http://socialnetwork.com';

// The Notifications e-mail
$CONF['email'] = 'hoangdai199900@gmail.com';

// The themes directory
$CONF['theme_path'] = 'themes';

// The plugins directory
$CONF['plugin_path'] = 'plugins';

$action = array('admin'			=> 'admin',
				'feed'			=> 'feed',
				'settings'		=> 'settings',
				'messages'		=> 'messages',
				'post'			=> 'post',
				'recover'		=> 'recover',
				'profile'		=> 'profile',
				'notifications'	=> 'notifications',
				'search'		=> 'search',
				'group'			=> 'group',
				'page'			=> 'page',
				'info'			=> 'info'
				);

define('COOKIE_PATH', preg_replace('|https?://[^/]+|i', '', $CONF['url']).'/');


//Detect login
$currentUser = null;

if(isset($_SESSION['userId']))
{
	$currentUser = findUserById($_SESSION['userId']);
}