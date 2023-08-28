## Laravel Simple User Management API 

The User Management System is an API that allows you to perform actions on users such as:
 - Display all users (GET method)
 - Display a specific user (GET method)
 - Add a new user (POST method)
 - Completely change user data (UPDATE method)
 - Change user password (PATCH method)
 - Delete a user (DELETE method)

For simplicity of testing the API, a json file with a collection of requests in the Postman is loaded

 ### How to start project
1. Change .env.example to .env and set database name as you like.
2. Set a database scheme and fill database 
```sh
php artisan migrate
php artisan db:seed --class=PeopleSeeder
```
3. Start the project
```sh
php artisan serve
```
