<?php
	namespace app\userController;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use app\Container\Container;
	use app\Model\UserModel;

	class UserController extends Container{
		public function cadastrar(Request $request, Response $response,array $args){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$dados = array ();
				$c = 0;
				foreach ($_POST as $key => $value) {
					$c++;
					$dados[$c] = $key = filter_input(INPUT_POST, $key);
				}
				$dados[5] = 1;
				$cadastro = new UserModel($this->container);
				$incert = $cadastro->cadastrar($dados);
				if($incert != ''){
					return $response->withStatus(302)->withHeader('Location', '/index');
					
				}
				
			}
			return $this->view->render($response, 'cadastro.twig');
		}

		public function logar(Request $request, Response $response, array $args){

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$dados = array ();
				$c = 0;
				foreach ($_POST as $key => $value) {
					$c++;
					$dados[$c] = $key = filter_input(INPUT_POST, $key);
				}
				return json_encode($dados);
			
			
			//$login = new UserModel($this->container);
			//$logar = $login->logar();
			//return json_encode($logar);
			}
			return $this->view->render($response, 'login.twig');
		}
		
	}
