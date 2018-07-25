<?php
	/*
	 * Função que retorna se Joãozinho mordeu ou não mordeu o seu dedo, com
	 * probabilidade de 50% para ter mordido e 50% para não ter mordido
	 * 
	 * @return Verdadeiro se foi mordido e Falso se não foi mordido
	 */
	function foiMordido() {
		$mordeu = rand(1, 10);
		return $mordeu >= 6; 
	}

	$frase = '';

	if ($_POST) {
		$mordeu = foiMordido();
		$frase = 'Joãozinho NÃO mordeu o seu dedo !';

		if ($mordeu) {
			$frase = 'Joãozinho mordeu o seu dedo !';
		}
	}
?>
<html>
	<head>
		<style>
			button {
				margin-bottom: 10px;
			    font-size: 14px;
			    background: #b6d5ff;
			    border: 1px solid #ffffff;
			}
			input {
				width: 300px;
			    border: 1px solid #ccc;
			    font-size: 14px;
			    text-align: center;
			    border-radius: 2px;
			    padding: 5px;
			}
		</style>
	</head>
	<body>
		<div style="margin: 50px auto;text-align: center;">
			<h3>Joaozinho mordeu meu dedo?</h3>
			<form method="POST">
				<button type="submit">Quero saber</button>
				<br>
				<input type="text" name="mordeu" value="<?=$frase?>" readonly="readonly">
			</form>
		</div>
	
</body></html>