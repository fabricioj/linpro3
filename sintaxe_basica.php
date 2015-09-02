<?php
/*
 * Sintaxe básica do PHP
 */

// Declaração de uma constante fora do escopo de uma classe
define('MINHA_CONSTANTE', 'constante de teste');

// Tipos de variáveis do PHP
$inteiro = 100;              // Inteiro
$decimal = 100.90;           // Decimal
$string = 'String de teste'; // String
$booleano = true;            // Booleano
$nulo = null;                // Nulo

// Calcular valor do dia de trabalho
$salario = 1100.00;
$dias_do_mes = 30;

$valor_do_dia = $salario / $dias_do_mes;

// Formatar valores decimais
$salario_formatado = number_format( $salario, 2, ',', '.' );
$valor_do_dia_formatado = number_format( $valor_do_dia, 2, ',', '.' );

// Imprimir valor formatado
echo "<h3>Valor do dia de um trabalhador com salário de R$ {$salario_formatado}</h3>";
echo '<p>Fórmula: <b>(SALÁRIO / 30)</b></p>';
echo '<p>Valor do dia: <b>R$ ' . $valor_do_dia_formatado . '</b></p>';

$prateleira = array();
$prateleira[0] = 'Mouse';
$prateleira[1] = 'Microfone';
$prateleira[2] = 'Copo de água';


$prateleira2 = array(
    'Mouse',
    'Microfone',
    'Copo de água'
);

//Matrizes
$clientes = array();
$clientes[] = array(
    'nome'=>'Eduardo',
    'telefone'=>'16 99999-9999',
    'endereco'=>'Rua Ilario Alves de Freitas, 728'
    
);

$clientes[] = array(
    'nome'=>'José',
    'telefone'=>'16 99999-0000',
    'endereco'=>'Rua Foda-se, 728'
    
);

echo $clientes[0]['nome'];
echo $clientes[0]['endereco'];

$clientes2 = array(
    array(
        'nome'=>'José',
        'telefone'=>'16 99999-0000',
        'endereco'=>'Rua Foda-se, 728'
    ),
    array(
        'nome'=>'Eduardo',
        'telefone'=>'16 99999-9999',
        'endereco'=>'Rua Ilario Alves de Freitas, 728'
    )
);
Class Clientes{
  public $nome;  
  public $telefone;
  public $endereco;
    
}
//Classes genéricas
$aluno = new stdClass();
$aluno->nome = 'Eduardo';
$aluno->endereco = 'Rua fulano';
$aluno->telefone = '16 99999-8888';
$aluno->teste = 'teste';

//Escopo da classe
$cliente = new Clientes();
$cliente->nome = 'Fabricio';
$cliente->endereco = 'Rua ciclano'; 
$cliente->telefone = '18 9999-9999';
$cliente->teste = '';

echo '<br>' . $cliente->nome .' '. $cliente->endereco;