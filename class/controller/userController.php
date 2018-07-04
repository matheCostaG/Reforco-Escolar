<?php
	namespace app\userController;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use app\Container\Container;
	use app\Model\UserModel;

	class UserController extends Container{
		public function cadastrar(Request $request, Response $response,array $args){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$nome_completo = filter_input(INPUT_POST, 'nome');
				$email = filter_input(INPUT_POST, 'email');
				$usuario = filter_input(INPUT_POST, 'usuario');
				$tipo_usuario = filter_input(INPUT_POST, 'tipo');
				$senha = filter_input(INPUT_POST, 'senha');

				$cadastro = new UserModel($this->container);
				$cadastrar = $cadastro->cadastrar($nome_completo, $email, $usuario, $tipo_usuario, $senha);
				if($cadastrar == true){
					return $response->withStatus(302)->withHeader('Location', '/index');
				}
			}
			return $this->view->render($response, 'cadastro.twig');
		}

		public function logar(Request $request, Response $response, array $args){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$usuario = filter_input( INPUT_POST, 'usuario');
				$senha = filter_input(INPUT_POST, 'senha');
			$logar = new UserModel($this->container);
			$login = $logar->logar($usuario, $senha);
			return $this->view->render($response, 'index2.twig');
			}
			return $this->view->render($response, 'login.twig');
		}
		
	}
