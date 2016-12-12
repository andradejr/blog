<?php

header ( 'Content-Type: text/html; charset=utf-8' ); // forçando a página a alterar o charset dela.

class Conexao {

	public static function get_con() { //function que realizará a conexão do sistema com o banco de dados

		//especificações técnicas do banco de dados MySQL que será acessado pelo sistema

		$servidor = "localhost";
		$porta = 3306;
		$sockete = "";
		$usuario = "root";
		$senha = "";
		$bdnome = "blog_example";

		//instanciar uma nova conexão
		$con = new mysqli ( $servidor, $usuario, $senha, $bdnome, $porta, $sockete ) OR die ( 'Não foi possivel conectar ao servidor de banco de dados' . mysqli_connect_error () );

		//Grupo que vai definir o estilo do conjunto de caracteres utilizado no banco de dados
		mysqli_query ( $con, "SET NAMES 'utf8'" );
		mysqli_query ( $con, "SET character_set_connection='utf8'" );
		mysqli_query ( $con, "SET character_set_client='utf8'" );
		mysqli_query ( $con, "SET character_set_results='utf8'" );
		mysqli_set_charset($con, "utf8");

		return $con;
		//retornar o status da conexão
		
	}

}

?>
