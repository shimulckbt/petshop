1. Start xampp/wampp and start Apache, MySqL
2. Create database name as : petshop
3. Open the project in any code editor, start its terminal and run the following command
4. composer install
5. php artisan key:generate
6. cp .env.example .env
7. Open .env file and change 'DB_DATABASE=petshop'
8. Then run following command in the terminal:
9. php artisan serve
10. php artisan migrate:fresh --seed
11. login info: email: admin@admin.com
                password: password
