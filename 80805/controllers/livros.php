<?php 

//INCLUINDO MODEL
require "../models/livros.php";
$livros = new livros();
$mensagem = "";

//TRIGGER - BUSCAR
if (!empty($_POST['buscar'])){
  $buscar = $livros->buscar("*", $_POST['buscar']);
}
//TRIGGER - BUSCAR

//TRIGGER - INSERIR
if (!empty($_POST['titulo'])){
  $request = [
    "titulo" => $_POST['titulo'],
    "totalPaginas" => $_POST['totalPaginas'],
    "edicao" => $_POST['edicao'],
    "isbn" => $_POST['isbn'],
    "ano" => $_POST['ano'],
    "fotoCapa" => $_POST['fotoCapa'],
    "idEditora" => $_POST['idEditora'],
  ];
  $query = $livros->cadastrar($request);

  if ($query['response']=='success') {
    $mensagem = 'Livro cadastrado com sucesso';
  } else {
    $mensagem = 'Não foi possível cadastrar livro';
  }

}
//TRIGGER - INSERIR

//AO CARREGAR PAGINA
$listarLivros = $livros->listarLivros();
$selectLivros = $livros->selectLivros();
if(isset($_GET["id"])){
  $buscarLivroId = $livros->buscarLivro($_GET["id"]);
}
//AO CARREGAR PAGINA

?>