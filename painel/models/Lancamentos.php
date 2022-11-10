<?php
class Lancamentos extends Model {

	private $table = 'lancamentos';

	public function getLista($offset=0, $limit=12) {
		$array = array();
		$sql = "SELECT * FROM ".$this->table." ORDER BY id DESC LIMIT $offset,$limit";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getTotal() {
		$sql = "SELECT COUNT(id) AS total FROM ".$this->table;
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();
		return $sql['total'];
	}

	public function add($dados) {
        /*
            echo "<pre>";    
		    print_r($dados); exit;
		*/
		$info = array();
		foreach ($dados as $campo => $valor) {
			$info[] = $campo.' = :'.$campo;
		}
		$sql = "INSERT INTO ".$this->table." SET ".implode(', ', $info);
		$sql = $this->db->prepare($sql);
		foreach ($dados as $campo => $valor) {
			$sql->bindValue(':'.$campo, $valor);
		}
		$sql->execute();
	}

	public function del($id) {
		$sql = "DELETE FROM ".$this->table." WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	/*
	* @method hoje
	* @return FLOAT
	*
	* @param $tipo
	* 1 - Entrada
	* 2 - Saida
	*/
	public function hoje($tipo) {
		$sql = "SELECT SUM(valor) AS total FROM ".$this->table." WHERE tipo = '$tipo' AND data >= :data_min AND data <= :data_max";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':data_min', date('Y-m-d 00:00:00'));
		$sql->bindValue(':data_max', date('Y-m-d 23:59:59'));
		$sql->execute();
		$sql = $sql->fetch(PDO::FETCH_ASSOC);
		return $sql['total'];
	}
}
