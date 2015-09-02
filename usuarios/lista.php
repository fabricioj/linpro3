<?php
session_start();
$usuarios = $_SESSION['usuarios'];



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página de Formulário</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Cadastro de Usuários</h1>
            </div>
            
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th>cpf</th>
                        <th>nome</th>
                        <th>e-mail</th>
                        <th><a href="formulario.php" class="btn btn-primary">Novo</a></th>
                     </tr>                                       

                </thead>
                <tbody>
                    <?php 
                    foreach ( $usuarios as $usuario) :?>
                        <tr>
                            <td><?php echo $usuario['cpf']?></td>
                            <td><?php echo $usuario['nome']?></td>
                            <td><?php echo $usuario['email']?></td>

                            <td>
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Excluir</button>                        
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
        
    </body>
</html>