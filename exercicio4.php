<?php
    header('Content-Type: text/html; charset=utf-8');

    if (!function_exists("array_column")) {
        function array_column($array, $column_name) {
            return array_map(function($element) use($column_name) {
                return $element[$column_name];
            }, $array);
        }
    }

    /** 
     * Obtém registros do arquivo em um vetor
     * 
     * @return array Vetor de registros
    */
    function obtemRegistros() {
        // Obtem o arquivo de registro dentro de um vetor
        $arrArquivo = file('registros.txt', FILE_IGNORE_NEW_LINES);
        $arrRegistro = array();

        // Percorre todos os registros do vetor
        foreach ($arrArquivo as $linha => $registro) {
            if ($linha % 6 == 0) {
                if ($linha != 0) {
                    $arrRegistro[] = $arr;
                }

                $arr = array(); 
            }

            $arr[] = $registro;
        }

        $arrRegistro[] = $arr;

        return $arrRegistro;
    }

    /**
     * Esta função retira os espaços em branco do início e final do valor, além dos 
     * caracteres especiais em HTML
     * 
     * @return string Retorna o valor sem espaços indesejados e caracteres especiais em HTML
     */
    function ajustarValor($valor) {
        return htmlspecialchars(trim($valor));
    }
     
    /**
     * Verifica se o registro já existe comparando o valor informado com os demais valores
     * do vetor e índice informados
     * 
     * @return boolean Verdadeiro se registro já existe e Falso caso contrário
     */
    function existeRegistro($arrRegistros, $valor, $indice) {
        $arr = array_column($arrRegistros, $indice);
        $chave = array_search($valor, $arr);
        return $chave !== false;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formValido = true;
        $arrRegistros = obtemRegistros();

        if (empty($_POST["nome"])) {
            $nomeErro = "Campo nome é obrigatório";
            $formValido = false;
        } else {
            $nome = ajustarValor($_POST["nome"]);

            // Verifica se o nome possui apenas letras e espaços
            if (!preg_match("/^([a-zA-Z' ]+)$/", $nome)) {
                $nomeErro = "O nome deve conter apenas letras e espaços";
                $formValido = false;
            }
        }

        if (empty($_POST["sobrenome"])) {
            $sobrenomeErro = "Campo sobrenome é obrigatório";
            $formValido = false;
        } else {
            $sobrenome = ajustarValor($_POST["sobrenome"]);

            // Verifica se o nome possui apenas letras e espaços
            if (!preg_match("/^([a-zA-Z' ]+)$/", $sobrenome)) {
                $sobrenomeErro = "O sobrenome deve conter apenas letras e espaços";
                $formValido = false;
            }
        }

        if (empty($_POST["email"])) {
            $emailErro = "Campo e-mail é obrigatório";
            $formValido = false;
        } else {
            $email = ajustarValor($_POST["email"]);

            // Verifica se o e-mail informado é válido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErro = "Este e-mail não é válido";
                $formValido = false;
            } 
            else {
                // Verifica se o e-mail já foi utilizado
                $existe = existeRegistro($arrRegistros, $email, 2);
                if ($existe) {
                    $emailErro = "Este e-mail já foi utilizado";
                    $formValido = false;
                }
            }
        }

        if (empty($_POST["telefone"])) {
            $telefoneErro = "Campo telefone é obrigatório";
            $formValido = false;
        } else {
            $telefone = ajustarValor($_POST["telefone"]);

            // Verifica se o telefone informado é válido
            if (!preg_match("/\(\d{2}\)\d{4,5}\-?\d{4}/", $telefone)) {
                $telefoneErro = "Este telefone não é válido";
                $formValido = false;
            }
        }

        if (empty($_POST["login"])) {
            $loginErro = "Campo login é obrigatório";
            $formValido = false;
        } else {
            $login = ajustarValor($_POST["login"]);
  
            // Verifica se o login possui apenas letras e números
            if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
                $loginErro = "O login deve conter apenas letras e números";
                $formValido = false;
            } else {
                // Verifica se o login já foi utilizado
                $existeRegistro = existeRegistro($arrRegistros, $login, 4);
                if ($existeRegistro) {
                    $loginErro = "Este login já foi utilizado";
                    $formValido = false;
                }
            }
        }

        if (empty($_POST["senha"])) {
            $senhaErro = "Campo senha é obrigatório";
            $formValido = false;
        } else {
            $senha = ajustarValor($_POST["senha"]);
        }

        // Se todos os campos do formulário estão válidos
        if ($formValido) {
            $arrNovo = array(
                $nome.PHP_EOL,
                $sobrenome.PHP_EOL,
                $email.PHP_EOL,
                $telefone.PHP_EOL,
                $login.PHP_EOL,
                sha1($senha).PHP_EOL
            );

            file_put_contents('registros.txt', $arrNovo, FILE_APPEND);
        }
    }
?>
<html>
	<head>
        <style>
            .erro { color: #FF0000; }
            label { display: inline-block; width: 100px; }
            .info { margin-left: 105px; color: #898989; }
        </style>
	</head>
	<body>
		<h3>Formulário:</h3>
        <p>
            <span class="erro">* campo obrigatório</span>
        </p>
        <form method="post">  
            <label for="nome">Nome:</label> 
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
            <span class="erro">* <?php echo $nomeErro; ?></span>
            <br><br>
            <label for="nome">Sobrenome:</label> 
            <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome; ?>">
            <span class="erro">* <?php echo $sobrenomeErro; ?></span>
            <br><br>
            <label for="nome">E-mail:</label> 
            <input type="text" id="email" name="email" value="<?php echo $email; ?>">
            <span class="erro">* <?php echo $emailErro; ?></span>
            <br><br>
            <label for="nome">Telefone:</label> 
            <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" placeholder="(31)99999-9999">
            <span class="erro">* <?php echo $telefoneErro; ?></span>
            <br><br>
            <label for="nome">Login:</label> 
            <input type="text" id="login" name="login" value="<?php echo $login; ?>">
            <span class="erro">* <?php echo $loginErro; ?></span>
            <br>
            <span class="info">(Somente letras e números)</span>
            <br><br>
            <label for="nome">Senha:</label> 
            <input type="password" id="senha" name="senha" value="<?php echo $senha; ?>">
            <span class="erro">* <?php echo $senhaErro; ?></span>
            <br><br>
            <button type="submit">Enviar</button>
        </form>        
	</body>
</html>