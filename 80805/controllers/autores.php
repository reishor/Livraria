<?php 

//INCLUINDO MODEL
require "../models/autores.php";
$autores = new autores();
$mensagem = null;

//TRIGGER - CADASTRO DE AUTORES
if (!empty($_POST['nomeAutores'])){
  $query = $autores->cadastrar($_POST['nomeAutores'], $_POST['email'], $_POST['formacao'], $_POST['foto']);

  if ($query['response']=='success') {
    header('Location: autores.php?cadastro=success');
  } else {
    header('Location: autores.php?cadastro=false');
  }

}
//TRIGGER - CADASTRO DE AUTORES

//AO CARREGAR PAGINA
$buscarAutores = $autores->listarAutores();
$selectAutores = $autores->selectAutores();
if(isset($_GET["id"])){
  $buscarAutorId = $autores->buscarAutor($_GET["id"]);
  $livros = $autores->buscarLivrosDoAutor($_GET["id"]);
}
//AO CARREGAR PAGINA

?>