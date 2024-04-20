
# SOY18 Challenge

Although this project is implemented under a Laravel Framework, some assessments will be developed in a plain PHP file.

The reference document for these exercises is [Here](./Prueba%20Técnica%20SOY18.pdf)

### Installation instructions

After installing the repo move to the installation directory and run composer to install Laravel project

```
composer install
```

Rename environment file and configure Laravel app

```
cp .env.example .env
php artisan key:generate
php artisan optimize
php artisan migrate
```

To start the project server run in command line
```
php artisan serve
```

No you are able to access the app from the web navigator.

## Fizz Buzz

_Write a function that outputs the string representation of numbers from 1 to n. But for
multiples of three it should output “Fizz” instead of the number and for the multiples of five
output “Buzz”. For numbers which are multiples of both three and five output “FizzBuzz”._

I implemented it in a Service named FizzBuzz, and published both in a web route and a command line script.

To try it you can visit:
[FizzBuzz](http://127.0.0.1:8000/fizzbuzz/25)

Or run this command in the command line:
```
php artisan app:fizz-buzz 25
```

