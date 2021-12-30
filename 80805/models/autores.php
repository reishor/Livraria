<?php

class autores{

    //SELECT
    static function listarAutores(){

        require '../database/database.php';

        $records = $conn->prepare("SELECT id, nome, email FROM autores");
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function selectAutores(){

        require '../database/database.php';

        $records = $conn->prepare("SELECT id, nome FROM autores");
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function buscarAutor($id){

        require '../database/database.php';

        $records = $conn->prepare("SELECT * FROM autores WHERE id = :ID");
        $records->bindParam(':ID', $id);
        $records->execute();
        $results = $records->fetch(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function buscarLivrosDoAutor($id){

        require '../database/database.php';

        $records = $conn->prepare("SELECT titulo FROM vw_vinculo WHERE idAutor = :ID");
        $records->bindParam(':ID', $id);
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //INSERT
    static function cadastrar($nome, $email, $formacao, $foto){

        require '../database/database.php';

        $stmt = $conn->prepare("INSERT INTO autores (nome, email, formacao, foto) VALUES(:P1, :P2, :P3, :P4)");
        $stmt->bindParam(':P1', $nome);
        $stmt->bindParam(':P2', $email);
        $stmt->bindParam(':P3', $formacao);
        $stmt->bindParam(':P4', $foto);

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

