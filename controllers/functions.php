<?php

//inclui a classe Conexao que terá seu método utilizado neste arquivo
require_once 'conexao.php';


class Querys extends Conexao{

// Início da function que realiza a autenticação de usuário
	public static function get_autenticacao($email, $senha) {

		//Consulta SQL que vai buscar no banco de dados o registro com Email e Senha recebidos como parametros do método
    $query = "SELECT * FROM `usuario` WHERE email = '{$email}' AND senha = '{$senha}'";

		// utiliza a function get_con() de conexao.php e abre a conexao do sistema com o banco de dados
		$link = parent::get_con ();

		//função que vai executar a consulta da variável $query no banco de dados conectado na variável $link
		$result = mysqli_query ($link, $query);

    if (!$result) { //se a variável $result não obtiver sucesso após execução do mysqli_query

			//mysqli_error retorna a descrição do erro
			//mysqli_errno retorna o código de erro para a chamada de função mais recente
      $e = array ( mysqli_error ($link), mysqli_errno ($link));
      mysqli_close ($link); //Fecha a conexão de banco de dados que foi aberta
      return $e [0] . " " . $e [1]; //concatena o erro encontrado e retorna

    } else { // caso algum registro seja encontrado no banco

    $tbl = mysqli_fetch_assoc ($result); // função que retorna um array associativo que foi armazenado em $result após a consulta realizada

    if (is_null($tbl)) { //se o array retornado for vazio (nenhum usuário encontrado)
      return "error"; // a function get_autenticacao retorna a string erro

    } else if (!is_null($tbl)) { //se o o array NÃO FOR VAZIO

			// aciona-se o método set_login na class Login para abrir a sessão do usuário autenticado
      Login::set_login($tbl['id_usuario'], $tbl["nome"], $tbl["email"]); // os indices do array são passados como parâmetros
      return "sucesso"; // a function get_autenticacao retorna a string sucesso

    }
  }
}
//fim da autenticação de usuário

}




Class Login {

 // function que identifica se alguma sessão já foi iniciada
 // function importante para controlar o acesso de usuário sem sessão iniciada
  public static function is_session_started() {

  		if (php_sapi_name () !== 'cli') {
  			if (version_compare ( phpversion (), '5.4.0', '>=' )) {
  				return session_status () === PHP_SESSION_ACTIVE ? TRUE : FALSE;
  			} else {
  				return session_id () === '' ? FALSE : TRUE;
  			}
  		}
  		return FALSE;
  	}


// Definir SESSION de login do usuário
	public static function set_login($id, $nome, $email) {

		//condição para verificar se alguma sessão já foi iniciada
		if (static::is_session_started () === false) {
			session_start (); //iniciar sessão
		}

		//definie as variáveis globais da sessão com os parâmetros passados no método
		$_SESSION ['id'] = $id;
		$_SESSION ["nome"] = $nome;
		$_SESSION ["email"] = $email;

	}
// fim da function para definir SESSION


// inicio da function de logout do sistema
public static function sair(){

	session_start(); //iniciamos a sessão que foi aberta
	session_destroy(); //destruimos a sessão
	session_unset(); //limpamos as variaveis globais das sessões

	echo "<script>window.location.href='../login.php';</script>"; //redirecionamos para a tela de login

}
// fim da function de logout do sistema

}

   ?>
