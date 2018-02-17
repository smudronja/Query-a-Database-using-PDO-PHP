<?php 

class User extends Dbh {

	public function getAllUsers() {

		$stmt = $this->connect()->query("SELECT * FROM korisnici");
		while ($row = $stmt->fetch()) {
			echo $row['korisnickoime'];
		}

	}

	public function getUsersWithCountCheck() {
		$id = 1;
		$korisnickoime = "admin";

		$stmt = $this->connect()->prepare("SELECT * FROM korisnici WHERE id=? AND korisnickoime=?");
		$stmt->execute([$id, $korisnickoime]);

		if ($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
				return $row['korisnickoime'];
			}
		}
	}

}