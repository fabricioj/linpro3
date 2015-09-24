<?php
   $pag_header = 'Usuários';
   //include '../includes/cabecalho.php';
   
   //session_start();
   //$usuarios = isset($_SESSION['usuarios'])? $_SESSION['usuarios'] : array();   
   require_once '../usuarios/processa.php';
   $usuarios = $usuario_todos->buscar_filtros();
?>

        <div class="page-header">
            <h2><?php echo $pag_header;?></h2>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Pesquisar</div>
            <div class="panel-body">
                <form method="get" action="lista.php">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label class="control-label" for="usuario_cpf">CPF</label>
                            <input type="text" class="form-control" name="usuario_cpf" id="usuario_cpf" maxlength="11" value="<?php echo isset($_GET['usuario_cpf'])? $_GET['usuario_cpf']: '';?>">
                        </div>
                        <div class="col-sm-8 form-group">
                            <label class="control-label" for="usuario_nome">Nome</label>
                            <input type="text" class="form-control" name="usuario_nome" id="usuario_nome" value="<?php echo isset($_GET['usuario_nome'])? $_GET['usuario_nome']: '';?>">
                        </div>
                        
                    </div>

                   <button class="btn btn-primary" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>

        <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th><a href="formulario.php" class="btn btn-primary">Novo</a></th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>E-mail</th>                        
                 </tr>                                       

            </thead>
            <tbody>
                <?php 
                $i = 0;
                foreach ( $usuarios as $usuario) :
                    if ($i > 0){?>
                        <tr>
                            <td>
                                <a href="formulario.php?cpf=<?php echo $usuario['cpf'];?>" class="btn btn-primary">Editar</a>
                                <a href="processa.php?acao=excluir_usuario&cpf=<?php echo $usuario['cpf'];?>" class="btn btn-danger">Excluir</a>                        
                            </td>
                            <td><?php echo $usuario['cpf']?></td>
                            <td><?php echo $usuario['nome']?></td>
                            <td><?php echo $usuario['email']?></td>
                        </tr>
                <?php                    
                    }
                    $i++;
                endforeach; ?>

            </tbody>

        </table>


<?php include '../includes/rodape.php';?>