<?php 

//INCLUINDO MODEL
require "../models/editoras.php";
$editoras = new editoras();
$mensagem = null;

//TRIGGER - CADASTRO DE EDITORA
if (!empty($_POST['nomeEditora'])){
  $query = $editoras->cadastrar($_POST['nomeEditora'], $_POST['endereco'], $_POST['cidade'], $_POST['email'], $_POST['telefone']);

  if ($query['response']=='success') {
    header('Location: editoras.php?cadastro=success');
  } else {
    header('Location: editoras.php?cadastro=false');
  }
}
//TRIGGER - CADASTRO DE EDITORA

//AO CARREGAR PAGINA
$buscarEditoras = $editoras->listarEditoras();
$selectEditoras = $editoras->selectEditoras();
if(isset($_GET["id"])){
  $buscarEditoraId = $editoras->buscarEditora($_GET["id"]);
  $livros = $editoras->buscarLivrosDaEditora($_GET["id"]);
}
//AO CARREGAR PAGINA

?>