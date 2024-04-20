
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

## Top K Frequent Elements

_Given a non-empty array of integers, return the k most frequent elements._

Note:

_You may assume k is always valid, 1 ≤ k ≤ number of unique elements. Your algorithm's time
complexity must be better than O(n log n), where n is the array's size._

I implemented a service named TopKElements, where I process the elements array in order to get an array with the frequency 
or appearance of each number in the elements array.
In order to reach a better time complexity than O(n log n) I distributed the elements into buckets based on its frequency,
and finally collect the k most frequent elements.

To try it, you can visit:
[Top K Elements](http://127.0.0.1:8000/top_k_elements/2/1,3,4,4)

Or run this command in the command line:
```
php artisan app:top-k-elements 2 1,3,4,4
```

