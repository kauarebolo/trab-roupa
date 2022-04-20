<html>
<title>Roupas online</title>
    <head>
    <meta charset="UTF-8">
    <meta http- equiv="X-UA-Compatible" content="IE=dege">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo.css">
    </head>  
    <body>

      <!--Cabeçalho  -->
      <main>
        <header>
            <div class="mascara">
                <h1> <strong>MARCAS DE ROUPA</strong></h1>
            </div>
        </header>
    <!--Portifólho-->
    <section class="portifolio">
        <div class="container">
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                        </svg>&nbsp;&nbsp;<b><center>Cadastro de Clientes</center></b></h4>
                </div>
                <div class="card-body text-start">
                    <form action="index.php" method="POST">
                        <label class="form-label">Nome</label><br />
                        <input type="text" name="nome" class="form-control" placeholder="Digite o seu nome" required /><br />
                        <label class="form-label">telefone</label><br />
                        <input type="text" name="telefone" class="form-control" placeholder="Digite a seu telefone" required /><br />
                        <button type="submit" class="btn btn-outline-secondary" name="btgravar">Gravar</button>
                    </form>

                    <?php
                    if (isset($_POST['btgravar'])) {
                        $nome = $_POST['nome'];
                        $telefone = $_POST['telefone'];
                        $arquivo = 'dados.txt';
                        $texto = $nome . ";" . $telefone. ";";
                        $file = fopen($arquivo, 'a');
                        fwrite($file, $texto);
                        fclose($file);
                    } else {
                        echo "";
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>&nbsp;&nbsp;<b>Pesquisa</b></h4>
                </div>
                <div class="card-body text-start">
                    <form action="pesquisa.php" method="POST">
                        <label class="form-label">Nome</label><br />
                        <input type="text" name="pesquisa" class="form-control" placeholder="Digite um nome para pesquisar" required /><br />
                        <button type="submit" class="btn btn-outline-secondary" name="btgravar">Pesquisar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br />
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">&nbsp;&nbsp;<b>Dados dos Clientes</b></h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $arquivo = fopen("dados.txt", "r");
                            while (!feof($arquivo)) {
                                $linha = fgets($arquivo);
                            }
                            $dados = explode(";", $linha);
                            fclose($arquivo);
                            echo '<br/><br/>';
                            $conta = count($dados) - 2;
                            for ($i = 0; $i <= $conta; $i++) {
                                $posicao = $i;
                                echo '<tr>';
                                echo '<td>' . $dados[$i] . '</td>';
                                $i++;
                                echo '<td>' . $dados[$i] . '</td>';
                                echo '<td><a href="editar.php?pos=' . $posicao . '">Editar</a> | <a href="excluir.php?pos=' . $posicao . '">Excluir</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br />
        <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <?php
             
            ?>
        </head>
    </body>
</html>