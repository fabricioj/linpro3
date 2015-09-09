<?php 
   $pag_header = 'Usuário';
   include '../includes/cabecalho.php';
   
   session_start();
   
   $cpf = $_GET['cpf'];
   $usuario = $_SESSION['usuarios'][$cpf];
?>     
<div class="page-header">
    <h2><?php echo $pag_header;?></h2>
</div>
<div class="jumbotron">
    
   <form action="processa.php?acao=salvar" method="post">
        <div class="form-group">
            <label class="control-label" for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $usuario['email'];?>">
        </div>
       <div class="form-group">
           <label class="control-label" for="senha">Senha</label>
           <input type="text" class="form-control" name="senha" id="senha" value="<?php echo $usuario['senha'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="nome">Nome</label>
           <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario['nome'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="cpf">CPF</label>
           <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $usuario['cpf'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="endereco">Endereço</label>
           <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $usuario['endereco'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="numero">Número</label>
           <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $usuario['numero'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="bairro">Bairro</label>
           <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $usuario['bairro'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="cidade">Cidade</label>
           <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $usuario['cidade'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="cep">Cep</label>
           <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $usuario['cep'];?>">
       </div>
       <div class="form-group">
           <label class="control-label" for="uf">Uf</label>
           <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $usuario['uf'];?>">
       </div>

       <button class="btn btn-primary" type="submit">Enviar</button>
   </form>
</div>
<?php
   include '../includes/rodape.php';
?>