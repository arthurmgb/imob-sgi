<?php
class Parcelas extends Model
{
	public function criar($qt, $contrato, $data_inicio, $valor)
	{

		$valor = str_replace(['R$', ' ', '.'], '', $valor);

		for ($q = 1; $q <= $qt; $q++) {
			if ($q > 1) {
				$data_inicio = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));
			}

			$data_mes = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));

			$sql = "INSERT INTO parcelas SET id_contrato = :id_contrato, n_parcela = '" . $q . "', valor = :valor, data_inicio = :data_inicio, data_fim = :data_fim";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_contrato', $contrato);
			$sql->bindValue(':valor', $valor);
			$sql->bindValue(':data_inicio', $data_inicio);
			$sql->bindValue(':data_fim', $data_mes);
			$sql->execute();
		}
	}

	public function renovar($qt, $id_contrato, $data_inicio, $n_valor)
	{

		for ($q = 1; $q <= $qt; $q++) {
			if ($q > 1) {
				$data_inicio = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));
			}

			$data_mes = Date('Y-m-d', strtotime('+ 1 month', strtotime($data_inicio)));
			$sql = "INSERT INTO parcelas SET id_contrato = :id_contrato, n_parcela = '" . $q . "-" . date('y') . "', valor = :valor, data_inicio = :data_inicio, data_fim = :data_fim";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_contrato', $id_contrato);
			$sql->bindValue(':valor', $n_valor);
			$sql->bindValue(':data_inicio', $data_inicio);
			$sql->bindValue(':data_fim', $data_mes);
			$sql->execute();
		}
	}

	public function getLista($filtros = array())
	{
		$array = array();
		$where = $this->buildWhere($filtros);

		$sql = "SELECT * FROM parcelas WHERE " . implode(' AND ', $where) . " ORDER BY data_fim";
		$sql = $this->db->prepare($sql);
		$this->bindWhere($sql, $filtros);
		$sql->execute();

		if ($sql->rowCount() > 0) {
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

	public function getInfo($n_parcela, $id_contrato)
	{
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

	public function populate($n_parcela, $id_contrato)
	{
		$array = array();

		$sql = "SELECT * FROM parcelas WHERE n_parcela = :n_parcela AND id_contrato = :id_contrato";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':n_parcela', $n_parcela);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->execute();

		if ($sql->rowCount() == 1) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);

			if (!empty($array['data_inicio'])) {
				$array['data_inicio'] = date('Y-m-d', strtotime($array['data_inicio']));
			}
			if (!empty($array['data_fim'])) {
				$array['data_fim'] = date('Y-m-d', strtotime($array['data_fim']));
			}
			if (!empty($array['data_pag'])) {
				$array['data_pag'] = date('Y-m-d', strtotime($array['data_pag']));
			}
			// Formatando o valor pra chegar certo no mask
			if (!empty($array['valor'])) {
				$valor = str_replace(',', '.', $array['valor']); // Caso tenha vindo com vírgula
				$valor = (float) $valor; // Converte pra número de fato
				$array['valor'] = number_format($valor, 2, ',', '.'); // Agora sim, formatado corretamente
			}
		}

		return $array;
	}

	public function editar($n_parcela, $id_contrato, $data_inicio, $data_fim, $valor, $data_pag, $data_rep)
	{

		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);

		// echo "<pre>";
		// echo "Data Início: $data_inicio\n";
		// echo "Data Fim: $data_fim\n";
		// echo "Valor: $valor\n";
		// echo "Data Pagamento: $data_pag\n";
		// echo "Data Repasse: $data_rep\n";
		// echo "Número da Parcela: $n_parcela\n";
		// echo "ID do Contrato: $id_contrato\n";
		// echo "</pre>";
		// exit;

		$sql = "UPDATE parcelas SET data_inicio = :data_inicio, data_fim = :data_fim, valor = :valor, data_pag = :data_pag, data_repasse = :data_rep WHERE n_parcela = :n_parcela AND id_contrato = :id_contrato";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':data_inicio', $data_inicio);
		$sql->bindValue(':data_fim', $data_fim);
		$sql->bindValue(':valor', $valor);
		$sql->bindValue(':data_pag', $data_pag);
		$sql->bindValue(':data_rep', $data_rep);
		$sql->bindValue(':n_parcela', $n_parcela);
		$sql->bindValue(':id_contrato', $id_contrato);
		return $sql->execute();
	}

	public function getRecibosByDate($data)
	{

		$array = array();

		$data_inicio = $data['data-inicio'];
		$data_fim = $data['data-fim'];

		$sql = "SELECT p.id_contrato, p.data_inicio, p.data_fim, p.n_parcela, p.valor,
				inq.nome AS nome_inq, inq.cpf AS cpf_inq, inq.referencia AS ref_inq,
				pro.nome AS nome_pro, pro.cpf AS cpf_pro, pro.banco AS banco_pro, pro.tipo_conta AS tipo_conta_pro, pro.agencia AS agencia_pro, pro.conta AS conta_pro, pro.operacao AS operacao_pro, pro.pix AS pix_pro,
				imv.endereco AS end_imv, imv.bairro AS bairro_imv, imv.valor AS valor_imv, imv.comissao AS com_imv
				FROM parcelas AS p
				INNER JOIN contratos AS con 
				ON p.id_contrato = con.id
				INNER JOIN inquilinos AS inq 
				ON con.cod_inquilino = inq.referencia
				INNER JOIN proprietario AS pro
				ON con.cod_proprietario = pro.referencia
				INNER JOIN imoveis AS imv 
				ON con.cod_imovel = imv.referencia
				WHERE p.data_inicio >= '$data_inicio' AND p.data_fim <= '$data_fim'
				ORDER BY nome_pro ASC, p.data_inicio ASC
				";

		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function pagar($id_contrato, $n_parcela, $origem)
	{

		$data_pag = date('Y-m-d');

		$sql = "UPDATE parcelas SET status = '1', data_pag = :data_pag, origem = :origem WHERE id_contrato = :id_contrato AND n_parcela = :n_parcela";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->bindValue(':n_parcela', $n_parcela);
		$sql->bindValue(':data_pag', $data_pag);
		$sql->bindValue(':origem', $origem);
		$sql->execute();

		$parcela = $this->getInfo($n_parcela, $id_contrato);
		$sql = "INSERT INTO pagamentos SET valor = :valor, data = :data, id_user = :id_user";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':valor', $parcela['valor']);
		$sql->bindValue(':data', date('Y-m-d H:i:s'));
		$sql->bindValue(':id_user', $_SESSION['user']['id']);
		$sql->execute();
	}

	public function estornarPagamento($id_contrato, $n_parcela)
	{
		$sql = "UPDATE parcelas SET status = '0', data_pag = NULL, origem = NULL, repasse = '0', data_repasse = NULL WHERE id_contrato = :id_contrato AND n_parcela = :n_parcela";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->bindValue(':n_parcela', $n_parcela);
		$sql->execute();
	}

	// Apagar todas as parcelas
	public function apagar($id_contrato)
	{
		$sql = "DELETE FROM parcelas WHERE id_contrato = :id_contrato";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->execute();
	}

	//pega parcelas atrasadas 
	public function getPagAtrasado()
	{
		$array = array();
		$hoje = date('Y-m-d');

		$sql = "SELECT parcelas.*, inq.nome AS nome_inquilino, prop.nome AS nome_proprietario 
				FROM parcelas
				LEFT JOIN contratos con ON con.id = parcelas.id_contrato
				LEFT JOIN inquilinos inq ON con.cod_inquilino = inq.referencia
				LEFT JOIN proprietario prop ON con.cod_proprietario = prop.referencia
				WHERE parcelas.data_fim <= '$hoje' 
				AND parcelas.status = '0'
				ORDER BY inq.nome ASC;
				";

		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getInquilinosRelatorio()
	{

		$array = array();

		$sql = "SELECT referencia, nome FROM `inquilinos` WHERE `status` = 1 ORDER BY nome ASC";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getParcelasFromInput($data)
	{

		$array = array();

		$hoje = date('Y-m-d');
		$data_inicio = $data['data-inicio'];
		$data_fim = $data['data-fim'];
		$data_situacao = $data['selected-situacao'];
		$data_cliente = $data['selected-cliente'];

		if ($data_situacao == 'all') {
			$data_situacao = "'1','0'";
		}

		if ($data_cliente == 'all') {

			$sql_inquilinos = "SELECT referencia FROM `inquilinos` WHERE `status` = 1";

			$sql_inquilinos = $this->db->query($sql_inquilinos);

			if ($sql_inquilinos->rowCount() > 0) {

				$data_cliente = $sql_inquilinos->fetchAll(PDO::FETCH_ASSOC);
				$data_cliente = implode("', '", array_column($data_cliente, 'referencia'));
			}
		}

		//SQL'S
		if ($data_situacao == '3') {
			$sql = "SELECT p.*, 
					inq.nome AS nome_inquilino,
					imv.comissao AS imv_comissao
					FROM parcelas AS p
					INNER JOIN contratos AS con 
					ON p.id_contrato = con.id
					INNER JOIN inquilinos AS inq 
					ON con.cod_inquilino = inq.referencia
					INNER JOIN imoveis AS imv
					ON con.cod_imovel = imv.referencia
					WHERE p.data_inicio >= '$data_inicio' AND p.data_fim <= '$data_fim'
					AND p.status = '0'
					AND p.data_fim <= '$hoje'
					AND inq.referencia IN ('$data_cliente')
					ORDER BY nome_inquilino ASC, p.data_inicio ASC";
		} elseif ($data_situacao == '0') {
			$sql = "SELECT p.*, 
					inq.nome AS nome_inquilino,
					imv.comissao AS imv_comissao
					FROM parcelas AS p
					INNER JOIN contratos AS con 
					ON p.id_contrato = con.id
					INNER JOIN inquilinos AS inq 
					ON con.cod_inquilino = inq.referencia
					INNER JOIN imoveis AS imv
					ON con.cod_imovel = imv.referencia
					WHERE p.data_inicio >= '$data_inicio' AND p.data_fim <= '$data_fim'
					AND p.status = '0'
					AND p.data_fim > '$hoje'
					AND inq.referencia IN ('$data_cliente')
					ORDER BY nome_inquilino ASC, p.data_inicio ASC";
		} else {
			$sql = "SELECT p.*, 
					inq.nome AS nome_inquilino,
					imv.comissao AS imv_comissao				
					FROM parcelas AS p
					INNER JOIN contratos AS con 
					ON p.id_contrato = con.id
					INNER JOIN inquilinos AS inq 
					ON con.cod_inquilino = inq.referencia
					INNER JOIN imoveis AS imv
					ON con.cod_imovel = imv.referencia
					WHERE p.data_inicio >= '$data_inicio' AND p.data_fim <= '$data_fim'
					AND p.status IN ($data_situacao)
					AND inq.referencia IN ('$data_cliente')
					ORDER BY nome_inquilino ASC, p.data_inicio ASC";
		}

		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function getParcelasFromInputDp($data)
	{

		$array = array();

		$hoje = date('Y-m-d');
		$mes_pag = $data['selected-mes'];
		$ano_pag = $data['ano-pag'];

		$data_cliente = $data['selected-cliente'];

		if ($data_cliente == 'all') {

			$sql_inquilinos = "SELECT referencia FROM `inquilinos` WHERE `status` = 1";

			$sql_inquilinos = $this->db->query($sql_inquilinos);

			if ($sql_inquilinos->rowCount() > 0) {

				$data_cliente = $sql_inquilinos->fetchAll(PDO::FETCH_ASSOC);
				$data_cliente = implode("', '", array_column($data_cliente, 'referencia'));
			}
		}

		//SQL

		$sql = "SELECT p.*, 
					inq.nome AS nome_inquilino,
					imv.comissao AS imv_comissao				
					FROM parcelas AS p
					INNER JOIN contratos AS con 
					ON p.id_contrato = con.id
					INNER JOIN inquilinos AS inq 
					ON con.cod_inquilino = inq.referencia
					INNER JOIN imoveis AS imv
					ON con.cod_imovel = imv.referencia
					WHERE MONTH(p.data_pag) = '$mes_pag'
        			AND YEAR(p.data_pag) = '$ano_pag'
					AND p.status IN (1)
					AND inq.referencia IN ('$data_cliente')
					ORDER BY nome_inquilino ASC, p.data_inicio ASC";


		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	private function buildWhere($filtros)
	{
		$where = array('1=1');


		if (!empty($filtros['contrato'])) {
			$where[] = 'id_contrato = :contrato';
		}

		if (!empty($filtros['pagas'])) {
			if ($filtros['pagas'] == 'false') {
				$where[] = 'status = 0';
			} elseif ($filtros['pagas'] == 'true') {
				$where[] = 'status IN (0, 1)';
			}
		}

		if (!empty($filtros['repassadas'])) {
			if ($filtros['repassadas'] == 'false') {
				$where[] = 'repasse = 0';
			} elseif ($filtros['repassadas'] == 'true') {
				$where[] = 'repasse IN (0, 1)';
			}
		}

		return $where;
	}

	private function bindWhere(&$sql, $filtros)
	{
		if (!empty($filtros['contrato'])) {
			$sql->bindValue(':contrato', $filtros['contrato']);
		}
	}
}
