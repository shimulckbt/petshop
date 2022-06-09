1. Install node and php version 8.1 with latest xampp/wampp
2. Start xampp/wampp and start Apache, MySqL
3. Create database name as : petshop
4. Open the project in any code editor, start its terminal and run the following command
5. composer install
6. php artisan key:generate
7. cp .env.example .env
8. Open .env file and change 'DB_DATABASE=petshop'
9. Then run following command in the terminal:
10. php artisan serve
11. php artisan migrate:fresh --seed
12. login info: email: admin@admin.com
                password: password
