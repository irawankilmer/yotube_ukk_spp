<?php 

include '../core/Url.php';
include '../core/Controller.php';
include '../core/BaseModel.php';
$url = new Url;
$db = new BaseModel;

function getTitle()
{
	global $url;
	$title = $url->getUrl();
	if (count($title) === 3) {
		$title = $title[2].' '.$title[0];
	} elseif (count($title) === 2) {
		$title = $title[1].' '.$title[0];
	} else {
		$title = $title[0];
	}

	return ucfirst($title);
}

function urlTo($to)
{
	return 'http://localhost/ukk_spp'.$to;
}

function checkIsNotLogin()
{
	if (!isset($_SESSION['login'])) {
		header("Location:http://localhost/ukk_spp/login");
	}
}

function createCookie($username)
{
	global $db;
	$remember = hash('sha256', $username);
	$db->mysqli->query("UPDATE users SET remember_token = '$remember' WHERE username = '$username'");
	setcookie('key', $remember, time() + 3600 * 24, '/');
}

function checkIsLogin()
{
	global $db;
	if (isset($_COOKIE['key'])) {
		$remember = $_COOKIE['key'];
		$result = $db->mysqli->query("SELECT * FROM users WHERE remember_token = '$remember'");

		if (!empty($result)) {
			$_SESSION['login']		= true;
			$_SESSION['username']	= $data['username'];
			$_SESSION['level']		= $data['level'];
		}
	}
}

function deleteCookie($username)
{
	global $db;
	$remember = hash('sha256', $username);
	$db->mysqli->query("UPDATE users SET remember_token = '' WHERE username = '$username'");
	setcookie('key', '', time() - 3600 * 24, '/');
}