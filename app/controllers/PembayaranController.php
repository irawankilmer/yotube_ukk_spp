<?php 
/**
 * 
 */
class PembayaranController extends Controller
{
	public function __construct()
	{
		checkIsNotLogin();

		if ($_SESSION['level'] !== 'Admin' || $_SESSION['level'] !== 'Petugas') {
			header("Location:http://localhost/ukk_spp/");
		}
	}
	
	public function index()
	{
		$this->view('pembayaran/home');
	}
}