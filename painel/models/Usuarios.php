<?php

class Usuarios extends Model {

	public function getlist(){
		$array = array();
		$sql = "SELECT * FROM usuarios";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function usuario($id){
		$array = array();
		$sql = "SELECT * FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}

	public function add($nome, $cpf, $login, $senha, $email, $telefone, $nivel){

		$sql = "INSERT INTO usuarios SET
			nome 	 	 = '$nome', 
			cpf 	 	 = '$cpf', 
			login 	 = '$login', 
			senha 	 = MD5('$senha'),
			email 	 = '$email', 
			telefone = '$telefone',
			nivel    = '$nivel',
			avatar   = 'user.png',
			token    = '' ";
		
		$this->db->query($sql);
		return $this->db->lastInsertId();
	}

	public function update($id, $nome, $cpf, $login, $senha, $email, $telefone, $nivel){

		$sql = "UPDATE usuarios SET
		nome 	 		= '$nome', 
		cpf 	 		= '$cpf', 
		login 	 	= '$login', 
		senha 	 	= MD5('$senha'), 
		email 	 	= '$email', 
		telefone 	= '$telefone', 
		nivel    	= '$nivel',
		token   	= ''
		WHERE id = '$id'";

		$this->db->query($sql);
	}

	public function removerUsuario($id) {

		$sql = "SELECT avatar FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			$img = $sql->fetch();
			$img = $img['avatar'];

			unlink('../upload/avatar/'.$img);

			$this->db->query("DELETE FROM usuarios WHERE id = '$id'");
		}
	}

	public function verifyuser($login, $senha){
		
		$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = MD5('$senha')";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
			$_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);
			unset($_SESSION['user']['token']);
			return true;
		}else{
			return false;
		}
	}

	public function createToken($login){
		$token = MD5(time().rand(0, 9999).time().rand(0, 9999));

		$sql = "UPDATE usuarios SET token = '$token' WHERE login = '$login'";
		$sql = $this->db->query($sql);

		return $token;


	}

	public function checkLogin(){
		if(!empty($_SESSION['token'])) {
			return true;
		} else {
			return false;
		}
	}


	}
