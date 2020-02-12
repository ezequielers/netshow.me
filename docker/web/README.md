# Netshow.me - Formulário de contato
Projeto em Laravel 6, utilizando CoreUI para o teste de desenvolvedor PHP na Netshow.me.

## Conteúdo do projeto
- Painel admnistrativo baseado no [CoreUI theme](https://coreui.io/)
- Gerenciamento de Usuários, Regras e Permissões
- Suporte a multi-idiomas
- Formulário de contato
- Possibilidade de exportar os dados para CSV, PDF, Excel.
- Pesquisa, paginação, filtros.
- Envio de e-mail para novos usuários, alteração de senha.
- API disponível em http://localhost:8181/api/v1/users

## Instalação do ambiente para uso da aplicação

Para que seja possível o uso do backend será necessário o uso do Docker, para que o ambiente seja emulado corretamente e suba todos os seus recursos, como NGinx, MySQL, PHP-Fpm e Laravel.

## Instalação do Docker
Para instalar o Docker basta baixar do site oficial do [Doker](https://hub.docker.com/?overlay=onboarding).

## Configuração do Docker para uso do ambiente
Para que usar o ambiente será necessário estar no diretório `/docker` e executar o seguinte comando:
```
docker-compose up -d
```
Irá começar a instalação dos pacotes e e configuração do ambiente para o uso dos serviços.
Ao término será exibido um resultado semelhante ao abaixo:
```
Creating network "docker_static_network" with the default driver
Creating php_fpm ... done
Creating mysql_db ... done
Creating nginx    ... done
```

Após o passo anterior será necesário a execução dos seguintes comandos:
Instalar as dependencias para o o uso da aplicação (composer)
```
docker exec php_fpm composer install
```
Gerar nova Key para o Laravel
```
docker exec php_fpm php artisan key:generate
```
Limpar o cache para o uso
```
docker exec php_fpm php artisan config:cache
```
Carga inicial de alguns dados pré definidos
```
docker exec php_fpm php artisan migrate --seed
```
Criar referência para armazenamento de arquivos
```
docker exec php_fpm php artisan storage:link
```

## Acessando a aplicação
Abra o navegador pelo endereço __http://localhost:8181/login__ e informe os dados para acesso:
```
usuário: admin@email.com
senha: netshowme
```

## Mailtrap
- Para acessar os e-mails, acesse: https://mailtrap.io/
- Usuário: ezequielrs@gmail.com
- Senha: Netshow.me