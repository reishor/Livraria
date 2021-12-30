<?php 

//INCLUINDO MODEL
require "../models/livro_autor.php";
$livro_autor = new livro_autor();
$mensagem = null;

//TRIGGER - CADASTRO DE VINCULO
if (!empty($_POST['idAutor'])){
    $query = $livro_autor->cadastrar($_POST['idAutor'], $_POST['idLivro']);
  
    if ($query['response']=='success') {
      header('Location: livro_autor.php?cadastro=success');
    } else {
      header('Location: livro_autor.php?cadastro=false');
    }
  
  }
  //TRIGGER - CADASTRO DE VINCULO

//AO CARREGAR PAGINA
$buscarLivroAutor = $livro_autor->listarLivro_autor();
//AO CARREGAR PAGINA

?>