<?php

/*
* Função que retorna a box de mensagens do Ajax
*/

if (!function_exists('ValidateRead')) {

	function LerRespostas($nome)
	{
		$handle = fopen('repository/arquivos/'.$nome, "r");
		if ($handle) {
			$linha = 0;
			$registros = 0;
			while (!feof($handle)) {
				$row = fgets($handle);
				if ($linha > 0) {
					$coluna = explode("|", $row);
					$coluna0 = utf8_encode($coluna[0]);
					$coluna1 = utf8_encode($coluna[1]);
					$coluna2 = utf8_encode($coluna[2]);
					$coluna3 = utf8_encode($coluna[3]);
					 if ($coluna0 != "") {
						 $respostas = new Respostas;
						 $query = "INSERT INTO cadrespostas (idSetor, nmPonto, nome, apelido, texto) VALUES ('".Session::get('selectProj')['id']."','".$coluna0."','".$coluna1."','".$coluna2."','".$coluna3."')";
						 $inserir = $respostas->fullQuery($query);
						 $registros++;
					 }
				}
				$linha++;
			}

			fclose($handle);
		}
		
		/* Apaga o arquivo */
		limparArquivo($nome);
		return "OK";
	}

	function limparArquivo($nmArquivo)
	{
		unlink('repository/arquivos/'.$nmArquivo);
	}
	
}
