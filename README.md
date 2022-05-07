1. Install node and php version 8.1 with latest xampp/wampp
2. Start xampp/wampp and start Apache, MySqL
3. Create database name as : petshop
4. Open the project in any code editor, start its terminal and run the following command
5. composer install
6. npm install
7. npm run dev
8. cp .env.example .env
9. Open .env file and change 'DB_DATABASE=petshop'
10. Then run following command in the terminal:
11. php artisan serve
12. php artisan migrate --path=database/migrations/2022_05_04_161517_create_roles_table.php
13. php artisan migrate --seed
14. login info: email: admin@admin.com
                password: password
