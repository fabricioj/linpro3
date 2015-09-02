<?php

class Processalogin {
    
    private $logins;

    public function __construct() {
        /*
         * Logins válidos do sistema
         */
        $this->logins = array(
            array( 'usuario' => 'eduardo',  'senha' => 'b9abfbc09858d15b0f6a5f41cb1ee329' ),
            array( 'usuario' => 'jose',     'senha' => 'b9abfbc09858d15b0f6a5f41cb1ee329' ),
            array( 'usuario' => 'roberto',  'senha' => 'b9abfbc09858d15b0f6a5f41cb1ee329' ),
            array( 'usuario' => 'luis',     'senha' => 'b9abfbc09858d15b0f6a5f41cb1ee329' ),
            array( 'usuario' => 'gabriel',  'senha' => 'b9abfbc09858d15b0f6a5f41cb1ee329' )
        );
    }
    
    /**
     * Retorna um hash de uma string 
     * 
     * @param String $string
     * @return String
     */
    public function hash( $string ) {
        $token = md5( 'd81b4d1f9cb0f074f9ebe2482af9930d' );
        return md5( $token . $string . $token );
    }
    
    /**
     * Verifica se o login existe
     * 
     * @param String $usuario
     * @param String $senha
     * @return boolean
     */
    public function verificar_login( $usuario, $senha ) {
        $senha = $this->hash( $senha );
        
        // Percorre o vetor logins
        foreach ( $this->logins as $login ) {
            
            // Verifica se o usuario do form é igual usuario de logins
            if ($usuario == $login['usuario'] && $senha == $login['senha']) {
                return true;
            }
        }
        
        // Não encontrou o usuario no vetor de logins
        return false;
    }
    
}

// Pegar os dados via POST
$login = $_POST;
$processa_form = new Processalogin();

// Verficar se login existe
if ( $processa_form->verificar_login( $login['usuario'], $login['senha'] ) ) {
    echo 'Login aceito!!!!';
} else {
    echo 'Usuário e senha inválidos!!!';
}