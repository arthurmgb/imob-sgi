<?php
class Parcelas extends Model {
	public function criar($qt, $contrato, $data_inicio, $valor) {

		$valor = str_replace(['R$', ' ', '.'], '', $valor);
		
		for ($q = 1; $q <= $qt; $q++) {
			if ($q > 1) {
				$data_inicio = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));
			}

			$data_mes = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));

			$sql = "INSERT INTO parcelas SET id_contrato = :id_contrato, n_parcela = '".$q."', valor = :valor, data_inicio = :data_inicio, data_fim = :data_fim";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_contrato', $contrato);
			$sql->bindValue(':valor', $valor);
			$sql->bindValue(':data_inicio', $data_inicio);
			$sql->bindValue(':data_fim', $data_mes);
			$sql->execute();
		}
		
	}

	public function renovar($qt, $id_contrato, $data_inicio, $n_valor) {

		$n_valor = str_replace(['R$', ' ', '.'], '', $n_valor);
		
		for ($q = 1; $q <= $qt; $q++) {
			if ($q > 1) {
				$data_inicio = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));
			}

			$data_mes = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));
			$sql = "INSERT INTO parcelas SET id_contrato = :id_contrato, n_parcela = '".$q."-".date('y')."', valor = :valor, data_inicio = :data_inicio, data_fim = :data_fim";
			
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_contrato', $id_contrato);
			$sql->bindValue(':valor', $n_valor);
			$sql->bindValue(':data_inicio', $data_inicio);
			$sql->bindValue(':data_fim', $data_mes);
			$sql->execute();
		}
		
	}

	public function getLista($filtros=array()) {
		$array = array();
		$where = $this->buildWhere($filtros);

		$sql = "SELECT * FROM parcelas WHERE ".implode(' AND ', $where)." ORDER BY data_fim";
		$sql = $this->db->prepare($sql);
		$this->bindWhere($sql, $filtros);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array['lista'] = $sql->fetchAll(PDO::FETCH_ASSOC);

      		$contratos = new Contratos;
      		$cod_inquilino = $contratos->getCodInquilinoById($array['lista'][0]['id_contrato']);
      		$cod_proprietario = $contratos->getCodProprietarioById($array['lista'][0]['id_contrato']);
      		$cod_imovel = $contratos->getCodImovelById($array['lista'][0]['id_contrato']);

			$inquilinos = new Inquilinos;
		  	$array['nome_inquilino'] = $inquilinos->getNome($cod_inquilino);
    	
		  	$proprietario = new Proprietarios;
		  	$array['nome_proprietario'] = $proprietario->getNome($cod_proprietario);

		  	$imoveis = new Imoveis;
		  	$array['comissao'] = $imoveis->getValorComissao($cod_imovel);
    	}
    	return $array;	
	}

	public function getInfo($n_parcela, $id_contrato) {
		/*$sql = "SELECT * FROM parcelas WHERE status = '1' AND n_parcela = :n_parcela AND id_contrato = :id_contrato";*/

		$sql = "SELECT * FROM parcelas WHERE n_parcela = :n_parcela AND id_contrato = :id_contrato";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':n_parcela', $n_parcela);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->execute();

		$array = array();
		if ($sql->rowCount() == 1) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}
	
		return $array;
	}

	public function pagar($id_contrato, $n_parcela) {
		$data_pag = date('Y-m-d');

		$sql = "UPDATE parcelas SET status = '1', data_pag = :data_pag WHERE id_contrato = :id_contrato AND n_parcela = :n_parcela";
		
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->bindValue(':n_parcela', $n_parcela);		
		$sql->bindValue(':data_pag', $data_pag);
		$sql->execute();

		$parcela = $this->getInfo($n_parcela, $id_contrato);
		$sql = "INSERT INTO pagamentos SET valor = :valor, data = :data, id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':valor', $parcela['valor']);
		$sql->bindValue(':data', date('Y-m-d H:i:s'));
		$sql->bindValue(':id_user', $_SESSION['user']['id']);
		$sql->execute();
	}

	// Apagar todas as parcelas
	public function apagar($id_contrato) {
		$sql = "DELETE FROM parcelas WHERE id_contrato = :id_contrato";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->execute();
	}

	//pega parcelas atrasadas 
	public function getPagAtrasado(){
		$array = array();
		$hoje = date('Y-m-d');
		$sql = "SELECT *,
		(SELECT inq.nome AS nome_inquilino FROM inquilinos inq, contratos con WHERE con.id = parcelas.id_contrato AND con.cod_inquilino = inq.referencia) AS nome_inquilino
		FROM parcelas WHERE data_fim <= '$hoje' AND status = '0' ORDER BY data_fim ASC LIMIT 5";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	private function buildWhere($filtros) {
		$where = array('1=1');

		if (!empty($filtros['contrato'])) {
			$where[] = 'id_contrato = :contrato';
		}

		return $where;
	}

	private function bindWhere(&$sql, $filtros) {
		if (!empty($filtros['contrato'])) {
			$sql->bindValue(':contrato', $filtros['contrato']);
		}
	}
}

