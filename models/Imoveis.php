<?php

class Imoveis extends Model {

	public function getList($offset, $limit, $filtros=array()){
		$where = $this->buildwhere($filtros);
		$array = array();
		$sql = "SELECT * FROM imoveis WHERE 1=1 ".implode(' OR ', $where)." order by id desc LIMIT $offset, $limit";
		$sql = $this->db->prepare($sql);
		$this->bindwhere($sql, $filtros);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function imovel($id){
		$array = array();
		$sql = "SELECT * FROM imoveis WHERE id = '$id'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
			$array['fotos'] = array();

            $sql = "SELECT * FROM galeria WHERE id_imovel = '$id'";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0) {
                $array['fotos'] = $sql->fetchAll();
            }
		}
		return $array;
	}
	

	public function getImoveis($offset, $limit){
		$array = array();
		/*$sql = "SELECT imoveis.id, imoveis.referencia, imoveis.endereco, imoveis.bairro, imoveis.cidade, imoveis.valor, imoveis.tipo, imoveis.finalidade, imoveis.dormitorios, imoveis.banheiros, imoveis.garagem, imoveis.suites,imoveis.data_cad, 
			galeria.url_img AS thumb FROM imoveis LEFT JOIN galeria ON imoveis.id = galeria.id_imovel WHERE status = '1' AND site = '1' 
			ORDER BY imoveis.data_cad DESC LIMIT $offset, $limit";*/
			$sql = "SELECT *, (select galeria.url_img from galeria where galeria.id_imovel = imoveis.id limit 1) as url_img FROM imoveis WHERE site = '1' AND status = '1' ORDER BY id DESC LIMIT $offset, $limit";
     	$sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
     	}
   	  return $array;
	}

	public function getImoveisAluguel($offset, $limit){
		$array = array();
		/*$sql = "SELECT imoveis.id, imoveis.referencia, imoveis.endereco, imoveis.bairro, imoveis.cidade, imoveis.valor, imoveis.tipo, imoveis.finalidade, imoveis.dormitorios, imoveis.banheiros, imoveis.garagem, imoveis.suites,imoveis.data_cad, 
			galeria.url_img AS thumb FROM imoveis LEFT JOIN galeria ON imoveis.id = galeria.id_imovel WHERE status = '1' AND site = '1' AND finalidade = 1
			ORDER BY imoveis.data_cad DESC LIMIT $offset, $limit";*/
			$sql = "SELECT *, (select galeria.url_img from galeria where galeria.id_imovel = imoveis.id limit 1) as url_img FROM imoveis WHERE site = '1' AND status = '1'  AND finalidade = 1 ORDER BY id DESC LIMIT $offset, $limit";
     	$sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
     	}
   	  return $array;
	}

	public function getImoveisComprar($offset, $limit){
		$array = array();
		$sql = "SELECT imoveis.id, imoveis.referencia, imoveis.endereco, imoveis.bairro, imoveis.cidade, imoveis.valor, imoveis.tipo, imoveis.finalidade, imoveis.dormitorios, imoveis.banheiros, imoveis.garagem, imoveis.suites,imoveis.data_cad, 
			galeria.url_img AS thumb FROM imoveis LEFT JOIN galeria ON imoveis.id = galeria.id_imovel WHERE status = '1' AND site = '1' AND finalidade = 2
			ORDER BY imoveis.data_cad DESC LIMIT $offset, $limit";
     	$sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
     	}
   	  return $array;
	}

	public function getInfoByCode($codigo){
		$array = array();
		$sql = "SELECT * FROM imoveis WHERE referencia = :codigo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':codigo', $codigo);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
		}
		return $array;
	}

	private function buildwhere($filtros) {
		$where = array();

		if(!empty($filtros['search'])) {
			$where[] = 'AND (bairro LIKE :bairro';
			$where[] = 'endereco LIKE :endereco)';
		}

		return $where;
	}

	private function bindwhere(&$sql, $filtros) {
		if(!empty($filtros['search'])) {
			$sql->bindvalue(':bairro', $filtros['search'].'%');
			$sql->bindvalue(':endereco', $filtros['search'].'%');
		}
	}

}
