<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style type="text/css">
            .row{
                margin-left: 0px;
                margin-right: 0px;
            }
            
        </style>
        <title>Formulário</title>
    </head>
    <body>
        <form method="post" action="processa_formulario.php">
            <div class="row">
                <div class="form-group">
                    <label class="control-label" for="usuario">Usuário</label>
                    <input class="form-control" type="text" name="usuario" id="usuario">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="control-label" for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha">
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary" type="submit">Enviar</button>
                
            </div>
        </form>
    </body>
</html>
