<?php
	header('Content-Type: text/html; charset=utf-8');
	
	/**
	 * Verifica se o arquivo XML informado é válido
	 * 
     * @param string $arquivoXml Caminho para o arquivo XML
     * @param string $versao Versão do XML
     * @param string $codificacao Codificação do XML
     * @return bool
     */
    function eArquivoXmlValido($xmlArquivo, $versao = '1.0', $codificacao = 'utf-8')
    {
		$xmlConteudo = file_get_contents($xmlArquivo);
		
		if (trim($xmlConteudo) == '') {
            return false;
        }

        libxml_use_internal_errors(true);

        $doc = new DOMDocument($versao, $codificacao);
        $doc->loadXML($xmlConteudo);

        $erros = libxml_get_errors();
        libxml_clear_errors();
		
        return empty($erros);
    }

	/**
     * Converte todo conteúdo XML para CSV
     * 
     * @param string $xml Conteúdo do XML
     * @param string $csvArquivo Caminho para o arquivo CSV
     */
	function converteXmlParaCsv($xml, $csvArquivo) {
		foreach ($xml->children() as $item) {
           $temSubitem = (count($item->children()) > 0);

			if ($temSubitem) {
				converteXmlParaCsv($item, $csvArquivo);
			} else {
				$arrItem = array($item->getName(), $item); 
				fputcsv($csvArquivo, $arrItem , ';', '"');
			}
		}
	}

	// Variável que guarda feedback para o usuário
	$resposta = '';

	// Verifica se existe arquivo de upload
	if (isset($_FILES) && !empty($_FILES)) {
		try {
			$xmlArquivo = $_FILES['arquivo']['tmp_name'];
			$xmlNome = $_FILES['arquivo']['name'];

			// Verifica se o arquivo de upload existe
			if (file_exists($xmlArquivo)) {
				// Varifica se o arquivo tem extensão XML
				if (strtolower(pathinfo($xmlNome, PATHINFO_EXTENSION)) == 'xml') {
					// Verifica se o arquivo XML é válido
					if (eArquivoXmlValido($xmlArquivo)) {
						// Obtém conteúdo XML
						$xml = simplexml_load_file($xmlArquivo);
						
						// Grava a conversão do conteúdo XML em CSV
						$arquivoCsv = fopen('ex5.csv', 'w');
						converteXmlParaCsv($xml, $arquivoCsv);
						fclose($arquivoCsv);
						
						$resposta = 'Arquivo convertido com sucesso!';
					} else {
						$resposta = 'O arquivo XML não é válido';
					}
				} else {
					$resposta = 'Somente arquivos XML são aceitos.';
				}
			} else {
				$resposta = 'Não foi possível localizar o arquivo.';
			}
		} catch(Exception $e) {
			$resposta = $e->getMessage();
		}
	}
?>
<html>
	<head>
		<title>Exercicio 5</title>
	</head>
	<body>
		<div style="margin-bottom: 15px;">
			<?php echo $resposta; ?>
		</div>
		<h3>Converta XML para CSV:</h3>
		<form method="post" enctype="multipart/form-data">
			<input type="file" id="arquivo" name="arquivo" accept="application/xml">
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>