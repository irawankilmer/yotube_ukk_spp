<?php 
/**
 * 
 */
class User extends BaseModel
{
	public $table_name	= 'users';
	public $table_id	= 'id_users';

	public function upload($namaFile)
	{
		$this->mysqli->query("UPDATE users SET gambar = '$namaFile' WHERE id_users = ".$_SESSION['id_users']);

		return $this->mysqli->affected_rows;
	}

	public function gantiPassword($password)
	{
		$this->mysqli->query("UPDATE users SET password = '$password' WHERE id_users = ".$_SESSION['id_users']);

		return $this->mysqli->affected_rows;
	}
}