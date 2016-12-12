<?php
require_once 'conexao.php';

class User extends Conexao{

//Inicio do cadastrar novo usuário no sistema
public function registra_usuario($nome, $email, $senha){

//comando SQL para dar INSERT de um novo usuário no banco de dados
$insert = "INSERT INTO `usuario`(`nome`, `email`, `senha`) VALUES ('{$nome}','{$email}','{$senha}')";

// utiliza a function get_con() de conexao.php e abre a conexao do sistema com o banco de dados
$link = parent::get_con ();

//função que vai executar o SQL da variável $insert no banco de dados conectado na variável $link
$result = mysqli_query ( $link, $insert );

		if (!$result) {//se a variável $result não obtiver sucesso após execução do mysqli_query
			//mysqli_error retorna a descrição do erro
			//mysqli_errno retorna o código de erro para a chamada de função mais recente
			$e = array ( mysqli_error ($link), mysqli_errno ($link));
			mysqli_close ($link); //Fecha a conexão de banco de dados que foi aberta
			return $e [0] . " " . $e [1]; //concatena o erro encontrado e retorna

		} else { //caso o insert seja realizado com sucesso

			mysqli_close ( $link ); //encerra-se a conexão, pois a mesma não pode permanecer aberta sem um usuário logado.
			return "sucesso"; //o registra_usuario retorna a string sucesso
		}
}
//Fim do cadastrar novo usuário no sistema

}

?>
