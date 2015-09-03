<?php
include '../includes/cabecalho.php';
class UsuarioProcessa{
   public function __construct() {

      if (method_exists($this, $_GET['acao']))
         call_user_func (array($this, $_GET['acao']));
      else{
         die ('<div style="text-align: center" class="alert alert-danger" role="alert"> <span>Ação cancelada, ação <b>'.$_GET['acao'].'</b> inexistente.</span></div>');
      }
   }
   public function salvar(){
      //Valida dados
      $usuario = $_POST;
      $cpf = $usuario['cpf'];

      if (strlen($cpf)!= 11 || ! is_numeric($cpf))
          die('Digite um CPF válido');
      // die termina a execução da aplicação processa.php no momento que é acionado.


      //Iniciar sessão
      session_start();

      //Sessão é entre o servidor e a nossa conexão, nenhum outro acesso carregara as mesmas informações.
      $_SESSION['usuarios'][$cpf] = $usuario;
      //$_SESSION = array();

      echo '<pre>';
      print_r( $_SESSION );
      echo '</pre>';

      //Redirecionar para a página lista.php
      header('Location: lista.php');
      
   }
   public function excluir(){
      //Iniciar sessão
      session_start();

      // Deletar do array
      $cpf = $_GET['cpf'];
      unset($_SESSION['usuarios'][$cpf]);
   }
   
}
new UsuarioProcessa();
