<?php
	namespace app\appController;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use app\Container\Container;

	class AppController extends Container{
		public function paginaIncial(Request $request, Response $response,array $args){
			return $this->view->render($response, "index.twig");
		}
		public function paginaIncialUsuario(Request $request, Response $response, array $args){
			return $this->view->render($response, "indexUsuario.twig");
		}
		
		public function cadastroQuestao(Request $request, Response $response,array $args){
			return $this->view->render($response, "cad-pergunta.twig");
		}
		
	}