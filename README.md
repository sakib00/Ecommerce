# Ecommerce

![Home page](/public/images/Homepage.png)

This was an university group project for the semester of Spring'20. I worked on both the front-end and back-end of the project. For the front-end of the I worked on developing various views like, homepages, product pages and other pages using HTML, SCSS and Bootstrap. And for the back-end of the website, I worked on various controller functions, migrations and seeders.

_status: Complete_

## Installation

After you have cloned the repo, run **composer install and npm install** to install the dependencies.

```bash
composer install 

npm install
```

Create a copy of the .env file and generate a key

```bash
cp .env.example .env

php artisan key:generate
```
Then update the database name from the .env file

and run **php artisan migrate:refresh --seed** to seed the database

```bash
php artisan migrate:refresh --seed
```

Finally run **php artisan serve** to run the project 

```bash
php artisan serve
```
