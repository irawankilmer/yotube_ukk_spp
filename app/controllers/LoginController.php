<?php 
/**
 * 
 */
class LoginController extends Controller
{
	public function index()
	{
		checkIsLogin();

		if (isset($_SESSION['login'])) {
			header("Location:http://localhost/ukk_spp/");
		}

		$this->view('login');
	}

	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$data 	  = $this->model('User')->getByUsername($username);
		$remember = isset($_POST['remember']) ?? true;

		// periksa ketersediaan username
		if (!empty($data)) {
			// Periksa kecocokan password
			if (password_verify($password, $data['password'])) {
				$_SESSION['login']		= true;
				$_SESSION['username']	= $data['username'];
				$_SESSION['level']		= $data['level'];
				header("Location:http://localhost/ukk_spp/");

				if ($remember) {
					createCookie($data['username']);
				}

			} else {
				echo "Password tidak cocok!";
			}
		} else {
			echo "Username tidak terdaftar!";
		}
	}

	public function logout()
	{
		session_destroy();
		session_unset();
		if (isset($_COOKIE['key'])) {
			$username = $_SESSION['username'];
			deleteCookie($username);
		}
		header("Location:http://localhost/ukk_spp/login");
	}
}