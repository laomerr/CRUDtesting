<?php
class Cliente
{
    private $conexao;
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    public function pesquisar($termo)
    {
        $sql = "SELECT * from pessoas WHERE nome LIKE :termo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':termo', '%' . $termo . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $endereco, $telefone, $email, $data_nascimento)
    {
        $sql = "UPDATE pessoas SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email, data_nascimento = :data_nascimento WHERE cod_pessoa = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':endereco', $endereco);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':data_nascimento', $data_nascimento);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function Salvar($nome, $endereco, $telefone, $email, $data_nascimento)
    {
        $sql = "INSERT INTO pessoas (nome, endereco, telefone, email, data_nascimento) VALUES (:nome, :endereco, :telefone, :email, :data_nascimento)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':endereco', $endereco);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':data_nascimento', $data_nascimento);
        return $stmt->execute();
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM pessoas WHERE cod_pessoa = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM pessoas WHERE cod_pessoa = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
