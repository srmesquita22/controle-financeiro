# Controle Financeiro

⚠️ Aviso: Trabalho em progresso!

![Version](https://img.shields.io/badge/version-0.1.0-blue.svg?longCache=true&style=flat-square)
![License](https://img.shields.io/badge/license-MIT-green.svg?longCache=true&style=flat-square)
![StyleCI](https://github.styleci.io/repos/249856074/shield?branch=master)

![MapOS](https://raw.githubusercontent.com/srmesquita22/controle-financeiro/master/assets/img/logo.png)

## Requerimentos

* PHP 8 ou superior
* Banco de dados (por exemplo: MySQL, PostgreSQL, SQLite)
* Servidor Web (por exemplo: Apache, Nginx, IIS)

## Framework

Controle Financeiro usa o [Laravel](http://laravel.com), o melhor framework PHP atualmente, como base.

## Instalação

* Instale o [Composer](https://getcomposer.org/download) e o [Npm](https://nodejs.org/en/download)
* Clone o repositório: `git clone https://github.com/srmesquita22/controle-financeiro.git`
* Depois acesse a pasta controle-financeiro, `cd controle-financeiro`
* Instale as dependências `composer install ; npm install ; npm run production`
* Crie o arquivo de configuração de variáveis de ambiente `cp .env.production .env`
* Configure as variáveis de ambiente e a conexão com o banco de dados no arquivo .env
* Rode os seeders `php artisan migrate:fresh --seed`
* Rode `php artisan key:generate`
* Rode `php artisan serve` para iniciar o servidor.
* Acesse o Controle Financeiro no navegador: http://localhost:8000 ou url que você configurar.
* E logue com as credenciais que você cadastrar.


## Dependências de front-end

Ao atualizar dependências de front-end ou alterar arquivos CSS ou JS você precisará seguir as instruções abaixo.

1. Garanta que tenha o Node e NPM instalado.

```
npm install
```

2. Execute o comando abaixo para compilar o CSS e JS:

```
npm run prod
```

Este comando irá gerar os arquivos dentro da pasta `public` com os arquivos CSS, e JavaScript minificados.

## Contribuindo

Por favor, seja muito claro em suas pull requests, as pull requests podem ser rejeitadas sem motivo.

Ao contribuir com código para o Controle Financeiro, você deve seguir os padrões de codificação PSR-2. A regra de ouro é: Imite o código Contrle Financeiro existente.

## Changelog

Por favor, consulte [Changelog](CHANGELOG.md) para obter mais informações sobre todas as atualizações.

## Segurança

Se você descobrir algum problema relacionado à segurança, envie um email para contato@renatomesquita.dev ao invés de usar o issue tracker.

## Créditos

* [Renato Mesquita](https://github.com/srmesquita22)
* [Sabrina Mesquita](https://github.com/sabrinagui)
* [Todos os Contribuidores](../../contributors)

## Licença

O Controle Financeiro é distribuído utilizando a [MIT License](LICENSE.md).