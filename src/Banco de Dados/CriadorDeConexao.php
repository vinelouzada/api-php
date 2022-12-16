<?php

class CriadorDeConexao
{
    public static function criarConexao(): PDO
    {
        $conexao = new PDO("sqlite:src/Banco de Dados/banco.sqlite");
        $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conexao;
    }
}