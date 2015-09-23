<?php
   $pag_header = 'Usuários';
   //include '../includes/cabecalho.php';
   
   //session_start();
   //$usuarios = isset($_SESSION['usuarios'])? $_SESSION['usuarios'] : array();   
   require_once '../usuarios/processa.php';
   $usuarios = $usuario_todos->buscar_filtros();
?>

        <div class="container">
            <div class="page-header">
                <h2><?php echo $pag_header;?></h2>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Pesquisar</div>
                <div class="panel-body">
                    <form method="get" action="lista.php">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label class="control-label" for="usuario_nome">Nome do usuário</label>
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
                    foreach ( $usuarios as $usuario) :?>
                        <tr>
                            <td>
                                <a href="formulario.php?cpf=<?php echo $usuario['cpf'];?>" class="btn btn-primary">Editar</a>
                                <a href="processa.php?acao=excluir_usuario&cpf=<?php echo $usuario['cpf'];?>" class="btn btn-danger">Excluir</a>                        
                            </td>
                            <td><?php echo $usuario['cpf']?></td>
                            <td><?php echo $usuario['nome']?></td>
                            <td><?php echo $usuario['email']?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
<?php include '../includes/rodape.php';?>