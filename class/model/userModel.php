<?php
	namespace app\Model;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use app\Container\Container;

	class UserModel extends Container{
		public function cadastrar($dados){
			$this->dao->tabela('usuario');
			$incert = $this->dao->insert($dados);
			return $incert;
		}
		public function logar(){
			$this->dao->tabela('usuario');
			$user = $this->dao->select('nome_completo');
			return $user;	
		}
	}