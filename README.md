Clone the repository
```
git clone https://github.com/dinith26/dinith26-library_api.git
```

Install all the dependencies using composer
```
composer install
```

Copy the example env file and make the required configuration changes in the .env file (database : mysql)
```
cp .env.example .env
```

Run the database migrations (Create new databse and set the database connection in .env before migrating)
```
php artisan migrate
```

Start the local development server
```
php artisan serve
```

