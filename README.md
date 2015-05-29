# ProjetoWebI

Projeto de Web I, UFRN. 
Sistema de Hospital para web.

Link com quick guide para git: http://rogerdudler.github.io/git-guide/

# Como fazer o uso do DAO
Para usar o DAO nesse projeto deve utilizar o seguinte código:

`include_once('config.php');	  --dependendo do nível da hierarquia deve-se mudar o caminho do config.php
$pessoa = new pessoaDAO();	    --pode instanciar qualquer classe que estende de DAO
$result = $pessoa->getALL();	  --exemplo de um método que pega todas as tuplas da tabela instanciada, retornando o resultado do mysqli direto, necessário iterar sobre as linhas para mostrar o resultado no sistema.
`
