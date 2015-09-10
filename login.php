<?php 
   $pag_header = 'Acesso ao sistema';
   include './includes/cabecalho.php';
?> 
    <div class="page-header">
        <h2><?php echo $pag_header;?></h2>
    </div>
    <div class="jumbotron">
        <form action="processa_login.php" method="post">            
            <div class="form-group">
                <label class="control-label" for="usuario">Usuário</label>
                <input type="text" class="form-control" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <label class="control-label" for="senha">Senha</label>
                <input type="text" class="form-control" name="senha" id="senha">
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>
 <?php 
    include './includes/rodape.php';
 ?>