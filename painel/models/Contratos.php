<?php

class Contratos extends Model {

	public function getContratos($offset, $limit, $filtros = array()){
		$array = array();

		$where = $this->buildWhere($filtros);

		$sql = "SELECT *,
		(SELECT inq.nome FROM inquilinos inq WHERE con.cod_inquilino = inq.referencia) 
		AS nome_inquilino,
		(SELECT prop.nome FROM proprietario prop WHERE con.cod_proprietario = prop.referencia) 
		AS nome_proprietario
		FROM contratos con WHERE ".implode(' AND ', $where)." 
		ORDER BY nome_inquilino ASC 
		LIMIT $offset, $limit";

		$sql = $this->db->prepare($sql);
		$this->bindWhere($sql, $filtros);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function searchContratos($offset, $limit){
		$array = array();
		$sql = "SELECT *,
		(SELECT inq.nome FROM inquilinos inq WHERE con.cod_inquilino = inq.referencia) AS nome_inquilino,
		(SELECT prop.nome FROM proprietario prop WHERE con.cod_proprietario = prop.referencia) AS nome_proprietario
		FROM contratos con ORDER BY nome_inquilino ASC LIMIT $offset, $limit";
		$sql = $this->db->prepare($sql);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function getlist($offset, $limit, $filtros=array()){
		$where = $this->blwhere($filtros);
		$array = array();
		$sql = "SELECT con.*, inq.nome,
		(SELECT prop.nome FROM proprietario prop WHERE con.cod_proprietario = prop.referencia) AS nome_proprietario 
		FROM contratos con LEFT JOIN inquilinos inq ON inq.referencia = con.cod_inquilino 
		WHERE '1'='1' ".implode(' OR ', $where)."
		ORDER BY inq.nome ASC
		LIMIT 0, 99999";
		$sql = $this->db->prepare($sql);
		$this->bnwhere($sql, $filtros);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
		
	}

	public function contrato($id) {
		$array = array();
		$sql = "SELECT * FROM contratos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
			$array['data_inicio'] = date('d/m/Y', strtotime($array['data_inicio']));			
			$array['data_final'] = date('d/m/Y', strtotime($array['data_final']));

			$config = new Config;
			$proprietarios = new Proprietarios;
			$fiadores = new Fiadores;
			$inquilinos = new Inquilinos;
			$imoveis = new Imoveis;

			$array['config'] = $config->getEmpresa();
			$array['proprietario'] = $proprietarios->getInfoByCode($array['cod_proprietario']);
			$array['imovel'] = $imoveis->getInfoByCode($array['cod_imovel']);
			$array['inquilino'] = $inquilinos->getInfoByCode($array['cod_inquilino']);
			$array['fiadores'] = $fiadores->getInfoFromFiadores(array(
				$array['id_fiador1'], $array['id_fiador2']
			));
		}

		return $array;
	}

	/*public function getCodigosFiadoresByCodeInquilino($cod_inquilino) {
		$sql = "SELECT id_fiador1, id_fiador2 FROM contratos WHERE cod_inquilino = '".$cod_inquilino."' LIMIT 1";
		$sql = $this->db->query($sql);

		$array = array();
		if ($sql->rowCount() == 1) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $array;
	}*/

	public function getTotalContratos($filtros=array()) {
		$q = 0;

		$where = $this->buildWhere($filtros);
		$sql = "SELECT COUNT(*) as c FROM contratos WHERE ".implode(' AND ', $where);
		$sql = $this->db->prepare($sql);
		$this->bindWhere($sql, $filtros);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}
		return $q;
	}

	public function getContratosAtrasados($offset, $limit){
		$array = array();
		$hoje = date('Y-m-d');
		$sql = "SELECT *,
		(SELECT inq.nome FROM inquilinos inq WHERE con.cod_inquilino = inq.referencia) AS nome_inquilino,
		(SELECT prop.nome FROM proprietario prop WHERE con.cod_proprietario = prop.referencia) AS nome_proprietario
		FROM contratos con WHERE data_final <= '$hoje' ORDER BY data_final ASC LIMIT $offset, $limit";
		
		//print_r($sql); exit;

		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	/*public function searchImovel(){
		$array = array();
		if(!empty($_POST['texto'])) {
			$searchImovel = $_POST['texto'];
			$sql = "SELECT * FROM imoveis WHERE referencia LIKE '%$searchImovel%'";
			
			$sql = $this->db->query($sql);

			if($sql->rowCount() > 0) {
				foreach($sql->fetchAll() as $cod) {
					$array[] = array('referencia'=>$cod['referencia'], 'id'=>$cod['id']);
				}
			}
		}
		echo json_encode($array);
	}*/

	public function getCodInquilinoById($id) {
		$sql = "SELECT cod_inquilino FROM contratos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			return $data['cod_inquilino'];
		}
		return 0;
	}

	public function getCodProprietarioById($id) {
		$sql = "SELECT cod_proprietario FROM contratos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			return $data['cod_proprietario'];
		}
		return 0;
	}

	public function getCodImovelById($id) {
		$sql = "SELECT cod_imovel FROM contratos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$data = $sql->fetch();
			return $data['cod_imovel'];
		}
		return 0;
	}

	public function busca($valor) {

		$sql = "SELECT cod_proprietario, tipo, endereco, bairro, cidade, cep, finalidade, valor, iptu, reajuste FROM imoveis WHERE NOT(status IN ('2', '3')) AND referencia LIKE ?";
	 	$stm = $this->db->prepare($sql);
		$stm->bindValue(1, '%'.$valor.'%');
		$stm->execute();
		$result = $stm->fetch(PDO::FETCH_ASSOC);

		$result['iptu'] = ($result['iptu'] == 1) ? 'Sim':'Não';
		$result['finalidade'] = ($result['finalidade'] == 1) ? 'Locacao':'Venda';

		$tipos = array(
			'1' => 'Casa',
			'2' => 'Apartamento',
			'3' => 'Comercial'
		);
		
		$tipo = $result['tipo'];
		$result['tipo'] = $tipos[$tipo];

		$prop = new Proprietarios;
		$result['proprietario'] = $prop->getNome($result['cod_proprietario']);

		return $result;
	}

	public function adicionar(
		$cod_imovel, $cod_inquilino,
		$cod_proprietario, $fiador1,
		$fiador2, $data_inicio,
		$data_final, $periodo, $info,
		$valor
	) {
		$data_inicio = date('Y/m/d', $data_inicio);
		$sql = "INSERT INTO contratos SET cod_proprietario = :cp, cod_imovel = :cim, cod_inquilino = :cin, id_fiador1 = :fiador1, id_fiador2 = :fiador2, periodo = :periodo, info = :info, data_inicio = :di, data_final = :df, id_user = :idu";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cp', $cod_proprietario);
		$sql->bindValue(':cim', $cod_imovel);
		$sql->bindValue(':cin', $cod_inquilino);
		$sql->bindValue(':fiador1', $fiador1);
		$sql->bindValue(':fiador2', $fiador2);
		$sql->bindValue(':periodo', $periodo);
		$sql->bindValue(':info', $info);
		$sql->bindValue(':di', $data_inicio);
		$sql->bindValue(':df', date('Y/m/d', $data_final));
		$sql->bindValue(':idu', $_SESSION['user']['id']);
		$sql->execute();

		$id_contrato = $this->db->lastInsertId();

		// Marca status do imovel
		$sql = "UPDATE imoveis SET status = '3' WHERE referencia = ?";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(1, $cod_imovel);
		$sql->execute();

		$parcelas = new Parcelas;
		$parcelas->criar($periodo, $id_contrato, $data_inicio, $valor);

		if ($id_contrato) {
			$inquilinos = new Inquilinos;
			$inquilinos->cadImovel($cod_imovel, $cod_inquilino);
		}

		return $id_contrato;
	}

	public function update($id_contrato, $referencia_imovel, $reajuste, $iptu, $n_valor, $periodo, $data_inicio, $data_final, $id_user){
		//atualiza informação do contrato -> periodo, data_inicio, data_final, id_user 	
		$data_inicio = date('Y/m/d', $data_inicio);
		
		$sql = "UPDATE contratos SET periodo = :periodo, data_inicio = :data_incio, data_final = :data_final, id_user = :id_user WHERE id = '$id_contrato'";
		$sql = $this->db->prepare($sql);
		
		$sql->bindValue(':periodo', $periodo);
		$sql->bindValue(':data_incio', $data_inicio);
		$sql->bindValue(':data_final', date('Y/m/d', $data_final));
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		
		//Atualiza informações do imovel -> valor, iptu, reajuste
		$sql = "UPDATE imoveis SET valor = :valor, iptu = :iptu, reajuste = :reajuste WHERE referencia = '$referencia_imovel'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':valor', $n_valor);
		$sql->bindValue(':iptu', $iptu);
		$sql->bindValue(':reajuste', $reajuste);
		$sql->execute();
		
		//renova parcelas
		$parcelas = new Parcelas;

		$parcelas->renovar($periodo, $id_contrato, $data_inicio, $n_valor);
		
	}
	
	public function del($id) {

		$sql = "SELECT cod_imovel FROM contratos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() == 1) {
			$data = $sql->fetch();

			$sql = "UPDATE imoveis SET status = '1' WHERE referencia = ".$data['cod_imovel'];
			$sql = $this->db->query($sql);

			$sql = "UPDATE inquilinos SET cod_imovel = '0' WHERE cod_imovel = ".$data['cod_imovel'];
			$sql = $this->db->query($sql);

			$parcelas = new Parcelas;
			$parcelas->apagar($id);

			$sql = "DELETE FROM contratos WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();
		}	
	}

	public function search($filtros) {
		$array = array();

		$where = $this->bindWhere($filtros);

		$sql = "SELECT con.*, inq.nome as nome_inquilino,
		(SELECT prop.nome FROM proprietario prop WHERE con.cod_proprietario = prop.referencia) AS nome_proprietario FROM contratos con LEFT JOIN inquilinos inq ON inq.referencia = con.cod_inquilino WHERE ".implode(' AND ', $where)." LIMIT 0, 5";
		$sql = $this->db->prepare($sql);
		$this->buildWhere($sql, $filtros);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);

			foreach ($array as $key => $item) {
				$array[$key]['data_inicio'] = date('d/m/Y', strtotime($item['data_inicio']));			
				$array[$key]['data_final'] = date('d/m/Y', strtotime($item['data_final']));
			}
						
		}

		return $array;
	}

	private function buildWhere(array $filtros):array {
		$where = array('1=1');

		if (!empty($filtros['status'])) {

			switch($filtros['status']) {
				case 1:
					$where[] = 'data_final > :agora';
				break;
				case 2:
					$where[] = 'data_final >= :agora AND data_final <= :um_mes_frente';
				break;
				case 3:
					$where[] = 'data_final < :agora';
				break;
			}

		}

		return $where;
	}

	private function bindWhere(&$sql, array $filtros) {
		if (!empty($filtros['status'])) {

			$agora = date('Y-m-d');

			switch($filtros['status']) {
				case 1:
					$sql->bindValue(':agora', $agora);
				break;
				case 2:
					$um_mes_frente = date('Y-m-d', strtotime('+1 month', strtotime($agora)));
					$sql->bindValue(':um_mes_frente', $um_mes_frente);
					$sql->bindValue(':agora', $agora);
				break;
				case 3:
					$sql->bindValue(':agora', $agora);
				break;
			}

			
		}
	}

	private function blwhere($filtros) {
		$where = array();

		if(!empty($filtros['search'])) {
			$where[] = 'AND (inq.nome LIKE :nome)';
		}

		return $where;
	}

	private function bnwhere(&$sql, $filtros) {
		if(!empty($filtros['search'])) {
			$sql->bindvalue(':nome', '%'.$filtros['search'].'%');
		}
	}

}
	