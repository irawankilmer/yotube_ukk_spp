<?php 
/**
 * 
 */
class SppController extends Controller
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
		$data = $this->model('Spp')->getAll();
		$this->view('spp/home', $data);
	}

	public function create()
	{
		$this->view('spp/create');
	}

	public function store()
	{
		if ($this->model('Spp')->create($_POST) > 0) {
			redirectTo('success', 'Selamat, Data SPP berhasil di tambahkan!', '/spp');
		}
	}

	public function edit($id)
	{
		$data = $this->model('Spp')->getById($id);
		$this->view('spp/edit', $data);
	}

	public function update($id)
	{
		if ($this->model('Spp')->update($id) > 0) {
			redirectTo('success', 'Selamat, Data SPP berhasil di edit!', '/spp');
		} else {
			redirectTo('info', 'Tidak ada perubahan data SPP!', '/spp');
		}
	}

	public function delete($id)
	{
		if ($this->model('Spp')->delete($id) > 0) {
			redirectTo('success', 'Selamat, Data SPP berhasil di hapus!', '/spp');
		}
	}
}