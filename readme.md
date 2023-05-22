#Instalação e inicialização do Backend

Ferramentas utilizadas:

- php 8.1.19
- composer 2.5.1
- postgres

Abrir o diretório api que se encontra no diretório raiz

Renomear o arquivo .env.example para .env
Preencher com os dados para teste

Abrir o terminal dentro do diretorio Backend encontrado no diretório raiz e executar os seguinte comandos:

- composer install
- composer serve (Irá subir o servidor padrão do PHP com a porta 8000 no diretório src/main/index.php)

##Obs:

Como modo alternativo de popular o banco, fiz implementação das migration, porém não consegui finalizar a tempo a lógica para rodar as migrations, então como paliativo defini as seguintes rotas:

- /api/migrate-up
- /api/migrate-down

#Instalação e inicialização do Frontend

Ferramentas utilizadas:

Vue 3
Vite
Typescript

Abrir o diretório app que se encontra no diretório raiz

Abrir o terminal dentro do diretorio Frontend encontrado no diretório raiz e executar o seguintes comandos:

- yarn
- yarn build
