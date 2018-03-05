<?php
	namespace app\appController;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use app\Container\Container;

	class AppController extends Container{
		public function index(Request $request, Response $response,array $args){
			return $this->view->render($response, "index.twig");
			
			
		}
		public function login(Request $request, Response $response,array $args){
			return $this->view->render($response, "login.twig");
		}
		public function cadastro(Request $request, Response $response,array $args){
			return $this->view->render($response, "cadastro.twig");
		}
		public function cadastroQuestao(Request $request, Response $response,array $args){
			return $this->view->render($response, "cad-pergunta.twig");
		}
	}