<?php
	namespace app\Model;
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use app\Container\Container;

	class UserModel extends Container{
		public function cadastrar($dados){
			$this->dao->tabela('usuario');
			$tabela = $this->dao->insert($dados);
			return $tabela;
			
			




die();
			$sql = "INSERT INTO usuario(nome_completo, nome_usuario, email, senha, tipo_usuario) values (:1, :2, :3, :4, :5)";
			$stmt = $this->db->prepare($sql);
			//return $dados;
			for ($i=1; $i <= 5; $i++) { 
				//echo ':'.$i.'<br>';
				//echo $dados[$i]."<br>";
				$stmt->bindParam(':'.$i, $dados[$i]);
			}
			//die();
			
			
			//$stmt->bindParam(':usuario', $usuario);
			//$stmt->bindParam(':email', $email);
			//$stmt->bindParam(':senha', $senha);
			//$stmt->bindParam(':tipo', $tipo);


			//$stmt->execute();
			//die();
			if($stmt->execute()){
				return "deu";
			}else{
				return 'deu n';
			}
		}
	}