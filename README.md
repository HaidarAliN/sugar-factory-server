# The Sugar Factory Server
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">

## Features

- ### Admin Side:
- Login
- Able to approve / decline uploaded pictures before displaying to the recipient.
- Able to approve / decline messages before displaying to the recipient.
- ### Users:
- Login / Signup
- Upload pictures
- Search and meet other users
- Tap (favorite) someone
- When there is a match (User A favorites User B and B favorites A), both users will be notified.
- Users are able to text (send messages) to matched users only.


## Tech

- [Laravel] - A web application framework with expressive, elegant syntax.
- [JWT] - For authentication using JSON Web Tokens
- [React WebApp] - The admin frontend.
- [React Native App] - The user application.



## Installation

Installcomposer on your machine using the following link: <br />
<a href="https://getcomposer.org/download/">Composer download</a>

Clone the repository:

```sh
git clone https://github.com/HaidarAliN/sugar-factory-server.git
```
In the command line, run:

```sh
cd sugar-factory-server
composer update
```

Copy the example env file and make the required configuration changes in the .env file

```sh
cp .env.example .env
```

Generate a new application key

```sh
php artisan key:generate
```

Generate a new JWT authentication secret key

```sh
php artisan jwt:generate
```

Run the database migrations (Set the database connection in .env before migrating)

```sh
php artisan migrate
```

Start the local development server

```sh
php artisan serve
```

You can now access the server at http://localhost:8000

## Database seeding
Populate the database with seed data with relationships which includes users, courses, uploaded materials, quizzes, questions and submissions. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.

Run the database seeder and you're done
```sh
php artisan db:seed
```
Note : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

```sh
php artisan migrate:refresh
```

**You can now use the server**


[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [JWT]: <https://www.positronx.io/laravel-jwt-authentication-tutorial-user-login-signup-api/>
   [React WebApp]: <https://github.com/HaidarAliN/sugar-factory-admin-frontend.git>
   [React Native App]: <https://github.com/HaidarAliN/sugar-factory-user-frontend.git>
   [Laravel]: <https://laravel.com/>

