# 🚀 Teste Técnico

Este repositório contém a solução para o desafio técnico, composto por uma API desenvolvida em **Laravel** e uma interface **SPA em Vue.js**, com integração para consulta de CEP via [ViaCEP](https://viacep.com.br/).

## 📁 Estrutura do Projeto

backend
```bash
├── backend-laravel/
│
├── app/
│   ├── Console/
│   ├── Exceptions/
│   │   └── CepNotFoundException.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/
│   │   │       └── V1/
│   │   │           └── CepController.php       # Com anotações do Swagger
│   │   ├── Middleware/
│   │   └── Requests/
│   │       └── ShowCepRequest.php              # Validação do input (ex: regex de CEP)
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   └── RepositoryServiceProvider.php       # Faz o bind das interfaces dos repositórios
│   ├── Services/
│   │   └── CepService.php                      # Contém regra de negócio
│   ├── DTOs/
│   │   └── CepResponseDTO.php
│   ├── UseCases/
│   │   └── BuscarCep/
│   │       ├── BuscarCep.php                   # Aponta pro service
│   │       ├── BuscarCepRequest.php            # Request do caso de uso
│   │       └── BuscarCepResponse.php           # Response do caso de uso
│   ├── Repositories/
│   │   ├── Contracts/
│   │   │   └── CepRepositoryInterface.php      # Interface do repositório
│   │   └── ViaCepRepository.php                # Implementação concreta
│   └── OpenApi/                                # Documentação Swagger
│       ├── Definitions/
│       │   └── CepResponseDefinition.php
│       └── Parameters/
│           └── CepParameter.php
│
├── bootstrap/
│
├── config/
│   └── l5-swagger.php                          # Configurações Swagger
│
├── database/
│
├── public/
│   └── docs/                                   # Documentação gerada
│
├── resources/
│   └── views/
│       └── vendor/
│           └── l5-swagger/                     # Customizações Swagger (se houver)
│
├── routes/
│   └── api.php                                 # Versão separada ex: prefixo api/v1
│
├── tests/
│   ├── Feature/
│   │   └── CepApiTest.php
│   └── Unit/
│       ├── Services/
│       │   └── CepServiceTest.php
│       ├── DTOs/
│       │   └── CepResponseDTOTest.php
│       └── UseCases/
│           └── BuscarCepTest.php
│
├── .env
├── .phpunit.result.cache
├── .phpstan.neon                                # Static analysis (opcional)
├── .psalm.xml                                   # Static analysis (opcional)
├── .github/
│   └── workflows/
│       └── ci.yml                               # GitHub Actions para rodar tests/linters
├── composer.json
├── phpunit.xml
└── README.md
```

```bash
.
└── frontend-vue/
    ├── src/
    │   ├── views/
    │   │   ├── HomeView.vue                    # Página inicial
    │   │   └── CepSearchView.vue               # Tela de pesquisa de CEP
    │   ├── components/
    │   │   └── AddressResult.vue               # Exibe dados do endereço
    │   ├── store/
    │   │   └── cep.js                          # Vuex: estado da busca de CEP
    │   ├── router/
    │   │   └── index.js                        # Vue Router: Home e Pesquisa
    │   └── App.vue / main.js
```

## ⚙️ Tecnologias Utilizadas

### Backend

- Laravel 10+
- PHP 8.2+
- PHPUnit
- Guzzle (para requisições HTTP)
- SOLID + Design Patterns (Repository, Service, DTO)
- Object Calisthenics

### Frontend

- Vue.js 3 (Composition API)
- Vue Router
- Vuex 4
- Axios
- TailwindCSS (estilização)

## 🧠 Arquitetura Backend

- **Controller**: Camada de entrada para requisições HTTP.
- **Service Layer**: Regras de negócio.
- **Repository Pattern**: Camada de abstração para chamadas externas (ex: ViaCEP).
- **DTOs (Data Transfer Objects)**: Garantem estrutura e validação dos dados.
- **Testes**: Cobertura com testes unitários e de integração usando `PHPUnit`.

## 🚀 Como Rodar o Projeto
```bash
git clone https://github.com/gleyver/viacep.git
cd viacep
```


### 📦 Backend (Laravel)

```bash
cd backend

# Instalar dependências
composer install

# Copiar arquivo de ambiente
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate

# Rodar servidor local
php artisan serve
```

### 🔍 Rodar Testes Backend

```bash
# Rodar testes 
php artisan test
```

### 🌐 Frontend (Vue.js)

```bash
cd frontend

# Instalar dependências
npm install

# Rodar ambiente de desenvolvimento
npm run dev
```

## ✅ Funcionalidades

### Backend (API)

- `GET /api/v1/cep/{cep}`: Consulta um CEP na API ViaCEP e retorna endereço formatado.
- Validação de formato de CEP (apenas 8 dígitos).
- Padrões de erro para entrada inválida e CEP não encontrado.

### Frontend (SPA)

- **Home Page**: Descrição breve, imagem e botão para navegação.
- **Pesquisa de CEP**:
  - Input com máscara para CEP (`#####-###`)
  - Resultado de endereço formatado com dados da API.
  - Botão de retorno à Home.
- Estado gerenciado via **Vuex**.

## 🧪 Testes Implementados

### Laravel

- Testes de unidade:
  - Services
  - DTOs
- Testes de integração:
  - Endpoint de consulta CEP
  - Integração real com a API externa (mockável)

### Vue.js

- Testes unitários com Vitest (opcional).
- Testes de integração com Cypress ou Vue Test Utils (diferencial).

## 🧱 Princípios Aplicados

- SOLID (especialmente SRP, DIP)
- Design Patterns (Service, Repository, DTO)
- Object Calisthenics (responsabilidades reduzidas por classe, legibilidade, composição)
- Clean Code + boas práticas (nomes descritivos, separação de responsabilidades)


### ✅ Boas práticas

- Utilize DTOs para padronizar entrada e saída.
- Documente todos os status HTTP relevantes.
- Mantenha a documentação atualizada junto com a API.


## 📬 Contato

Para mais informações, entre em contato comigo via https://www.linkedin.com/in/gleyver/ ou gleyvercoutinho@gmail.com.
