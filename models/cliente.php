<?php
class Cliente
{
    private $conexao;
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    public function pesquisar(string $termo): array
    {
        try {
            $sql = "SELECT cod_pessoa, nome, endereco, telefone, email, data_nascimento
            from pessoas WHERE nome LIKE :termo";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':termo', '%' . $termo . '%');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return [];
        }
    }

    public function atualizar(int $id, string $nome, string $endereco, string $telefone, string $email, string $data_nascimento): bool
    {
        try {
            $sql = "UPDATE pessoas SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email, data_nascimento = :data_nascimento WHERE cod_pessoa = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':endereco', $endereco);
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':data_nascimento', $data_nascimento);
            $stmt->bindValue(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
            return false;
        }
    }

    public function Salvar(string $nome, string $endereco, string $telefone, string $email, string $data_nascimento): bool
    {
        try {
            $sql = "INSERT INTO pessoas (nome, endereco, telefone, email, data_nascimento) VALUES (:nome, :endereco, :telefone, :email, :data_nascimento)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':endereco', $endereco);
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':data_nascimento', $data_nascimento);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao salvar: " . $e->getMessage();
            return false;
        }
    }

    public function buscarPorId(int $id)
    {
        try {
            $sql = "SELECT * FROM pessoas WHERE cod_pessoa = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar por ID: " . $e->getMessage();
            return false;
        }
    }

    public function excluir(int $id): bool
    {
        try {
            $sql = "DELETE FROM pessoas WHERE cod_pessoa = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
            return false;
        }
    }
}
