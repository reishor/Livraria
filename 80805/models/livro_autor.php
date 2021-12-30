<?php

class livro_autor{

        //SELECT
        static function listarLivro_autor(){

            require '../database/database.php';
    
            $records = $conn->prepare("SELECT titulo, nome FROM vw_vinculo");
            $records->execute();
            $results = $records->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
    
        }

        //INSERT
        static function cadastrar($autor, $livro){

            require '../database/database.php';

            $stmt = $conn->prepare("INSERT INTO livro_autor (idAutor, idLivro) VALUES(:AUTOR, :LIVRO)");
            $stmt->bindParam(':AUTOR', $autor);
            $stmt->bindParam(':LIVRO', $livro);
            
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

