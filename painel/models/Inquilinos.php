<?php

class Inquilinos extends Model {

	public function getList($offset, $limit, $filtros=array()){
		$array = array();

		$where = $this->buildwhere($filtros);

		$sql = "SELECT inq.*, imo.endereco, imo.bairro
		FROM inquilinos inq LEFT JOIN imoveis imo ON inq.cod_imovel = imo.referencia WHERE '1'='1' ".implode(' OR ', $where)." ORDER BY nome ASC  LIMIT $offset, $limit";
		$sql = $this->db->prepare($sql);
		$this->bindwhere($sql, $filtros);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getIptu($limit) {
		$array = array();
		$sql = "SELECT inq.*, 
		    imo.endereco, 
		    imo.bairro, 
		    imo.iptu 
		FROM inquilinos inq 
		LEFT JOIN imoveis imo ON inq.cod_imovel = imo.referencia WHERE imo.iptu = '1' 
		LIMIT $limit";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	
	public function getIptu1($limit) {
		$array = array();
		$sql = "SELECT * FROM imoveis 
		WHERE iptu = '1' 
		LIMIT $limit";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getNome($codigo) {
		$sql = "SELECT nome FROM inquilinos WHERE referencia = '$codigo'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() == 1) {
			$data = $sql->fetch();
			$nome = $data['nome'];
			return $nome;
		}
		return '';
	}

	public function inquilino($id){
		$array = array();
		$sql = "SELECT inq.*,
		imo.endereco, imo.bairro, imo.cidade, imo.uf, imo.cep
		FROM inquilinos inq LEFT JOIN imoveis imo ON inq.cod_imovel = imo.referencia WHERE inq.id = '$id'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getInfoByCode($codigo){
		$array = array();
		$sql = "SELECT * FROM inquilinos WHERE referencia = :codigo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':codigo', $codigo);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function getTotalInquilinos() {
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM inquilinos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	public function qtdInquilinoAtivos() {
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM inquilinos WHERE status = '1'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	public function cadImovel($codImovel, $cod_inquilino) {
		$sql = "UPDATE inquilinos SET cod_imovel = :cod_imovel WHERE referencia = :referencia";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cod_imovel', $codImovel);
		$sql->bindValue(':referencia', $cod_inquilino);
		$sql->execute();
	}

	public function removerInquilinos($id) {

		$sql = "DELETE FROM inquilinos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		
	}

	public function CadInq(
		$nome, 
		$cpf, 
		$rg,
		$nacionalidade,
		$estado_civil, 
		$profissao, 
		$telefone, 
		$info
		){

		$cod_inquilino = 0;
		$sql = "SELECT COUNT(id) AS c FROM fiadores WHERE cod_inquilino = :cod_inquilino";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cod_inquilino', $cod_inquilino);
		$sql->execute();
		$sql = $sql->fetch();

		if ($sql['c'] <= 1) {

			$id_user = $_SESSION['user']['id'];
			$sql = "INSERT INTO inquilinos SET
			nome 			=	'$nome', 
			cpf 			=	'$cpf', 
			rg 				= 	'$rg', 
			nacionalidade 	= 	'$nacionalidade',
			estado_civil 	= 	'$estado_civil',
			profissao 		=  	'$profissao', 
			telefone		=	'$telefone', 
			info			=	'$info', 
			data_cad		=    NOW(),
			status			=	'1',
			id_user     	=   '$id_user'";

			$this->db->query($sql);
			$id = $this->db->lastInsertId();

			$codigo = $id.rand(1000, 9999);

			$sql = "UPDATE inquilinos SET referencia = ? WHERE id = ?";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(1, $codigo);
			$sql->bindValue(2, $id);
			$sql->execute();

			return $id;
		} else {
			return 0;
		}
	}


	public function updateInquilinos(
		$id, 
		$nome, 
		$cpf, 
		$rg, 
		$nacionalidade,
		$estado_civil,
		$profissao, 
		$telefone, 
		$info, 
		$status
		){

		$sql = "UPDATE inquilinos SET 
		nome 	  		= '$nome', 
		cpf		  		= '$cpf', 
		rg		  		= '$rg',
		nacionalidade 	= '$nacionalidade',
		estado_civil 	= '$estado_civil', 
		profissao 		= '$profissao', 
		telefone  		= '$telefone', 
		info 	  		= '$info',
		status    		=  '$status'
		WHERE id  		= '$id'";
		$this->db->query($sql);
	}

	private function buildwhere($filtros) {
		$where = array();

		if(!empty($filtros['search'])) {
			$where[] = 'AND (inq.nome LIKE :nome';
			$where[] = 'inq.referencia LIKE :referencia';
			$where[] = 'inq.rg LIKE :rg)'; 
		}

return $where;
}

private function bindwhere(&$sql, $filtros) {
	if(!empty($filtros['search'])) {
		$sql->bindvalue(':nome', $filtros['search'].'%');
		$sql->bindvalue(':referencia', '%'.$filtros['search'].'%');
		$sql->bindvalue(':rg', '%'.$filtros['search'].'%');
	}
}
}

?>