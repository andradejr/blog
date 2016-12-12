<?php

require_once 'conexao.php';

      class post extends conexao{


           public function registro_post($titulo,$autor,$texto,$imagem,$fk_usuario){

                 $insert = "INSERT INTO * `postagem`(`titulo`,`autor`,`texto`,`imagem`,`fk_usuario`) VALUES ('{$titulo}','{$autor}','{$texto}','{$imagem}','{$fk_usuario}') ";
    
                 $link = parent::get_con();

                 $result = mysqli_query($link,$insert);



                 		if (!$result) {
                 			$e = array ( mysqli_error ($link), mysqli_errno ($link));
                 			mysqli_close ($link);
                 			return $e [0] . " " . $e [1];

                 		} else {

                 			mysqli_close ( $link );
                 			return "sucesso";
                 		}
           }
      }

 ?>
