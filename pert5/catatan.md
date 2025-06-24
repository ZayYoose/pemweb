# Belajar Membuat API untuk Project Akhir Tugas Kelas Kelompok 
1. docker exec -it pemweb bash
2. composer create-project --prefer-dist raugadh/fila-starter .
3. # src di .env
    APP_NAME="Pemweb"
    APP_ENV=local
    APP_KEY=base64:q0VW6bPDldkF8YzSZn4rv6RciulqRIck4NAX+ENcfXM=
    APP_DEBUG=true
    APP_TIMEZONE='Asia/Jakarta'
    APP_URL=http://localhost
    ASSET_URL=http://localhost
    DEBUGBAR_ENABLED=false
    ASSET_PREFIX=
    #ASSET_PREFIX=/dev/kit/public example incase deployed inside a folder

    DB_CONNECTION=mysql
    DB_HOST=db_pemweb
    DB_PORT=3306
    DB_DATABASE=db_pemweb
    DB_USERNAME=root
    DB_PASSWORD=p455w0rd
4. chown -R www-data:www-data storage/*
5. ( OPSIONAL ) composer install
5. php artisan storage:link
6. php artisan migrate
7. php artisan migrate:fresh
8. php artisan db:seed --force
9. Lalu error minta guard, ketik php artisan shield:generate --all
10. php artisan project:init
11. chmod 777 -R storage/* && chmod 777 -R bootstrap/*