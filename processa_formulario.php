<?php
class ProcessaFormulario{
   private $usuarios;

   public function __construct() {
      $this->usuarios = array(
          array('usuario'=>'fabricio', 'senha'=>'e80fe219f85ebaccb7631283ae75b026'),
          array('usuario'=>'mario'   , 'senha'=>'e80fe219f85ebaccb7631283ae75b026'),
          array('usuario'=>'josé'    , 'senha'=>'e80fe219f85ebaccb7631283ae75b026'),
          array('usuario'=>'roberto' , 'senha'=>'e80fe219f85ebaccb7631283ae75b026'),
          array('usuario'=>'luis'    , 'senha'=>'e80fe219f85ebaccb7631283ae75b026')
      );
   }
   public function hash($string){
      $token = md5('d5e5r6t7y890f8d665d89fg87d9cg8');
      return md5($token . $string . $token);
   }
   public function verifcar_login( $usuario, $senha ){
      $senha = $this->hash($senha);
      foreach ($this->usuarios as $usu ){
         if ($usu['usuario'] == $usuario && $usu['senha'] == $senha){
            return true;
         }         
      }
      
      return false;
   }
   
}

$login = $_POST;

$processa_form = new ProcessaFormulario();

if ($processa_form->verifcar_login($login['usuario'], $login['senha'])){
   echo 'Login aceito!!!';
}else{
   echo 'Usuário e senha inválidos!!!';
}
