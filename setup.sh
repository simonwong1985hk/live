# install php dependencies
composer install

# create .env
cp .env.example .env

# set the application key
php artisan key:generate

# for mac which installed valet
sed -i '' 's/http:\/\/localhost/https:\/\/live.test/g' .env
sed -i '' 's/DB_DATABASE=laravel/DB_DATABASE=live/g' .env
sed -i '' 's/DB_USERNAME=root/DB_USERNAME=root/g' .env
sed -i '' 's/DB_PASSWORD=/DB_PASSWORD=root/g' .env
sed -i '' 's/MAIL_HOST=mailhog/MAIL_HOST=localhost/g' .env

# migrate database
php artisan migrate

# install node dependencies
npm install

# compile assets
npm run dev