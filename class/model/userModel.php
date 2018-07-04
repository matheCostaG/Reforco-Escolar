<?php
	namespace app\Model;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use app\Container\Container;

	class UserModel extends Container{
		public function cadastrar($nome_completo, $email, $usuario, $tipo_usuario, $senha){
			$sql = "INSERT INTO usuario(nome_completo, email, nome_usuario, tipo_usuario, senha) VALUES('".$nome_completo."','".$email."','".$usuario."',".$tipo_usuario.",'".$senha."');";
			$stmt = $this->db->prepare($sql);
			if($stmt->execute()){
				return true;
			}

		}
		public function logar($usuario, $senha){
		$sql = "SELECT * FROM usuario where nome_usuario = :usuario and senha = :senha";
		
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(':usuario', $usuario);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;	
		}
	}