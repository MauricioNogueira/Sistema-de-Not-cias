<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)


## Informações
  
Versão do PHP: 7.1.1
Versão do Yii: 2.0
  
## Iniciando o sistema
  
Antes de começar é necessário instalar o composer, caso não tenha, <a href="https://getcomposer.org/download/">clique aqui</a> para baixar.
  
  
Depois de ter instalado o composer, starta seu apache e o mysql, em seguida baixe o projeto e mova para a pasta do seu servidor local.
  
  
Agora você deve abrir seu gerenciador de banco de dados, crie um banco de dados chamado world_news, pois este nome está configurado no arquivo db.php que se encontra na pasta config do projeto. Lá você configura o seu username, password e o nome do banco que será usado. 
  
Abra seu terminal e vá para o diretório do projeto.
  
Depois de ter criado o banco de dados e configurado, crie uma pasta chamada rbac no diretório do projeto para armazenar as configurações de autenticação e autorização, (os arquivos irão surgir na pasta rbac automaticamente no momento em que efetuar o comando para gerar as tabelas) em seguida você deve inserir as tabelas no banco de dados. O framework yii tem um comando na qual ele transforma as classes que se encontra na pasta migrations do projeto em tabelas, se seu banco de dados não possui nenhuma tabela basta usar o comando yii migrate no seu terminal, ele vai começar a gerar as tabelas. Em seguida, digite yes e aperte a tecla enter para dar continuidade. Agora basta verificar seu banco de dados, verá que as tabelas foram criadas. Na tabela usuários já possui um usuário padrão que configurei para entrar no sistema. Este usuário é o super administrador do sistema. Se caso queria resetar as tabelas, antes você deve excluir dois arquivos que se encontra na pasta rbac do projeto, exclua os arquivos items.php e assignments.php, em seguida use o comando yii migrate/fresh e vá confirmando as perguntas, depois de ter confirmado, as tabelas serão excluídas e geradas logo em seguida.
  
  
Agora, digite o comando php yii serve no seu terminal. Em seguida irá aparecer a mensagem que seu projeto já estar startado no http://localhost:8080. Agora basta abrir seu navegador e digitar na url localhost:8080.
  
  
Dados do super administrador para logar no sistema<br>
Login: 755.184.420-17<br>
Senha: 123
  
  
Pronto!
  
  
Meu e-mail: mauricio.nogueiraa@gmail.com