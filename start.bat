%systemDrive%\xampp\mysql\bin\mysql -uroot -e "CREATE DATABASE IF NOT EXISTS royal_repast;"

if %errorlevel% neq 0 msg %username% "Nie udalo sie utworzyc bazy danych." && exit /b %errorlevel%

php -r "copy('.env.example', '.env');"

call composer install

call DBrefresh.bat

call php artisan key:generate

call php artisan storage:link

call php artisan serve

code .