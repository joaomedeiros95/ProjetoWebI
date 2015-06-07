# ProjetoWebI

Projeto de Web I, UFRN. 
Sistema de Hospital para web.

Link com quick guide para git: http://rogerdudler.github.io/git-guide/

## Como fazer o uso do DAO
Para usar o DAO nesse projeto deve utilizar o seguinte código:

```php
include_once('config.php');	  /*dependendo do nível da hierarquia deve-se mudar o caminho do config.php*/
$pessoa = new pessoaDAO();	  /*pode instanciar qualquer classe que estende de DAO*/
$result = $pessoa->getALL();  /*exemplo de um método que pega todas as tuplas da tabela instanciada, retornando o resultado do mysqli direto, necessário iterar sobre as linhas para mostrar o resultado no sistema.*/
```

## Protótipo

O projeto está no seguinte link: http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/

Logins:

| Painel | Login | Senha |
| ------------------- | ----------------------------------------- |
| Painel de Controle | joaoribeiromedeiros@gmail.com | 5948160505|
| Painel do Paciente | gustavo.hmf20@gmail.com | 923257845 |

Imagens do protótipo (04/06/2015):

![Alt text](/screenshots/pagina_principal.png?raw=true "Página Pricipal")
![Alt text](/screenshots/controle_estoque.png?raw=true "Controle Estoque")
