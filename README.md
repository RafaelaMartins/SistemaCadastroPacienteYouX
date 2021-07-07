# SistemaCadastroPacienteYouX
Sistema de Cadastro de Pacientes para uma clínica.

* As suas pastas presentes são projetos distintos:
* A pasta (Api) é a Api do projeto que contém os endpoints de cadastrado. Esta Api foi desenvolvida utilizando o framework Lumen.
* A pasta SistemaCadastroPacienteYouX é o projeto de frontend. As páginas do projeto foram desenvolvidas utilizando:jQuery, Bootstrap,CSS, HTML e Javascript.
* O arquivo ux.sql é o banco de dados criado para a aplicação.
* As configuração do banco local são as seguintes: Port:3306, Hostname:localhost, User:root, password: "", db_name:"ux" . E estão localizadas no arquivo .env dentro de Api/youX
* versão do Phpmyadmin 5.1.0
* Versão do PHP: 7.3.28


# Como Executar à Aplicação:
* Mover a pasta Api do diretório atual para a pasta htdocs, de forma que a rota base da api seja:'http://localhost/Api/youX/public/';
* Dentro de Api/ rode o comando "composer i" , para instalar todas as dependencias.
* Dentro de Api/youX rode novamente o comando "composer i" para instalar todas as dependencias.
* Mover a pasta SistemaCadastroPacienteYouX do diretório atual para htdocs, de forma que a rota base do front-end seja:'http://localhost/SistemaCadastroPacienteYouX/public/';
* Dentro de SistemaCadastroPacienteYouX tode o comando "composer i" para instalar todas as dependencias, caso exista.
* Se alguma dependência falhar o comando "composer update --ignore-platform-reqs" poderá resolver.
* Feito esses passos, acesse a página de cadastro de pacientes pelo endereço https://localhost/SistemaCadastroPacienteYouX/public/register.php

Foi implementando as questões de 1 á 5 .

