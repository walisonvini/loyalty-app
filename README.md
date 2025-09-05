# Loyalty App

## Description

Sistema de programa de fidelidade desenvolvido em Laravel que permite gerenciar clientes, pontos e recompensas.

## Features

- ✅ Cadastro e gerenciamento de clientes
- ✅ Sistema de pontuação baseado em valores gastos
- ✅ Catálogo de recompensas resgatáveis
- ✅ Histórico de resgates e saldo de pontos
- ✅ Notificações por email para pontos ganhos e prêmios elegíveis
- ✅ API REST com autenticação por Bearer Token

## 💻 Pré-requisitos

### Opção 1: Desenvolvimento Local
* **PHP** `^8.2`
* **Composer** `^8.0`
* **MySQL**
* **Redis**

### Opção 2: Desenvolvimento com Docker
* **Docker** `^24.0`
* **Docker Compose** `^2.0`

## 🐋 Instalação com Docker

1. Copie o arquivo .env
```bash
cp .env.example .env
```

2. Configure seu arquivo .env
```bash
# Atualize as credenciais do banco de dados para Docker:
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=seu_nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Configurações do Redis para filas:
QUEUE_CONNECTION=redis
REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

# Configurações de email para notificações:
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=mailpit
MAIL_PORT=1025
```

3. Instalar dependências PHP
```bash
#Não é necessário ter PHP instalado localmente, pois o comando roda dentro de um container Docker.
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php84-composer \
    composer install
```

4. Subir os containers
```bash
./vendor/bin/sail up -d
```

5. Executar as migrations
```bash
./vendor/bin/sail artisan migrate
```

6. Gerar a chave da aplicação
```bash
./vendor/bin/sail artisan key:generate
```

7. Popular o banco de dados
```bash
./vendor/bin/sail artisan db:seed
```

8. Executar as filas
```bash
./vendor/bin/sail artisan queue:work redis --queue=emails,default
```

9. Acessar a aplicação
```bash
http://localhost
```

## ⚙️ Instalação sem Docker

1. Instalar dependências PHP
```bash
composer install
```

2. Copiar o arquivo .env e gerar a chave da aplicação
```bash
cp .env.example .env
php artisan key:generate
```

3. Configurar seu arquivo .env
```bash
# Atualize o banco de dados e outras configurações de ambiente conforme necessário
```

4. Executar as migrations
```bash
php artisan migrate
```

5. Popular o banco de dados
```bash
php artisan db:seed
```

6. Iniciar a aplicação
```bash
php artisan serve
```

7. Executar as filas
```bash
php artisan queue:work redis --queue=emails,default
```
