<?php
class Galeria extends Model {
	public function apagarFoto(int $id):bool {
		$sql = "SELECT url_img FROM galeria WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() == 1) {
			$row = $sql->fetch();

			unlink('upload/'.$row['url_img']);

			$sql = "DELETE FROM galeria WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}
}

