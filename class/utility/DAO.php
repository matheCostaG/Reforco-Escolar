<?php 
	namespace app\DAO;
	use app\Container\Container;

	class DAO extends Container{

		private $table;
		private $colunas;
		private $dados;
		private $select;
		private $campoWhere = null;
		private $valorWhere = null;


		public function setTable($table){
			$this->table = $table;
		}
		public function getTable(){
			return $this->table;
		}
		public function setColunas($colunas){
			$this->colunas = $colunas;
		}
		public function getColunas(){
			return $this->colunas;
		}
		public function setDados($dados){
			$this->dados = $dados;
		}
		public function getDados(){
			return $this->dados;
		}
	
		public function tabela($tabela){
			$this->setTable($tabela);
		
			$stmt = $this->db->query("SHOW COLUMNS FROM ".$this->getTable()." FROM syllabus");

			$result = $stmt->fetchAll();
			$colunas = array();
			$cont = 0;

			foreach ($result as $coluna => $value){
				if($result[$cont]['Extra'] != 'auto_increment'){
				$colunas[$cont] = $result[$coluna]['Field'];
				}	
				$cont++;
			}

			$this->setColunas($colunas);
		}
		public function delete($campo, $valor){
			$sql = "DELETE FROM ".$this->getTable()." WHERE ".$campo." = '".$valor."'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
		}


		public function select($select = ' * ',$campo = null, $valor  = null){
			if($campo != null && $valor != null){
				$sqlSelect = "SELECT ".$select." FROM ".$this->getTable() ." WHERE ".$campo." = '".$valor."'";
			}else{
				$sqlSelect = "SELECT ".$select." FROM ".$this->getTable();
			}
			
			$stmt = $this->db->prepare($sqlSelect);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
			
		}


		public function insert($dados){
			
			$campos = implode(', ', $this->getColunas());

			$bindParamArray = array();
			for($i=1; $i <= count($dados); $i++){
				$bindParamStr = $bindParamStr.':DADO'.$i;
				$bindParamArray[$i] = $bindParamStr;
				$bindParamStr = '';

			}
			
			$values = implode(', ', $bindParamArray);




			$sqlInsert = "INSERT INTO ".$this->getTable()."(".$campos.") VALUES(".$values.");";
			$stmt = $this->db->prepare($sqlInsert);
			for($i=1; $i <= count($dados); $i++){
				$stmt->bindParam($bindParamArray[$i], $dados[$i]);
			}
			
				return $stmt->execute();
			
			
		}
		

	}