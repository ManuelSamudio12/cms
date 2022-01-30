## Cat Management System

Cat Management System (CMS), is a web application build in Laravel 8 that helps you manage and track your beautiful cats.


### Installation Steps

- Clone this project
- Go to folder application using cd command on your terminal
- Run composer install on your terminal
- Copy .env.example file to .env on the root folder.
- Open your .env file and change the database name (DB_DATABASE), username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- Add your google api key to .env file (GOOGLE_API_KEY)
- Run php artisan key:generate
- Run php artisan storage:link
- Run npm install 
- Run npm run dev
- Run php artisan migrate
- Run php artisan db:seed
- Run php artisan serve
- Navigate to http://127.0.0.1:8000/

### Usage

- You can log in with the following credentials: jack@test.com / password
- If you wish to create your own account you can navigate to /register
- After log in you will be redirected to the dashboard view were you can view, create or delete your cats.
