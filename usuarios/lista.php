<?php
   $pag_header = 'Usuários';
   include '../includes/cabecalho.php';
   
   session_start();
   $usuarios = isset($_SESSION['usuarios'])? $_SESSION['usuarios'] : array();   
?>

        <div class="container">
            <div class="page-header">
                <h2><?php echo $pag_header;?></h2>
            </div>
            
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th><a href="formulario.php" class="btn btn-primary">Novo</a></th>
                        <th>Cpf</th>
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
                                <a href="processa.php?acao=excluir&cpf=<?php echo $usuario['cpf'];?>" class="btn btn-danger">Excluir</a>                        
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