<?php 
   $pag_header = 'Usuário';
   //include '../includes/cabecalho.php';
   
   //session_start();
   
   //$usuario = $_SESSION['usuarios'][$cpf];
   
   require_once '../usuarios/processa.php';
   
   $cpf = $_GET['cpf'];
   if (isset($cpf)){        
        $usuario = $usuario_todos->buscar_usuario($cpf);   
   }
?>     
<div class="page-header">
    <h2><?php echo $pag_header;?></h2>
</div>
<div class="jumbotron">
    
    <form action="processa.php?acao=salvar<?php echo !isset($cpf)? "": "&cpf={$usuario['cpf']}";?>" method="post">
        <div class="row">
            <div class="col-sm-7 form-group">
                <label class="control-label" for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $usuario['email'];?>">
            </div>
           <div class="col-sm-5 form-group">
               <label class="control-label" for="senha">Senha</label>
               <input type="text" class="form-control" name="senha" id="senha" value="<?php echo $usuario['senha'];?>">
           </div>
        </div>
        <div class="row">
            <div class="col-sm-8 form-group">
                <label class="control-label" for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario['nome'];?>">
            </div>
            <div class="col-sm-4 form-group">
                <label class="control-label" for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" maxlength="11" value="<?php echo $usuario['cpf'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 form-group">
                <label class="control-label" for="endereco">Endereço</label>
                <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $usuario['endereco'];?>">
            </div>
             <div class="col-sm-3 form-group">
                 <label class="control-label" for="numero">Número</label>
                 <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $usuario['numero'];?>">
             </div>
        </div>
        <div class="row">
            <div class="col-sm-8 form-group">
                <label class="control-label" for="bairro">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $usuario['bairro'];?>">
            </div>

            <div class="col-sm-4 form-group">
               <label class="control-label" for="cep">Cep</label>
               <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $usuario['cep'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 form-group">
                <label class="control-label" for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $usuario['cidade'];?>">
            </div>
            <div class="col-sm-3 form-group">
                <label class="control-label" for="uf">UF</label>
                <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $usuario['uf'];?>">
            </div>
        </div>

       <button class="btn btn-primary" type="submit">Enviar</button>
   </form>
</div>
<?php
   include '../includes/rodape.php';
?>