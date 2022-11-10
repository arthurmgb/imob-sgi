<?php

class Fiadores extends Model{


	public function getList($offset, $limit, $filtros=array()){
		$array = array();

		$where = $this->buildWhere($filtros);
		$sql = "SELECT *,
		(SELECT i.nome FROM inquilinos i WHERE fiadores.cod_inquilino = i.referencia) AS n_inquilino
		FROM fiadores WHERE '1'='1'".implode(' OR ', $where)." ORDER BY nome ASC  LIMIT $offset, $limit";
		
		$sql = $this->db->prepare($sql);
		$this->bindWhere($sql, $filtros);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function fiador($id){
		$array = array();
		$sql = "SELECT * FROM fiadores WHERE id = '$id'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}

	public function getTotalFiadores() {
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM fiadores";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	/*
	 * @param $codigo int
	 * @return just the names of fiadores
	*/
	public function getFiadoresByCodInquilino($codigo) {
		$array = array();

		$sql = "SELECT id,nome FROM fiadores WHERE cod_inquilino = :codigo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':codigo', $codigo);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	/*public function getNomeFiadoresById($ids_fiadores) {
		$sql = "SELECT nome FROM fiadores WHERE id IN ('".implode("', '", $ids_fiadores)."')";
		$sql = $this->db->query($sql);

		$array = array();
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}*/
	
	public function getInfoFromFiadores($ids_fiadores) {
		$sql = "SELECT * FROM fiadores WHERE id IN ('".implode("', '", $ids_fiadores)."') LIMIT 2";
		$sql = $this->db->query($sql);

		$array = array();
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function CadFiadores(
		$codigo_inquilino,
		$nome, $cpf, $rg,
		$nacionalidade,
		$estado_civil, 
		$profissao,
		$endereco,
		$bairro, $cidade,
		$uf, $cep, $telefone ) { 

		$id_user = $_SESSION['user']['id'];	
		$sql = "INSERT INTO fiadores SET
		cod_inquilino =  '$codigo_inquilino',
		nome 			 =	'$nome', 
		cpf 			 =	'$cpf', 
		rg 				 = 	'$rg', 
		nacionalidade 	 =  '$nacionalidade',
		estado_civil     =  '$estado_civil', 
		profissao 	 	 = 	'$profissao',
		endereco		 = 	'$endereco',
		bairro		     =	'$bairro',
		cidade			 =	'$cidade',
		uf			   	 =	'$uf',
		cep				 =	'$cep', 
		telefone		 =	'$telefone', 
		data_cad		 =    NOW(),
		id_user          = '$id_user'";
		
		$this->db->query($sql);

		return $this->db->lastInsertId();
	}


	public function updateFiadores(
		$id,
		$nome, 
		$cpf, 
		$rg,
		$nacionalidade,
		$estado_civil, 
		$profissao,
		$endereco,
		$bairro,
		$cidade,
		$uf,
		$cep, 
		$telefone
		){

		$sql = "UPDATE fiadores SET 
		nome 	  		= '$nome', 
		cpf		  		= '$cpf', 
		rg		  		= '$rg',
		nacionalidade 	= '$nacionalidade',
		estado_civil  	= '$estado_civil', 
		profissao		= '$profissao',
		endereco		= '$endereco',
		bairro			= '$bairro',
		cidade			= '$cidade',
		uf				= '$uf',
		cep				= '$cep',  
		telefone 		= '$telefone'
		WHERE id  = '$id'";
		$this->db->query($sql);
	}

	public function removerFiadores($id) {

		$sql = "DELETE FROM fiadores WHERE id = '$id'";
		$sql = $this->db->query($sql);
	}

	private function buildwhere($filtros) {
		$where = array();

		if(!empty($filtros['search'])) {
			$where[] = 'AND cod_inquilino LIKE :cod_inquilino';
		}

		return $where;
	}

	private function bindwhere(&$sql, $filtros) {
		if(!empty($filtros['search'])) {
			$sql->bindvalue(':cod_inquilino', $filtros['search'].'%');
		}
	}
}

?>