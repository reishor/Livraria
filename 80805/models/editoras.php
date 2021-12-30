<?php

class editoras{

    //SELECT
    static function listarEditoras(){

        require '../database/database.php';

        $records = $conn->prepare("SELECT id, nome, cidade FROM editoras");
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function selectEditoras(){

        require '../database/database.php';

        $records = $conn->prepare("SELECT id, nome FROM editoras");
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function buscarLivrosDaEditora($id){

        require '../database/database.php';

        $records = $conn->prepare("SELECT titulo FROM livros WHERE idEditora = :ID");
        $records->bindParam(':ID', $id);
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function buscarEditora($id){

        require '../database/database.php';

        $records = $conn->prepare("SELECT * FROM editoras WHERE id = :ID");
        $records->bindParam(':ID', $id);
        $records->execute();
        $results = $records->fetch(\PDO::FETCH_ASSOC);
        return $results;

    }

    //INSERT
    static function cadastrar($nome, $endereco, $cidade, $email, $telefone){

        require '../database/database.php';

        $stmt = $conn->prepare("INSERT INTO editoras (nome, endereco, cidade, email, telefone) VALUES(:P1, :P2, :P3, :P4, :P5)");
        $stmt->bindParam(':P1', $nome);
        $stmt->bindParam(':P2', $endereco);
        $stmt->bindParam(':P3', $cidade);
        $stmt->bindParam(':P4', $email);
        $stmt->bindParam(':P5', $telefone);

        if ($stmt->execute()) {
            $success = [
                "response" => "success",
                "lastInsertId" => $conn->lastInsertId()
            ];
            return $success;
        } else {
            $error = $stmt->errorInfo();
            $error = $error[2];
            return $error;
        }

    }


}

