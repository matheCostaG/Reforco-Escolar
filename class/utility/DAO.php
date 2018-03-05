<?php 
	namespace app\DAO;
	use app\Container\Container;

	class DAO extends Container{

		private $table;
		private $colunas;
		private $dados;


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
			return $this->getColunas();

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

			$sql = "INSERT INTO ".$this->getTable()."(".$campos.") VALUES(".$values.");";;
			$stmt = $this->db->prepare($sql);
			for($i=1; $i <= count($dados); $i++){
				$stmt->bindParam($bindParamArray[$i], $dados[$i]);
			}
			
			if($stmt->execute()){
				return "deu certo";
			}else{
				return "deu não";
			}
			
		}

	}