<?php

require "src/Banco de Dados/CriadorDeConexao.php";
require "src/UsuarioRepositorio.php";
require "src/RetornaJson.php";


$conexaoPDO = CriadorDeConexao::criarConexao();
$repositorioDeUsuario = new UsuarioRepositorio($conexaoPDO);

$url = $_SERVER['REQUEST_URI'];

if (str_contains($url, "?")){
    $urlSeparada = explode("=", $url);
    $url = $urlSeparada[0];
    $stringDeBusca = $urlSeparada[1];
}



switch ($url){
    case "/":

        RetornaJson::resposta(
            [
                "mensagem" => "API do Nicholas"
            ]
        );

        break;

    case "/usuarios":
        $usuarios = $repositorioDeUsuario->buscarTodosUsuarios();
        RetornaJson::resposta($usuarios);

        break;

    case "/usuarios?grupo":
        $usuariosFiltradosPorGrupo = $repositorioDeUsuario->buscarUsuariosPorGrupo($stringDeBusca);

        RetornaJson::resposta($usuariosFiltradosPorGrupo);
        break;

    case "/usuarios?pagina":
        $usuariosPorPagina = $repositorioDeUsuario->buscarUsuariosPorPagina($stringDeBusca);

        if (empty($usuariosPorPagina)){
            RetornaJson::resposta(
                [
                    "mensagem" => "Não existem usuários nesta página"
                ]
            );

            break;
        }

        RetornaJson::resposta($usuariosPorPagina);
        break;

    default:
        RetornaJson::resposta(
            [
                "mensagem" => "Nenhuma rota encontrada"
            ]
        );
        break;
}
