<?php
class CaixaHelper extends Model {
	public function getValores() {
		$array = array(
			'entrada' => 0,
			'saida' => 0,
			'saldo'=> 0
		);
		
		$pagamentos = new Pagamentos;
		$pagamentos = $pagamentos->hoje();

		$lancamentos = new Lancamentos;
		$array['saida'] = $lancamentos->hoje(2);
		$lancamentos_entrada = $lancamentos->hoje(1);

		$array['entrada'] = $pagamentos + $lancamentos_entrada;

		$array['saldo'] = floatval($array['entrada']) - floatval($array['saida']);

		return $array;
	}

	public function fechar() {
		$caixaFechado = $this->caixaFechado();
		$data = date('Y-m-d');

		if ($caixaFechado) {
			$caixa = $this->getValores();

			$sql = "INSERT INTO rel_financeiro SET data = '$data', entrada = '".$caixa['entrada']."', saida = '".$caixa['saida']."', saldo = '".$caixa['saldo']."'";
			$this->db->query($sql);
		}
	}

	public function caixaFechado() {
		$data = date('Y-m-d');
		$sql = "SELECT COUNT(id) AS c FROM rel_financeiro WHERE data = '$data'";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();

		if ($sql['c'] == 0) {
			return 1;
		} else {
			return 0;
		}
	}

	public function reabrir() {
		$data = date('Y-m-d');
		$sql = "DELETE FROM rel_financeiro WHERE data = '$data'";
		$sql = $this->db->query($sql);
	}

	public function relatorio() {

		$data = date('Y/m-/d', strtotime('-1 month'));
		$sql = "SELECT * FROM rel_financeiro WHERE data >= '$data' ORDER BY data ASC";
		$sql = $this->db->query($sql);

		$array = array();
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $array;
	}
}
