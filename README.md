# A simpel CRUD Laravel app

This project was built with [Laravel](https://laravel.com/docs/9.x#installation-via-composer) and styling with [Bootsrap 5](https://getbootstrap.com).

I created this project to apply what I have learned during my classes.

Features:
- Authentication
- Pagination with DataTable+Bootstrap5
- Toast Notification
- CRUD
- Laravel Seeder

## To run

1. clone/download this project
2. cd to project folder
3. run `composer install` to install composer dependency
4. run `npm install` to install npm dependency
5. run `npm run dev` to compile assets (Mix)
6. copy .env.example to .env, and change the configuration as your machine.
7. run `php artisan key:generate` (if there is no key yet)
8. run your server, and create database (name same as in .env)
9. run `php artisan migrate`
10. run `php artisan db:seed` to seed the database with initial data
11. run your app directly or with `php artisan serv`

User Data (email/password):
`admin@gmail.com` : `123`
`buyer1@gmail.com` : `123`

Sample Demo Page

### Home page
![home](https://github.com/akmalcm/laravel-figure-app/blob/main/home.png)

### Form page
![form](https://github.com/akmalcm/laravel-figure-app/blob/main/form.png)

### List page
![list](https://github.com/akmalcm/laravel-figure-app/blob/main/list.png)

Credit: special thanks to Fariz Gaskin on his teachings.