
<?php
include '../includes/cabecalho.php';
class UsuarioProcessa{
   private $caminho_arquivo = '../armazenamento/usuarios.csv';
   public function __construct() {
        if (isset($_GET['acao'])){
            if (method_exists($this, $_GET['acao']))
               call_user_func (array($this, $_GET['acao']));
            else{
               die ($this->getMsgErro('Ação <b>'.$_GET['acao'].'</b>inexistente.'));
             }
            
        }
   }

    public function salvar(){
        //Valida dados
        $usuario = $_POST;
      
        $cpf = $usuario['cpf'];
      
        if (strlen($cpf)!= 11 || ! is_numeric($cpf)){
            die($this->getMsgErro('Digite um CPF válido'));
            // die termina a execução da aplicação processa.php no momento que é acionado.      
        }
        $achou = false;
        $primeira = true;
        $usuarios = $this->buscar_filtros();        
        $arquivo = fopen($this->caminho_arquivo, 'w');
        
        foreach($usuarios as $usuario_item){
            if ($usuario_item['cpf']== $cpf){
                fwrite($arquivo, (!$primeira? "\n": "" ). str_replace("\n", "", implode(';', $usuario)));
                $achou = true;
            }else{
                fwrite($arquivo, (!$primeira? "\n": "" ). str_replace("\n", "", implode(';', $usuario_item)));
            }
            $primeira = false;
        }
        if (!$achou){
            $arquivo = fopen($this->caminho_arquivo, 'a+');
            fwrite($arquivo, "\n".implode(';', $usuario));
        }
        fclose($arquivo);
      
      //Redirecionar para a página lista.php
      header('Location: lista.php');
      
   }
   public function buscar_usuario($cpf){
       $arquivo     = fopen($this->caminho_arquivo, 'r');
       $usuario     = [];
       
       while (!feof($arquivo)){
           $linha   = fgets($arquivo);
           $linha = str_replace("\n", "", $linha);
           
           $usuario_lista = explode(';', $linha);
           if ($usuario_lista[3] == $cpf){
               $usuario = $this->fabricaUsuario($usuario_lista[0], $usuario_lista[1], $usuario_lista[2], $usuario_lista[3], $usuario_lista[4], $usuario_lista[5], $usuario_lista[6], $usuario_lista[7], $usuario_lista[8], $usuario_lista[9]);
               break;
           }
           
       }
       fclose($arquivo);
       return $usuario;
       
   }
   public function buscar_filtros (){
        
        $nome_filtro = isset($_GET['usuario_nome'])? $_GET['usuario_nome']:'';
        $cpf_filtro =  isset($_GET['usuario_cpf'])? $_GET['usuario_cpf']:'';
        
        $arquivo     = fopen($this->caminho_arquivo, 'r');
        $usuario     = [];
        $usuarios    = [];

        $i = 0;
         while (!feof($arquivo)){
             $linha   = fgets($arquivo);
             if ($linha != ''){
                 $usuario = explode(';', $linha);
                 //if ($i > 0){
                     $add = false;
                     if ($nome_filtro != ''){
                        if (strpos($usuario[2], $nome_filtro) !== FALSE && strpos($usuario[2], $nome_filtro, 0) > -1){                    
                            $add = true;
                        }
                     }else{
                         $add = true;                         
                     }
                     if ($cpf_filtro != ''){
                        if ($usuario[3] == $cpf_filtro && $add){                    
                            $add = true;
                        } else{
                            $add = false;
                        }
                     }
                     if ($add){
                        $usuarios[] = $this->fabricaUsuario($usuario[0], $usuario[1], $usuario[2], $usuario[3], $usuario[4], $usuario[5], $usuario[6], $usuario[7], $usuario[8], $usuario[9]);
                     }
                 //}               

             }
             $i ++;
         }
        fclose($arquivo);
        return $usuarios;
       
   }
   public function excluir_usuario(){       
        $cpf = $_GET['cpf'];
        
        $usuarios = $this->buscar_filtros();        
        $arquivo = fopen($this->caminho_arquivo, 'w');

        $primeira = true;
        foreach($usuarios as $usuario_item){
            if ($usuario_item['cpf'] !== $cpf){
                fwrite($arquivo, (!$primeira? "\n": "" ). str_replace("\n", "", implode(';', $usuario_item)));
            }
            $primeira = false;
        }
        
        fclose($arquivo);

        header('Location: lista.php');
   }
   private function fabricaUsuario($email, $senha, $nome, $cpf, $endereco, $numero, $bairro, $cidade,$cep, $uf ){
       return ['email'=> $email, 
           'senha' => $senha, 
           'nome' => $nome, 
           'cpf' => $cpf, 
           'endereco'=>$endereco, 
           'numero'=>$numero, 
           'bairro'=>$bairro, 
           'cidade'=>$cidade,
           'cep'=>$cep, 
           'uf'=>$uf
           ];
       
   }
   private function getMsgErro($msg){
       $mensagem = '';
       $mensagem .= '<div style="text-align: center; max-width: 600px; margin-left: auto; margin-right: auto;" class="alert alert-danger" role="alert"> '
                       . '<h4>Ação cancelada</h4>'
                       . '<p>'.$msg.'</p>'
                       . '<p>'
                       .    '<button type="button" class="btn btn-danger" onclick="window.history.back();">Voltar</button>'
                       . '</p>'
                  . '</div>';
       return $mensagem;
   }
   
}
$usuario_todos = new UsuarioProcessa();
