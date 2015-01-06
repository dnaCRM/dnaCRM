#dnaCRM

###Projeto de um sistema CRM para administradoras de condomínios.

### Demo
* http://dnacrm-tisi.rhcloud.com/
* usuário: convidado
* senha: 123456

#### Desenvolvedores
* Gabriel Borges Chiarelo
* Raul Ramos Martinez
* Paulo Vinicius Pacheco Sorrentino

#### Breve descrição
* Este projeto será o resultado de um estudo sobre Programação Orientada a Objetos, Padrões de Projeto, Projeto e Implementação de Banco de dados Relacional.

#### Requisitos para a execução do sistema
* Servidor Apache 2.4.9 com rewrite_module ativado
* Linguagem: Php 5.5.12 (mínimo)
* SGBD: PostgreSQL 9.1 (mínimo)

#### Status
No presente estado, o sistema já implementa recursos de autenticação de usuários a persistência das seguintes entidades, assim como seus dados dependentes:
* Pessoa física
* Pessoa Jurídica
* Apartamentos
* Setores
* Condomínios
* Ordens de serviços
* Ocorrências

### Instalação para testes
Após baixar os arquivos do sistema para a pasta no servidor:
* Criar o banco de dados no PostgreSQL versão mínima 9.1 utilizando os seguintes comandos SQL:
```SQL
CREATE DATABASE DNACRM
TEMPLATE = TEMPLATE0
ENCODING 'UTF-8'
CONNECTION LIMIT 40;
```
* É recomendado que o servidor Postgres onde o sistema será instalado não possua usuários (rolname) numéricos. O motivo é que o dnaCRM cadastra usuários diretamente no catálogo do banco de dados utilizando a chave primária de pessoa física como rolname;
* Antes de executar os comandos indicados abaixo, certifique-se de que o servidor Postgres não possui nenhum rolname "1". Este rolname é cadastrado durante a execução dos comandos no arquivo indicado abaixo.
* Executar os comandos SQL presentes no arquivo "app/dbc/construcao_banco_de_dados.sql".
* Após a instalação utilizar usuário administrador e senha 123456 para acesso ao sistema.
