<?php
	//phpinfo();
	$arr_extensao = array();
	
	if (isset($_FILES) && !empty($_FILES)) {

		foreach ($_FILES['arquivo']['name'] as $value) {
			$arr_extensao[] = pathinfo($value, PATHINFO_EXTENSION);
		}

		asort($arr_extensao);
	}
?>
<html>
	<head>
	</head>
	<body>
		<ol style="margin-bottom: 15px;">
			<?php
				foreach ($arr_extensao as $value) {
					print "<li>.$value</li>";
				}
			?>
		</ol>
		<form method="post" enctype="multipart/form-data">
			<label>Arquivo 1:</label>
			<input type="file" id="arquivo1" name="arquivo[]">
			<br>
			<label>Arquivo 2:</label>
			<input type="file" id="arquivo2" name="arquivo[]">
			<br>
			<label>Arquivo 3:</label>
			<input type="file" id="arquivo3" name="arquivo[]">
			<br>
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>