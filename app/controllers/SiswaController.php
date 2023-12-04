<?php 
/**
 * 
 */
class SiswaController extends Controller
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
		$data = $this->model('Siswa')->getJoinAll(['users', 'kelas']);
		$this->view('siswa/home', $data);
	}

	public function create()
	{
		$data = [
			'spp'	=> $this->model('Spp')->getAll(),
			'kelas'	=> $this->model('Kelas')->getAll()
		];

		$this->view('siswa/create', $data);
	}

	public function store()
	{
	    // cek nisn
	    if (empty(cekNisn('nisn', $_POST['nisn']))) {
	    	// cek nis
	    	if (empty(cekNisn('nis', $_POST['nis']))) {
	    		$users = [
			    	'username'	=> $_POST['nisn'],
			    	'password'	=> password_hash($_POST['nisn'], PASSWORD_DEFAULT),
			    	'level'		=> 3,
			    	'gambar'	=> 'avatar4.png'
			    ];

			    $id_users = $this->model('User')->create($users);

			    $siswa = [
			    	'id_users'				=> $id_users,
			    	'id_spp'				=> $_POST['id_spp'],
			    	'id_kelas'				=> $_POST['id_kelas'],
			    	'nisn'					=> $_POST['nisn'],
			    	'nis'					=> $_POST['nis'],
			    	'nama_siswa'			=> $_POST['nama_siswa'],
			    	'alamat_siswa'			=> $_POST['alamat_siswa'],
			    	'no_telepon_siswa'		=> $_POST['no_telepon_siswa']
			    ];

			    $id_siswa = $this->model('Siswa')->create($siswa);

			    $data = $this->model('Petugas')->getJoinOne(['users'], $_SESSION['id_users'], " WHERE petugas.id_users = ".$_SESSION['id_users']);

			    // insert data ke table pembayaran
			    if ($this->model('Pembayaran')->createPembayaran($data['id_petugas'], $id_siswa, $_POST['id_spp']) > 0) {
			    	redirectTo('success', 'Selamat, Data Siswa berhasil di tambahkan!', '/siswa');
			    }
	    	} else {
		    	redirectTo('warning', 'Maaf, NIS sudah terdaftar!', '/siswa/create');
		    }
	    } else {
	    	redirectTo('warning', 'Maaf, NISN sudah terdaftar!', '/siswa/create');
	    }
	}

	public function detail($id)
	{
		$data = [
			'profil'	=> $this->model('Siswa')->getJoinOne(['users', 'spp', 'kelas'], $id),
			'pembayaran'	=> $this->model('Pembayaran')->getJoinAll(['spp', 'petugas'], " WHERE pembayaran.id_siswa = ".$id)
		];

		$this->view('siswa/detail', $data);
	}

	public function reset($id)
	{
		if ($this->model('User')->update($id) > 0) {
			redirectTo('success', 'Selamat, Password berhasil di reset!', '/siswa');
		} else {
			redirectTo('info', 'Tidak ada perubahan password!', '/siswa');
		}
	}

	public function addspp()
	{
		$data = $this->model('Petugas')->getJoinOne(['users'], $_SESSION['id_users'], " WHERE petugas.id_users = ".$_SESSION['id_users']);
		$id_siswa  = $_POST['id_siswa'];
		$id_spp    = $_POST['id_spp'] + 1;

		// cek id_spp 
		if (!empty($this->model('Spp')->getById($id_spp))) {
			// cek Id_spp(siswa) yang ada di table pembayaran
			if(empty(cekPembayaran($id_siswa, $id_spp)))  {
				// insert data ke table pembayaran
				if ($this->model('Pembayaran')->createPembayaran($data['id_petugas'], $id_siswa, $id_spp) > 0) {
			    	redirectTo('success', 'Selamat, Data SPP baru berhasil di tambahkan!', '/siswa/'.$id_siswa.'/detail');
			    }
			} else {
				redirectTo('warning', 'Maaf, Siswa tersebut sudah terhubung dengan SPP Terbaru!', '/siswa/'.$id_siswa.'/detail');
			}
		} else {
			redirectTo('warning', 'Maaf, Tidak ada SPP terbaru!', '/siswa/'.$id_siswa.'/detail');
		}
	}

	public function edit($id)
	{
		$data = [
			'spp'	=> $this->model('Spp')->getAll(),
			'kelas'	=> $this->model('Kelas')->getAll(),
			'profil'=> $this->model('Siswa')->getById($id)
		];

		$this->view('siswa/edit', $data);
	}

	public function update($id)
	{
		// cek nisn
		if (empty(cekNisn('nisn', $_POST['nisn'], "NOT"))) {
			// cek nis
			if (empty(cekNisn('nis', $_POST['nis'], "NOT"))) {
				// update data
				if ($this->model('Siswa')->update($id) > 0) {
					redirectTo('success', 'Selamat, Data siswa berhasil di update!', '/siswa');
				}
			} else {
				redirectTo('warning', 'Maaf, NIS Sudah terdaftar!', '/siswa/'.$id.'/edit');
			}
		} else {
			redirectTo('warning', 'Maaf, NISN Sudah terdaftar!', '/siswa/'.$id.'/edit');
		}
	}

	public function delete($id)
	{
		if ($this->model('User')->delete($id) > 0) {
			redirectTo('success', 'Selamat, Data siswa berhasil di hapus!', '/siswa');
		}
	}
}