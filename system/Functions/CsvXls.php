<?php

/*
 * Função que retorna a box de mensagens do Ajax
 */

if (!function_exists('CsvXls')) {

	function CsvXls($array, $cabecalho = null)
	{

		$vlArray = json_decode(json_encode($array), true);
		// Gera arquivo CSV
		$fh = fopen(dirname(__DIR__, 2) . '/repository/relatorios/somefile.csv', 'w') or die('Cannot open the file');
		fwrite( $fh, $cabecalho );
		fwrite( $fh, "\n" );
		for($i=0; $i < count($vlArray); $i++){
			//Tira quebra de linha e adiciona um ponto e virgula no final.
			$limpa = preg_replace( "/\r|\n/", " ", $vlArray[$i]);
			$str = implode(';', $limpa);
			fwrite( $fh, $str );
			fwrite( $fh, "\n" );
		}

		fclose($fh);

		$nmArquivo = 'relatorio-'.date("Y-m-d H:i:s").'.xls';
		// Converte para XLS
		include(dirname(__DIR__, 2) . "/system/Library/PHPExcel/PHPExcel/IOFactory.php");
		$objReader = PHPExcel_IOFactory::createReader('CSV');
		$objReader->setDelimiter(";"); // define que a separação dos dados é feita por ponto e vírgula
		$objReader->setInputEncoding('UTF-8'); // habilita os caracteres latinos.
		$objPHPExcel = $objReader->load(dirname(__DIR__, 2) . '/repository/relatorios/somefile.csv'); //indica qual o arquivo CSV que será convertido
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="relatorio.xls"');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output'); //Faz donwload

	}
}
