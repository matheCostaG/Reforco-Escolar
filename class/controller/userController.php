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
				$data = $cadastro->cadastrar($dados);
				return json_encode($data);
				
			}else{
				echo "<script>alert('deu não');</script>";
			}
			return $this->view->render($response, 'cadastro.twig');
		}
	}