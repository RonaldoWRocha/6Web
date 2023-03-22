<?php
	 ini_set('default_charset', 'UTF-8');
	 ini_set('display_errors', 0);
	 error_reporting(0);
	 // Pasta onde o arquivo vai ser salvo
	 $_UP['pasta'] = 'site/Views/app/temporary/';
	 
	 // Tamanho máximo do arquivo (em Bytes)
	 $_UP['tamanho'] = 1024 * 1024 * 500; // 40Mb
	 // Array com as extensões permitidas
	 $_UP['extensoes'] = array('txt', 'csv');
	 
	 // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
	 $_UP['renomeia'] = false;
	 
	 // Array com os tipos de erros de upload do PHP
	 $_UP['erros'][0] = 'Não houve erro';
	 $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
	 $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
	 $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	 $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	 
	 // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
	 if ($_FILES['arquivo']['error'] != 0) {
		 die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
		 exit; // Para a execução do script
	 }
	 
	 // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
	 // Faz a verificação da extensão do arquivo
	 $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	 if (array_search($extensao, $_UP['extensoes']) === false) {
		 echo "Por favor, envie arquivos com as seguintes extensões: .csv ou .txt";
		 exit;
	 }
	 
	 // Faz a verificação do tamanho do arquivo
	 if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
		 echo "O arquivo enviado é muito grande, envie arquivos de até 40Mb.";
		 exit;
	 }
	 
	 // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
	 // Primeiro verifica se deve trocar o nome do arquivo
	 if ($_UP['renomeia'] == true) {
		 // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
		 $nome_final = md5(time()) . '.jpg';
	 } else {
		 // Mantém o nome original do arquivo
		 $nome_final = $_FILES['arquivo']['name'];
	 }
	 
	 // Depois verifica se é possível mover o arquivo para a pasta escolhida
	 if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
		 $ar = $_UP['pasta'] . $nome_final;
		 if (file_exists($ar) == FALSE) { //arquivo existe em Input
			 echo "Não encontrei o arquivo " . $ar;
		 } else {
			 ini_set('max_executation_time', 0);
			 include $database;
			 
			 $query = "DELETE FROM `cadRespostas` WHERE `idSetor` = '" . $_SESSION['configProjeto'] . "'";
			 $exec = dbExecute($query, "con");
						 
			 $fopen = fopen($ar, "r");
			 $linha = 0;
			 $registros = 0;
			 $arrCruz = array();
			 $vdia;
			 while (!feof($fopen)) {
				 $row = fgets($fopen);
				 if ($linha > 0) {
					 $coluna = explode(";", $row);
					 $ponto = $coluna[0];
					 $nome = $coluna[1];
					 $apelido = $coluna[2];
					 $texto = utf8_encode($coluna[3]);
					 if ($ponto != "") {
						 $query = "INSERT INTO `cadRespostas` (`idSetor`, `nmPonto`, `nome`,`apelido`, `texto`) VALUES ('" . $_SESSION['configProjeto'] . "','" . $ponto . "', '" . $nome . "', '" . $apelido . "', '" . $texto . "')";
						 $exec = dbExecute($query, "con");
						 $registros++;
					 }
				 }
				 $linha++;
			 }
			$query = "INSERT INTO `historicoupload` (`idUsuario`, `idProjeto`, `tipo`, `dataHora`) VALUES ('". $_SESSION['idUsuario'] ."', '" . $_SESSION['configProjeto'] . "', '1', '" . date("Y-m-d H:i:s") . "')";
			$exec = dbExecute($query, "con");
			header("Location: ../auditoria/AbrirConfig");
		 }
	 } else {
		 echo "Ocorreu um erro ao enviar o arquivo";
	 }
	 ?>
	