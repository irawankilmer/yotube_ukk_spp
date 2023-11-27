<?php 
/**
 * 
 */
class PetugasController extends Controller
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
		$data = $this->model('User')->getJoinAll(['petugas']);
		$this->view('petugas/home', $data);
	}

	public function create()
	{
		$this->view('petugas/create');
	}

	public function store()
	{
		// Periksa username 
		if (usernameCheck($_POST['username']) === 0) {
			$users = [
				'username'		=> $_POST['username'],
				'password'		=> password_hash($_POST['username'], PASSWORD_DEFAULT),
				'level'			=> $_POST['level'],
				'gambar'		=> 'avatar4.png'
			];

			$user_id = $this->model('User')->create($users);

			$petugas = [
				'id_user'			=> $user_id,
				'nama_petugas'		=> $_POST['nama_petugas'],
				'no_hp_petugas'		=> $_POST['no_hp_petugas'],
				'alamat_petugas'	=> $_POST['alamat_petugas']
			];

			if ($this->model('Petugas')->create($petugas) > 0) {
				redirectTo('success', 'Selamat, Data Petugas berhasil di tambahkan!', '/petugas');
			}
		} else {
			redirectTo('error', 'Maaaf, Username tersebut sudah terdaftar!', '/petugas/create');
		}
	}

	public function detail($id)
	{
		$data = $this->model('User')->getJoinOne(['petugas'], $id);
		$this->view('petugas/detail', $data);
	}

	public function reset($id)
	{
		if ($this->model('User')->update($id) > 0) {
			redirectTo('success', 'Selamat, Password berhasil di reset!', '/petugas');
		}
	}

	public function edit($id)
	{
		$data = $this->model('User')->getById($id);
		$this->view('petugas/edit', $data);
	}

	public function update($id)
	{
		if ($this->model('User')->update($id) > 0) {
			redirectTo('success', 'Selamat, Level Petugas berhasil di Update!', '/petugas');
		} else {
			redirectTo('info', 'Selamat, Level Petugas Tidak Ada Perubahan Data!', '/petugas');
		}
	}

	public function delete($id)
	{
		if ($this->model('User')->delete($id) > 0) {
			redirectTo('success', 'Selamat, Data Petugas berhasil di hapus!', '/petugas');
		}
	}
}