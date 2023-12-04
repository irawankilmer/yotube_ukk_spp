<?php 
/**
 * 
 */
class BaseModel
{
	public $table_name;
	public $mysqli;

	public function __construct()
	{
		$this->mysqli = new mysqli('localhost', 'root', '', 'ukk_spp');
	}

	public function getByUsername($username)
	{
		$result = $this->mysqli->query("SELECT * FROM $this->table_name WHERE username = '$username'");

		return $result->fetch_assoc();
	}

	public function getById($id)
	{
		$result = $this->mysqli->query("SELECT * FROM $this->table_name WHERE $this->table_id = '$id'");

		return $result->fetch_assoc();
	}

	public function create($data)
	{
		$properties = '';
		foreach ($data as $properti => $value) {
			$properties .= $properti.", ";
		}
		$properties = rtrim($properties, ', ');

		$values = '';
		foreach ($data as $key => $value) {
			$values .= "'".$value."', ";
		}
		$values = rtrim($values, ', ');

		$this->mysqli->query("INSERT INTO $this->table_name($properties) VALUES($values)");

		return $this->mysqli->insert_id;
	}

	public function getAll()
	{
		$result = $this->mysqli->query("SELECT * FROM $this->table_name ORDER BY $this->table_id DESC");

		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		return $data;
	}

	public function getJoinAll($tables, $where = null)
	{
		$joins = '';
		foreach ($tables as $table) {
			$joins .= "INNER JOIN ".$table." ON ".$this->table_name.".id_".$table." = ".$table.".id_".$table." ";
		}
		
		$result = $this->mysqli->query("SELECT * FROM ".$this->table_name." ".$joins." $where ORDER BY ".$this->table_name.".".$this->table_id." DESC");

		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		return $data;
	}

	public function getJoinOne($tables, $id, $where = null)
	{
		$joins = '';
		foreach ($tables as $table) {
			$joins .= "INNER JOIN ".$table." ON ".$this->table_name.".id_".$table." = ".$table.".id_".$table." ";
		}
		$wh = $where == null ? " WHERE ".$this->table_name.".".$this->table_id." = ".$id : $where;
		
		$result = $this->mysqli->query("SELECT * FROM ".$this->table_name." ".$joins." ".$wh);

		$data = $result->fetch_assoc();
		return $data;
	}

	public function update($id)
	{
		$values = '';
		foreach ($_POST as $key => $value) {
			$values .= $key." = '".$value."', ";
		}
		$values = rtrim($values, ', ');

		$this->mysqli->query("UPDATE $this->table_name SET $values WHERE $this->table_id = '$id'");

		return $this->mysqli->affected_rows;

	}

	public function delete($id)
	{
		$this->mysqli->query("DELETE FROM $this->table_name WHERE $this->table_id = '$id'");

		return $this->mysqli->affected_rows;
	}
}