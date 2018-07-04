$(document).ready(function(){

	$('#btn-cad').click(function(){
		var senha;
		var confSenha;

		senha = $('#senha').val();
		confSenha = $('#confSenha').val();
		if(senha != confSenha){
			alert('As senhas não são iguais');
		}
	});
});