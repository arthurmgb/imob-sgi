<?php
class Config extends Model
{

    public function getEmpresa()
    {
        $array = array();
        $sql = "SELECT * FROM empresa WHERE id = '1'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function upEmpresa($id, $razao_social, $cnpj, $insc, $creci, $telefone, $email, $endereco, $bairro, $cidade, $uf, $cep)
    {
        $sql = "UPDATE empresa SET 
				razao_social = :razao_social,
				cnpj = :cnpj, insc = :insc,
				creci = :creci, telefone = :telefone,
				email = :email, endereco = :endereco,
				bairro = :bairro, cidade = :cidade,
				uf = :uf, cep = :cep
			WHERE id = '1'";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':razao_social', $razao_social);
        $sql->bindValue(':cnpj', $cnpj);
        $sql->bindValue(':insc', $insc);
        $sql->bindValue(':creci', $creci);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':cidade', $cidade);
        $sql->bindValue(':uf', $uf);
        $sql->bindValue(':cep', $cep);
        $sql->execute();
    }

    public function removerLogo($id)
    {
    }
}