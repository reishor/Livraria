<?php

class livros{

    //SELECT
    static function listarLivros(){

        require '../database/database.php';
     
        $records = $conn->prepare("SELECT id, titulo, ano FROM livros");
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function selectLivros(){

        require '../database/database.php';

        $records = $conn->prepare("SELECT id, titulo FROM livros");
        $records->execute();
        $results = $records->fetchAll(\PDO::FETCH_ASSOC);
        return $results;

    }

    //SELECT
    static function buscarLivro($id){

        require '../database/database.php';

        $records = $conn->prepare("SELECT * FROM livros WHERE id = :ID");
        $records->bindParam(':ID', $id);
        $records->execute();
        $results = $records->fetch(\PDO::FETCH_ASSOC);
        return $results;

    }

    //INSERT
    static function cadastrar($request){

        require '../database/database.php';

        $stmt = $conn->prepare("INSERT INTO livros (titulo, totalPaginas, edicao, isbn, ano, fotoCapa, idEditora) VALUES(:TITULO, :PAG, :EDICAO, :ISBN, :ANO, :CAPA, :EDITORA)");
        $stmt->bindParam(':TITULO', $request['titulo']);
        $stmt->bindParam(':PAG', $request['totalPaginas']);
        $stmt->bindParam(':EDICAO', $request['edicao']);
        $stmt->bindParam(':ISBN', $request['isbn']);
        $stmt->bindParam(':ANO', $request['ano']);
        $stmt->bindParam(':CAPA', $request['fotoCapa']);
        $stmt->bindParam(':EDITORA', $request['idEditora']);
        
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

    //DELETE
    static function deletar($id){

        require '../database/database.php';

        $sql = "DELETE FROM livros WHERE id = :REMOVER";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":REMOVER", $id);
        if ($stmt->execute()) {
            $success = [
                "response" => "success"
            ];
            return $success;
        } else {
            $error = $stmt->errorInfo();
            $error = $error[2];
            return $error;
        }

    }

    //UPDATE
    static function atualizar($request){

        require '../database/database.php';

        $stmt = $conn->prepare("UPDATE livros SET nome = :NOME WHERE id = :ID");
        $stmt->bindParam(":ID", $request['id_usuario']);
        $stmt->bindParam(":NOME", $request['nome']);

        if ($stmt->execute()) {
            $success = [
                "response" => "success"
            ];
            return $success;
        } else {
            $error = $stmt->errorInfo();
            $error = $error[2];
            return $error;
        }

    }

}

