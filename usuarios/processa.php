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
          die('<div style="text-align: center" class="alert alert-danger" role="alert"> <span>Digite um CPF válido</span></div>');
      // die termina a execução da aplicação processa.php no momento que é acionado.


      $arquivo = fopen('../armazenamento/usuarios.csv', 'a+');
      
      /*foreach ($usuario as $atributos ){
         $linha .= ($linha != "" ? ";" : ""). $atributos;        
      }*/
      
      $linha = implode(";", $usuario);
      
      fwrite($arquivo, "\n{$linha}");
      
      fclose($arquivo);
      
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
