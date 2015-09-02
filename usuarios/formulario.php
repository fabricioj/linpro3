<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página de Formulário</title>
    </head>
    <body>
        <h1>Cadastro de Usuários</h1>
        <form action="processa.php" method="post">
            
            
            E-mail: <input type="text" name="email" id="email">
            <br>
            Senha: <input type="text" name="senha" id="senha">
            <br>
            Nome: <input type="text" name="nome" id="nome">
            <br>
            CPF: <input type="text" name="cpf" id="cpf">
            <br>
            Endereço: <input type="text" name="endereco" id="endereco">
            <br>
            Número: <input type="text" name="numero" id="numero">
            <br>
            Bairro: <input type="text" name="bairro" id="bairro">
            <br>
            Cidade: <input type="text" name="cidade" id="cidade">
            <br>
            Cep: <input type="text" name="cep" id="cep">
            <br>
            Uf: <input type="text" name="uf" id="uf">
            <br>
          
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>