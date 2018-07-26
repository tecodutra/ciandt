<?php
    class SelectField {
        public $id;
        public $nome;
        public $opcoes;
        public $selecionado;

        function ___construct ($id, $nome) {
            $this->id = $id;
            $this->nome = $nome;
            $this->opcoes = array();
        }

        function adicionarOpcao($valor, $texto) {
            $this->opcoes[$valor] = $texto;
        }

        function adicionarOpcoes($opcoes) {
            foreach ($opcoes as $valor => $texto) {
                $this->opcoes[$valor] = $texto;
            }
        }

        function removerOpcao($valor) {
            if (array_key_exists($valor, $this->opcoes)) {
                unset($this->opcoes[$valor]);
            }
        }

        function selecionarOpcao($valor) {
            if (array_key_exists($valor, $this->opcoes)) {
                $this->selecionado = $valor;
            }
        }

        function imprimirOpcoes($ordenado = true) {
            if ($ordenado) {
                asort($this->opcoes);
            }

            foreach ($this->opcoes as $valor => $texto){
				echo "<option value=\"$valor\">$texto</option>";
			}
        }

        function imprimirSelect($ordenado = true) {
            echo "<select id=\"$this->id\" name=\"$this->nome\">";
			$this->imprimirOpcoes();
			echo "</select>";
        }
    }

    $select = new SelectField('cargo', 'cargo');
    $select->adicionarOpcao('AP', 'Analista Programador');
    $select->adicionarOpcao('APN', 'Analista Programador .NET');
    $select->adicionarOpcao('APA', 'Analista Programador Android');
    $select->adicionarOpcao('CS', 'Consultor de Sistemas');
    $select->adicionarOpcao('CTI', 'Consultor de Tecnologia da Informação');
    $select->adicionarOpcao('DD', 'Designer Digital');
    
    $opcoes = array(
        'A' => 'Administração',
        'DG' => 'Designer Gráfico',
        'GP' => 'Gerente de Projetos',
        'GPP' => 'Gerente de Projetos PMO',
        'GPW' => 'Gerente de Projetos Web',
        'LHP' => 'Líder de Help Desk',
        'PC' => 'Programador C',
        'PCS' => 'Programador C#',
        'PCP' => 'Programador C++',
        'WD' => 'Web Designer',
        'WV' => 'Web Developer',
        'WM' => 'Webmaster'
    );
    $select->adicionarOpcoes($opcoes);

    $select->removerOpcao('A');
    $select->removerOpcao('LHP');
?>
<html>
	<head>
        <title>Exercicio 6</title>
        <style>
            label { display: inline-block; width: 100px; }
        </style>
	</head>
	<body>
		<h3>Formulário Simples:</h3>
        <form method="post">  
            <label for="nome">Nome:</label> 
            <input type="text" id="nome" name="nome">
            <br><br>
            <label for="sobrenome">Sobrenome:</label> 
            <input type="text" id="sobrenome" name="sobrenome">
            <br><br>
            <label for="nome">E-mail:</label> 
            <input type="text" id="email" name="email" value="">
            <br><br>
            <label for="nome">Telefone:</label> 
            <input type="text" id="telefone" name="telefone" value="" placeholder="(31)99999-9999">
            <br><br>
            <label for="nome">Cargo:</label> 
            <?php $select->imprimirSelect(); ?>
            <br><br>
            <button type="submit">Enviar</button>
        </form>        
	</body>
</html>