<?php
class Pagamentos extends Model {
	public function hoje() {
		$sql = "SELECT SUM(valor) AS total FROM pagamentos WHERE data >= :data_min AND data <= :data_max";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':data_min', date('Y-m-d 00:00:00'));
		$sql->bindValue(':data_max', date('Y-m-d 23:59:59'));
		$sql->execute();
		$sql = $sql->fetch(PDO::FETCH_ASSOC);
		return $sql['total'];
	}
}