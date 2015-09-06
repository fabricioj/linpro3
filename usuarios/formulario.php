<?php 
   $pag_header = 'Usuário';
   include '../includes/cabecalho.php';
   
   session_start();
   
   $cpf = $_GET['cpf'];
   $usuario = $_SESSION['usuarios'][$cpf];
?>        
<div class="jumbotron">
    <h2>Cadastro de Usuários</h2>
   <form action="processa.php?acao=salvar" method="post">
<div class="input-group">
    <label class="control-label" for="email">E-mail</label>
    <input type="text" class="form-control" name="email" id="email" value="<?php echo $usuario['email'];?>">
</div>
       
       <br>
       Senha: <input type="text" name="senha" id="senha" value="<?php echo $usuario['senha'];?>">
       <br>
       Nome: <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome'];?>">
       <br>
       CPF: <input type="text" name="cpf" id="cpf" value="<?php echo $usuario['cpf'];?>">
       <br>
       Endereço: <input type="text" name="endereco" id="endereco" value="<?php echo $usuario['endereco'];?>">
       <br>
       Número: <input type="text" name="numero" id="numero" value="<?php echo $usuario['numero'];?>">
       <br>
       Bairro: <input type="text" name="bairro" id="bairro" value="<?php echo $usuario['bairro'];?>">
       <br>
       Cidade: <input type="text" name="cidade" id="cidade" value="<?php echo $usuario['cidade'];?>">
       <br>
       Cep: <input type="text" name="cep" id="cep" value="<?php echo $usuario['cep'];?>">
       <br>
       Uf: <input type="text" name="uf" id="uf" value="<?php echo $usuario['uf'];?>">
       <br>

       <button type="submit">Enviar</button>
   </form>
</div>
<?php
   include '../includes/rodape.php';
?>