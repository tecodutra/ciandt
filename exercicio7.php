<?php
    function listarTodosUsuarios($json) {
        echo json_encode($json['registros']);
    }
    
    function adicionarUsuario($json, $arquivo, $corpoRquisicao) {
        $jsonNovo = json_decode($corpoRquisicao, true);
        $json['registros'][] = $jsonNovo;
        file_put_contents($arquivo, json_encode($json));

        echo json_encode($jsonNovo);
    }

    function atualizarUsuario($json, $arquivo, $corpoRquisicao) {
        if (!empty($_GET['email'])) {
            $email = $_GET['email'];
            $chaveUsuario = buscarUsuario($json, $email);

            if ( $chaveUsuario >= 0) {
                $jsonAtualizado = json_decode($corpoRquisicao, true);
                $json['registros'][$chaveUsuario] = $jsonAtualizado;
                file_put_contents($arquivo, json_encode($json));

                echo json_encode($json['registros'][$chaveUsuario]);
            } else {
                echo 'Não existe usuário com este e-mail';
            }
        } else {
            echo 'E-mail do usuário não informado';
        }
    }

    function removerUsuario($json, $arquivo) {
        if (!empty($_GET['email'])) {
            $email = $_GET['email'];
            $chaveUsuario = buscarUsuario($json, $email);

            if ( $chaveUsuario >= 0) {
                echo json_encode($json['registros'][$chaveUsuario]);

                unset($json['registros'][$chaveUsuario]);
                file_put_contents($arquivo, json_encode($json));
            } else {
                echo 'Não existe usuário com este e-mail';
            }
        } else {
            echo 'E-mail do usuário não informado';
        }
    }

    function buscarUsuario($json, $email)
    {
        $posicao = -1;
        foreach ($json['registros'] as $chave => $registro) {
            if ($registro['email'] == $email) {
                $posicao = $chave;
                break;
            }
        }
        return $posicao;
    }

    header("Access-Control-Allow-Orgin: *");
    header("Access-Control-Allow-Methods: *");
    header('Content-type: application/json');
    $corpoRquisicao = file_get_contents('php://input');
    $arquivo = 'ex7.json';

    $metodo = $_SERVER['REQUEST_METHOD'];
    $registros = file_get_contents($arquivo);
    $json = json_decode($registros, true);

    switch ($metodo) {
        case 'GET':
            listarTodosUsuarios($json);
            break;
        case 'POST':
            adicionarUsuario($json, $arquivo, $corpoRquisicao);
            break;
        case 'PUT':
            atualizarUsuario($json, $arquivo, $corpoRquisicao);
            break;
        case 'DELETE':
            removerUsuario($json, $arquivo);
            break;
    }