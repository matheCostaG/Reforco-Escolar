<?php 
	namespace app\DAO;
	use app\Container\Container;

	class DAO extends Container{

		public function delete($tabela, $campo, $valor){
			$sql = "DELETE FROM ".$tabela." WHERE ".$campo." = '".$valor."'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
		}

		public function select($select = ' * ',$campo = null, $valor  = null){
			$sqlSelect = "SELECT ".$select." FROM "." WHERE ".$campo." = '".$valor."'";
			$stmt = $this->db->prepare($sqlSelect);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
			
		}

		public function insert($tabela, $campos, array $dados){
			//$values = implode(',', $dados);


			die();
			$sqlInsert = "INSERT INTO ".$tabela."(".$campos.") VALUES(".$values.");";
			$stmt = $this->db->prepare($sqlInsert);
			if($stmt->execute()){
				return 'Tudo certo';
			}else{
				return 'Tudo errado';
			}
			
			$bindParamArray = array();
			for($i=1; $i <= count($dados); $i++){
				$bindParamStr = $bindParamStr.':DADO'.$i;
				$bindParamArray[$i] = $bindParamStr;
				$bindParamStr = '';

			}
			
			$values = implode(', ', $bindParamArray);
			
			$stmt = $this->db->prepare($sqlInsert);
			for($i=1; $i <= count($dados); $i++){
				$stmt->bindParam($bindParamArray[$i], $dados[$i]);
			}
			
				return $stmt->execute();
			
			
		}
		

	}