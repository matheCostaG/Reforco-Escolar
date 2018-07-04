<?php
	namespace app\Usuario;
	Class Usario {
		private $nome_completo;
		private $nome_usuario;
		private $email;
		private $senha;
		private $data_ultimo_login;
		private $data_cadastro;
		private $tipo_usario;
		private $img_perfil;
		private $bloqueado;

		public function getNome_completo(){
			return $this->$nome_completo;
		}
		public function setNome_completo($nome_completo){
			$nome_completo = $this->nome_completo;
		}
		public function getNome_usuario(){
			return $this->nome_usuario;
		}
		public function setNome_usuario($nome_usuario){
			$nome_usuario = $this->nome_usuario;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$email = $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$senha = $this->senha;
		}
		public function getData_ultimo_login(){
			return $this->data_ultimo_login;
		}
		public function setData_ultimo_login($data_ultimo_login){
			$data_ultimo_login = this->data_ultimo_login;
		}
		public function getData_cadastro(){
			return $this->data_cadatro
		}
		public function setData_cadastro($data_cadatro){
			$data_cadatro = $this->data_cadatro
		}
		public function getTipo_usario(){
			return $this->tipo_usario;
		}
		public function setTipo_usario($tipo_usario){
			$tipo_usario = $this->tipo_usario;
		}
	
		public function getImg_perfil(){
			return $this->img_perfil;
		}
		public function setImg_perfil($img_perfil){
			$img_perfil = $this->img_perfil;
		}
		public function getBloqueado(){
			return $this->bloqueado;
		}
		public function setBloqueado($bloqueado){
			$bloqueado = $this->bloqueado;
		}
		public function logarUsuario(){
			
		}
	} 