<?php

class Proprietarios extends Model{

	public function getList($offset, $limit, $filtros=array()){
		$array = array();

		$where = $this->buildwhere($filtros);
		$sql = "SELECT *,
		(SELECT count(id) FROM imoveis WHERE proprietario.referencia = imoveis.cod_proprietario) AS qtd_imoveis
		FROM proprietario where '1'='1'".implode(' or ', $where)." ORDER BY nome ASC LIMIT $offset, $limit";
		$sql = $this->db->prepare($sql);
		$this->bindwhere($sql, $filtros);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getListImoveis($id){
		$array = array();
		$sql = "SELECT imoveis.id AS id_imovel, imoveis.cod_proprietario, imoveis.endereco, imoveis.bairro, imoveis.cidade FROM imoveis LEFT JOIN proprietario ON imoveis.cod_proprietario = proprietario.referencia WHERE proprietario.id = $id";
		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getNome($codigo) {
		$sql = "SELECT nome FROM proprietario WHERE referencia = '$codigo'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() == 1) {
			$data = $sql->fetch();
			return $data['nome'];
		}
		return '';
	}

	public function proprietario($id){
		$array = array();
		$sql = "SELECT * FROM proprietario WHERE id = '$id'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function getInfoByCode($codigo){
		$array = array();
		$sql = "SELECT * FROM proprietario WHERE referencia = :codigo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':codigo', $codigo);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function getTotalProprietarios() {
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM proprietario";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	public function qtdProprietariosAtivos(){
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM proprietario WHERE status = '1'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	public function qtdProprietariosInativos(){
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM proprietario WHERE status = '2'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	public function getProprietariosBanco(){

		$array = array();
		
		$sql = "SELECT * FROM proprietario WHERE tipo_conta != 0 ORDER BY nome ASC";

		$sql = $this->db->prepare($sql);

		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;

	}
	public function getProprietariosSemBanco(){

		$q = 0;
		
		$sql = "SELECT COUNT(*) as c FROM proprietario WHERE tipo_conta = '0'";

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;

	}

	public function repasse($id_contrato, $n_parcela) {
		$sql = "UPDATE parcelas SET repasse = '1', data_repasse = :data_repasse, id_user = :id_user WHERE id_contrato = :id_contrato AND n_parcela = :n_parcela";

		print_r($sql);

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':data_repasse', date('Y-m-d'));
		$sql->bindValue(':id_user', $_SESSION['user']['id']);
		$sql->bindvalue(':id_contrato', $id_contrato);
		$sql->bindValue(':n_parcela', $n_parcela);

		$sql->execute();
	}

	public function cadProprietario(
		$nome,
		$cpf,	
		$rg,
		$banco, 
		$tipo_conta, 
		$agencia, 
		$conta, 
		$operacao, 
		$pix,
		$nacionalidade,
		$estado_civil,
		$profissao,
		$endereco,
		$bairro,
		$cidade,
		$uf,
		$cep,
		$telefone,
		$info,
		$pagamento){

		$id_user = $_SESSION['user']['id'];

		$sql = "INSERT INTO proprietario SET
			nome 			= 	'$nome',
			cpf				=	'$cpf',	
			rg				=	'$rg',
			banco			=	NULLIF('$banco', ''),
			tipo_conta		=	'$tipo_conta',
			agencia			=	NULLIF('$agencia', ''),
			conta			=	NULLIF('$conta', ''),
			operacao		=	NULLIF('$operacao', ''),
			pix				=	NULLIF('$pix', ''),
			nacionalidade 	=	'$nacionalidade',
			estado_civil 	= 	'$estado_civil',
			profissao 		= 	'$profissao',
			endereco 		=	'$endereco',
			bairro 			=  	'$bairro',
			cidade 			= 	'$cidade',
			uf 				=	'$uf',
			cep 			= 	'$cep',
			telefone 		= 	'$telefone',
			info 			= 	'$info',
			data_cad		= 	NOW(),
			pagamento 		= 	'$pagamento',
			id_user     	= 	'$id_user'";

		$this->db->query($sql);


		$id = $this->db->lastInsertId();

		$codigo = $id.rand(1000, 9999);

		$sql = "UPDATE proprietario SET referencia = '$codigo' WHERE id = '$id'";
		$this->db->query($sql);


		return $id;
	}

	public function upProprietario(
		$id,
		$nome,
		$cpf,
		$rg,
		$banco, 
		$tipo_conta, 
		$agencia, 
		$conta, 
		$operacao, 
		$pix,
		$nacionalidade,
		$estado_civil,
		$profissao,
		$endereco,
		$bairro,
		$cidade,
		$uf,
		$cep,
		$telefone,
		$info,
		$status,
		$pagamento){
			
		$sql = "UPDATE proprietario SET
			nome 			= 	'$nome',
			cpf				=	'$cpf',	
			rg				=	'$rg',
			banco			=	NULLIF('$banco', ''),
			tipo_conta		=	'$tipo_conta',
			agencia			=	NULLIF('$agencia', ''),
			conta			=	NULLIF('$conta', ''),
			operacao		=	NULLIF('$operacao', ''),
			pix				=	NULLIF('$pix', ''),
			nacionalidade 	=   '$nacionalidade',
			estado_civil 	= 	'$estado_civil',
			profissao 		= 	'$profissao',
			endereco 		=	'$endereco',
			bairro 			=  	'$bairro',
			cidade 			= 	'$cidade',
			uf 				=	'$uf',
			cep 			= 	'$cep',
			telefone 		= 	'$telefone',
			info 			= 	'$info',
			status			=	'$status',
			pagamento 		= 	'$pagamento'
			WHERE id  = '$id'";
		$this->db->query($sql);
		
	}

	public function removerProprietario($id) {

		// pega o codigo do proprietario
		$sql = "SELECT referencia FROM proprietario WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() == 1) {
			$row = $sql->fetch();
			$cod_proprietario = $row['referencia'];

			// pega os ids dos imoveis
			$sql = "SELECT id FROM imoveis WHERE cod_proprietario = :cp";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':cp', $cod_proprietario);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$rows = $sql->fetchAll(PDO::FETCH_ASSOC);

				$ids = array();
				foreach ($rows as $imovel) {
					$ids[] = $imovel['id'];
				}

				// pega todas as fotos dos imoveis que serao apagados
				$sql = "SELECT url_img FROM galeria WHERE id_imovel IN ('".implode("', '", $ids)."')";
				$sql = $this->db->query($sql);

				if ($sql->rowCount() > 0) {
					$rows = $sql->fetchAll(PDO::FETCH_ASSOC);

					foreach($rows as $foto) {
						unlink('upload/'.$foto['url_img']);
					} 


					// Apaga as fotos da tabela galeria
					$sql = "DELETE FROM galeria WHERE id_imovel IN ('".implode("', '", $ids)."')";
					$sql = $this->db->query($sql);
				}
			}

			// apaga os imoveis do proprietario
			$sql = "DELETE FROM imoveis WHERE cod_proprietario = :cp";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':cp', $cod_proprietario);
			$sql->execute();

			// apaga o proprietario
			$sql = "DELETE FROM proprietario WHERE id = '$id'";
			$sql = $this->db->query($sql);
		}

		
		
	}

	private function buildwhere($filtros) {
		$where = array();

		if(!empty($filtros['search'])) {
			$where[] = 'AND (nome LIKE :nome';
			$where[] = 'rg LIKE :rg)'; 
		}

		return $where;
	}

	private function bindwhere(&$sql, $filtros) {
		if(!empty($filtros['search'])) {
			$sql->bindvalue(':nome', '%'.$filtros['search'].'%');
			$sql->bindvalue(':rg', '%'.$filtros['search'].'%');
		}
	}
	
}
