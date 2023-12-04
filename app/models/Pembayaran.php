<?php 
/**
 * 
 */
class Pembayaran extends BaseModel
{
	public $table_name	= 'pembayaran';
	public $table_id	= 'id_pembayaran';

	public function createPembayaran($id_petugas, $id_siswa, $id_spp)
	{
		$bulan  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

		foreach ($bulan as $b) {
			$this->mysqli->query("INSERT INTO pembayaran(id_petugas, id_siswa, id_spp, bulan_dibayar) VALUES($id_petugas, $id_siswa, $id_spp, '$b')");
		}

		return $this->mysqli->affected_rows;
	}
}