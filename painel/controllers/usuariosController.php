<?php
class usuariosController extends Controller
{

	private $dados = array(
		'menu_ativo' => 'usuarios'
	);

	public function __construct()
	{
		parent::__construct();
		$this->user = new Usuarios();
		if (!$this->user->checkLogin()) {
			header("Location: " . BASE_URL . "login");
			exit;
		}
		if ($_SESSION['user']['nivel'] != '1') {
			header("Location: " . BASE_URL . '404');
			exit;
		}
	}

	public function adicionar()
	{

		$dados = $this->dados;

		if (!empty($_POST['nome'])) {

			$nome	 		= addslashes($_POST['nome']);
			$cpf	 		= addslashes($_POST['cpf']);
			$nivel 		=	addslashes($_POST['nivel']);
			$login	 	= addslashes($_POST['login']);
			$senha	 	= addslashes($_POST['senha']);
			$id = 0;

			$cadUser = new Usuarios();
			$id = $cadUser->add($nome, $cpf, $login, $senha, $nivel);

			if ($id > 0) {
				$data = array(
					'type' => 'success',
					'msg' => 'Usuário cadastrado com sucesso!'
				);
				$data = http_build_query($data);
				header('Location: ' . BASE_URL . 'usuarios?' . $data);
				exit;
			} else {
				$data = array(
					'type' => 'danger',
					'msg' => 'Ocorreu um erro!'
				);
				$data = http_build_query($data);
				header('Location: ' . BASE_URL . 'usuarios/adicionar?' . $data);
				exit;
			}
		}

		if (!empty($_GET['msg'])) {
			$dados['error']['msg'] = $_GET['msg'];
			$dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
		}

		$this->loadTemplate('usuarios/add', $dados);
	}


	public function index()
	{
		$dados = $this->dados;

		$user = new Usuarios();
		$dados['user'] = $user->getList();

		$this->loadTemplate('usuarios/index', $dados);
	}

	public function ver($id)
	{
		$dados = $this->dados;

		$u = new Usuarios();
		$dados['user'] = $u->usuario($id);

		$this->loadTemplate('usuarios/view', $dados);
	}

	public function editar($id)
	{
		$dados = $this->dados;

		if (!empty($_POST['nome'])) {

			$nome	 = addslashes($_POST['nome']);
			$cpf	 = addslashes($_POST['cpf']);
			$nivel	 = addslashes($_POST['nivel']);
			$email = !empty(trim($_POST['email'])) ? addslashes($_POST['email']) : null;
			$telefone = !empty(trim($_POST['telefone'])) ? addslashes($_POST['telefone']) : null;
			$login	 = addslashes($_POST['login']);
			$senha = !empty(trim($_POST['senha'])) ? addslashes($_POST['senha']) : null;

			// echo "<pre>";
			// var_dump();
			// echo "</pre>";
			// exit();

			$upUser = new Usuarios();
			$upUser->update($id, $nome, $cpf, $login, $senha, $email, $telefone, $nivel);

			if ($id > 0) {
				$data = array(
					'type' => 'success',
					'msg' => 'Usuário editado com sucesso!'
				);
				$data = http_build_query($data);
				header('Location: ' . BASE_URL . 'usuarios/editar/' . $id . '?' . $data);
				exit;
			} else {
				$data = array(
					'type' => 'danger',
					'msg' => 'Ocorreu um erro.'
				);
				$data = http_build_query($data);
				header('Location: ' . BASE_URL . 'usuarios/editar/' . $id . '?' . $data);
				exit;
			}
		}

		if (!empty($_GET['msg'])) {
			$dados['error']['msg'] = $_GET['msg'];
			$dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
		}

		$usuario = new Usuarios();
		$dados['usuario'] = $usuario->usuario($id);

		$this->loadTemplate('usuarios/update', $dados);
	}

	public function del($id)
	{
		if (!empty($id)) {

			$del = new Usuarios();
			$del->removerUsuario($id);

			$data = array(
				'type' => 'success',
				'msg' => 'Usuário deletado com sucesso!'
			);

			$data = http_build_query($data);
			header('Location: ' . BASE_URL . 'usuarios?' . $data);
			exit;
		}
	}
}
