<?php

class UsuarioRepositorio
{
    private PDO $conexao;
    private int $limiteDeDadosPorPagina = 2;



    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function buscarTodosUsuarios():array
    {
        $sql = "SELECT * FROM usuarios";
        $instrucao = $this->conexao->query($sql);

        return $instrucao->fetchAll();
    }

    public function buscarUsuariosPorPagina(int $paginaAtual):array
    {
        $limiteDeUsuariosPorPagina = $this->limiteDeDadosPorPagina;
        $inicioPagina = ($paginaAtual * $limiteDeUsuariosPorPagina) - $limiteDeUsuariosPorPagina;

        $sql = "SELECT * FROM usuarios LIMIT :inicio, :limite";
        $instrucao = $this->conexao->prepare($sql);
        $instrucao->bindValue(":inicio", $inicioPagina);
        $instrucao->bindValue(":limite", $limiteDeUsuariosPorPagina);
        $instrucao->execute();

        return $instrucao->fetchAll();
    }

    public function  buscarUsuariosPorGrupo(string $grupo):array
    {
        $sql = "SELECT * FROM usuarios WHERE grupo = :grupo;";
        $instrucao = $this->conexao->prepare($sql);
        $instrucao->bindValue(':grupo', $grupo);
        $instrucao->execute();

        $usuariosFiltradosPorGrupo = $instrucao->fetchAll();

        if (empty($usuariosFiltradosPorGrupo)){
            return [
                "mensagem" => "Nenhum usuário encontrado para este grupo"
            ];
        }

        return $usuariosFiltradosPorGrupo;
    }


}