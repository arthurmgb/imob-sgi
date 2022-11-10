<?php

class Imoveis extends Model {

	public function disponiveis($limit) {
		$array = array();
		$sql = "SELECT * FROM imoveis WHERE status = '2' ORDER BY endereco ASC LIMIT $limit";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getValorComissao($codigo) {
		$sql = "SELECT comissao FROM imoveis WHERE referencia = '$codigo'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() == 1) {
			$row = $sql->fetch(PDO::FETCH_ASSOC);
			return $row['comissao'];
		}
		return 0;
	}

	public function getList($offset, $limit, $filtros=array()){
		$where = $this->buildwhere($filtros);
		$array = array();
		$sql = "SELECT * FROM imoveis WHERE 1=1 ".implode(' OR ', $where)." ORDER BY endereco ASC LIMIT $offset, $limit";
		$sql = $this->db->prepare($sql);
		$this->bindwhere($sql, $filtros);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	
		public function relatorio(){
		$array = array();
		$sql = "SELECT * FROM imoveis ORDER BY endereco ASC";
			
			$sql = $this->db->query($sql);
	
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


	/*
	* Utilizado quando clicado no link na pagina de visualizacao
	* de imovel
	*
	* O link e para levar para fechamento do contrato
	* O imovel nao e valido caso esteja inativo ou faca parte de um contrato
	*/
	public function getInfoImovelValido($id) {
		$sql = "SELECT * FROM imoveis WHERE status = '1' AND id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		$array = array();
		if ($sql->rowCount() == 1) {
			$array = $sql->fetch(PDO::FETCH_ASSOC);
			$proprietarios = new Proprietarios;
			$array['proprietario'] = $proprietarios->getInfoByCode($array['cod_proprietario']);
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

	public function getTotalImoveis() {
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM imoveis";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	public function qtdImoveisAtivos() {
		$q = 0;

		$sql = "SELECT COUNT(*) as c FROM imoveis WHERE status = '2'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$q = $sql->fetch();
			$q = $q['c'];
		}

		return $q;
	}

	public function cadImoveis(
		$cod_proprietario,
		$endereco,
		$bairro,
		$cidade,
		$uf,
		$cep,	
		$tipo,	
		$finalidade,
		$valor,
		$iptu,
		$reajuste,
		$comissao,
		$dormitorios,
		$suites,
		$banheiros,
		$garagem,
		$tamanho,	
		$outros,
		$site,
		$id_user
		){

		if(empty($tamanho)) {
			$tamanho = 0;
		}

		$sql = "INSERT INTO imoveis SET 
		cod_proprietario = '$cod_proprietario', 
		endereco   = '$endereco',
		bairro 	   = '$bairro',
		cidade     = '$cidade',
		uf		   = '$uf',
		cep        = '$cep',	
		tipo	   = '$tipo',	
		finalidade = '$finalidade',
		valor      = '$valor',
		iptu 	   = '$iptu',
		reajuste   = '$reajuste',
		comissao   = '$comissao',
		data_cad   = NOW(),
		dormitorios= '$dormitorios',
		suites     = '$suites',
		banheiros  = '$banheiros',
		garagem    = '$garagem',
		tamanho    = '$tamanho',	
		outros     = '$outros',
		site       = '$site',
		id_user		= '$id_user'";

		$this->db->query($sql);

		$id = $this->db->lastInsertId();

		$codigo = $id.rand(1000, 9999);


		$sql = "UPDATE imoveis SET referencia = '$codigo' WHERE id = '$id'";
		$this->db->query($sql);

		return $id;

	}

	public function updateImovel($codigo_proprietario, $endereco, $bairro, $cidade, $uf, $cep, $type, $finalidade, $valor, $iptu, 
            $reajuste, $comissao, $status, $dormitorios, $suites, $banheiros, $garagem, $tamanho, $outros, $site, $fotos, $id){	

		if(count($fotos['tmp_name']) > 0) {

			$qtd_fotos = count($fotos['tmp_name']);
            for($q=0; $q<$qtd_fotos; $q++) {
                $tipo = $fotos['type'][$q];
                if(in_array($tipo, array('image/jpeg', 'image/png'))) {

                	if($tipo == 'image/jpeg') {
                    	$ext = '.jpg';
                    } elseif($tipo == 'image/png') {
                        $ext = '.png';
                    }


                    $tmpname = md5(time().rand(0,9999).rand(0,9999)).$ext;
                    move_uploaded_file($fotos['tmp_name'][$q], 'upload/'.$tmpname);

                    list($width_orig, $height_orig) = getimagesize('upload/'.$tmpname);
                    $ratio = $width_orig/$height_orig;

                    $width = 500;
                    $height = 500;

                    if($width/$height > $ratio) {
                        $width = $height*$ratio;
                    } else {
                        $height = $width/$ratio;
                    }

                    $img = imagecreatetruecolor($width,$height);
                    if($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg('upload/'.$tmpname);
                    } elseif($tipo == 'image/png') {
                        $origi = imagecreatefrompng('upload/'.$tmpname);
                    }

                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                    if($tipo == 'image/jpeg') {
                    	imagejpeg($img,'upload/'.$tmpname, 80);
                    } elseif($tipo == 'image/png') {
                        imagepng($img, 'upload/'.$tmpname);
                    }

                    $sql = "INSERT INTO galeria SET id_imovel = '$id', url_img = '$tmpname'";
                    $this->db->query($sql);
                   

                }
            }
        }


        $sql = "UPDATE imoveis SET 
			cod_proprietario = '$codigo_proprietario', 
			endereco   = '$endereco',
			bairro 	   = '$bairro',
			cidade     = '$cidade',
			uf		   = '$uf',
			cep        = '$cep',	
			tipo	   = '$type',	
			finalidade = '$finalidade',
			valor      = '$valor',
			iptu 	   = '$iptu',
			reajuste   = '$reajuste',
			comissao   = '$comissao',
			status     = '$status',
			dormitorios= '$dormitorios',
			suites     = '$suites',
			banheiros  = '$banheiros',
			garagem    = '$garagem',
			tamanho    = '$tamanho',	
			outros     = '$outros',
			site       = '$site'
			WHERE id = '$id'";
			$sql = $this->db->prepare($sql);

			if($sql->execute()) {
				return true;
			} else {
				return false;
			}
	}

	

	public function removerImovel($id) {

		$sql = "SELECT url_img FROM galeria WHERE id_imovel = '$id'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$images = $sql->fetchAll(PDO::FETCH_ASSOC);

			foreach($images as $img) {
				if (file_exists('upload/'.$img['url_img'])) {
					unlink('upload/'.$img['url_img']);
				}
				
			}
			
			$this->db->query("DELETE FROM galeria WHERE id_imovel = '$id'");
		}

		$this->db->query("DELETE FROM imoveis WHERE id = '$id'");
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
			$sql->bindvalue(':bairro', '%'.$filtros['search'].'%');
			$sql->bindvalue(':endereco', '%'.$filtros['search'].'%');
		}
	}

}
