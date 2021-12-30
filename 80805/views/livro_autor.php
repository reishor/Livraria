<?php

    require "../controllers/livro_autor.php";
    require "../controllers/autores.php";
    require "../controllers/livros.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Trabalho de faculdade - Programação II" />
        <meta name="author" content="Hugo Reis" />
        <title>Livraria</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../public/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../public/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand text-white"><a href="../index.php">Livraria</a></li>
                <li class="sidebar-nav-item"><a href="editoras.php">Editoras</a></li>
                <li class="sidebar-nav-item"><a href="autores.php">Autores</a></li>
                <li class="sidebar-nav-item"><a href="livros.php">Livros</a></li>
                <li class="sidebar-nav-item"><a href="livro_autor.php">Livro - Autor</a></li>
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1 text-white">Livro - Autor</h1>    
                <?php
                if(isset($_GET["cadastro"])){
                    if($_GET["cadastro"] == "success"){
                        echo "<div class='alert alert-success' role='alert'>Vínculo cadastrado com sucesso</div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Falha ao vincular</div>";
                    }
                }
                ?>     
            </div>
        </header>
        <!-- Body -->
        <div class="container">
            <h1 class="mt-5">Vincular livro e autor</h1>
            <form action="livro_autor.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Livro</label>
                    <select class="form-select" name="idLivro" id="idLivro">
                        <option value="" selected>Selecione um livro</option>
                        <?php
                        foreach($selectLivros as $livro){
                            echo "<option value='".$livro["id"]."'>".$livro["titulo"]."</option>";
                        }
                        ?>
                    </select>
                    <div id="alertaEditora"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Autores</label>
                    <select class="form-select" name="idAutor" id="idAutor">
                        <option value="" selected>Selecione um autor</option>
                        <?php
                        foreach($selectAutores as $autor){
                            echo "<option value='".$autor["id"]."'>".$autor["nome"]."</option>";
                        }
                        ?>
                    </select>
                    <div id="alertaEditora"></div>
                </div>
                <button id="enviarForm" type="submit" class="btn btn-primary">Vincular autor ao livro</button>
            </form>
        </div>
        <div class="container">
            <h1 class="mt-5 mb-3">Vínculos cadastrados</h1>
            <?php
                foreach($buscarLivroAutor as $vinculo){
                    echo "<h5>Título: ".$vinculo["titulo"]." - Nome: ".$vinculo["nome"]."</h5>";
                }
            ?>
        </div>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-4 px-lg-5">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/hugoreis11/" target="_blank"><i class="icon-social-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://www.linkedin.com/in/hugo-reis-41b558216/" target="_blank"><i class="icon-social-linkedin"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="https://github.com/reishor" target="_blank"><i class="icon-social-github"></i></a>
                    </li>
                </ul>
                <p class="text-muted small mb-0">Copyright &copy; Hugo Reis 2021</p>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../public/js/scripts.js"></script>
    </body>
</html>
