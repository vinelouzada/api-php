<?php

class RetornaJson
{
    public static function resposta($conteudo)
    {
        header("content-type: application/json");
        echo json_encode($conteudo);
    }
}