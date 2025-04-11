<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Backend Laravel - Via CEP

Este é o backend da aplicação Via CEP, desenvolvido com Laravel 12.

## Arquitetura

O projeto segue os princípios da arquitetura limpa (Clean Architecture) e utiliza:

- **Laravel 12** como framework base
- **PHP 8.2** como linguagem de programação
- **Swagger/OpenAPI** para documentação da API
- **SQLite** como banco de dados (configurável)
- **PHPUnit** para testes automatizados

## Requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e NPM (para desenvolvimento)
- SQLite (ou outro banco de dados de sua preferência)

## Instalação

1. Clone o repositório:
```bash
git clone [URL_DO_REPOSITÓRIO]
cd backend-laravel
```

2. Instale as dependências do PHP:
```bash
composer install
```

3. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

4. Gere a chave da aplicação:
```bash
php artisan key:generate
```

5. Configure o banco de dados no arquivo `.env`

6. Execute as migrações:
```bash
php artisan migrate
```

## Executando o Projeto

Este comando iniciará:
- Servidor de desenvolvimento
- Queue worker
- Log viewer
- Vite para assets

Ou, se preferir rodar separadamente:
```bash
php artisan serve
```

## Testes

Para executar os testes:
```bash
php artisan test
```

Ou usando o PHPUnit diretamente:
```bash
./vendor/bin/phpunit
```

## Documentação da API

A documentação da API está disponível através do Swagger. Após iniciar o servidor, acesse:
```
http://localhost:8000/api/documentation
```

## Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
