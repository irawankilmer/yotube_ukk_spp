<?php 
/**
 * 
 */
class KelasController extends Controller
{
	public function __construct()
	{
		checkIsNotLogin();

		if ($_SESSION['level'] !== 'Admin') {
			header("Location:http://localhost/ukk_spp/");
		}
	}
	
	public function index()
	{
		$this->view('kelas/home');
	}
}