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
		$data = $this->model('Kelas')->getAll();
		$this->view('kelas/home', $data);
	}

	public function create()
	{
		$this->view('kelas/create');
	}

	public function store()
	{
		if ($this->model('Kelas')->create($_POST) > 0) {
			redirectTo('success', 'Selamat, Data Kelas berhasil di tambahkan!', '/kelas');
		}
	}

	public function edit($id)
	{
		$data = $this->model('Kelas')->getById($id);
		$this->view('kelas/edit', $data);
	}

	public function update($id)
	{
		if ($this->model('Kelas')->update($id) > 0) {
			redirectTo('success', 'Selamat, Data Kelas berhasil di edit!', '/kelas');
		} else {
			redirectTo('info', 'Tidak ada perubahan data!', '/kelas');
		}
	}

	public function delete($id)
	{
		if ($this->model('Kelas')->delete($id) > 0) {
			redirectTo('success', 'Selamat, Data Kelas berhasil di hapus!', '/kelas');
		}
	}
}