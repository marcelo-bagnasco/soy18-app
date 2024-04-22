
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

## Longest Consecutive Sequence

_Given an unsorted array of integers, find the length of the longest consecutive elements
sequence. The algorithm should run in O(n) complexity_

I implemented this solution in a Service called LongestSequence, where I first create a keymap where the elements are the keys 
for this new array and then, I iterate through each element of the received array and check if is a new sequence of consecutive
numbers. 

I keep the longest sequence number, while testing the rest of the collection. The algorithm has a complexity of O(n) being
n the number of elements in the array, as it iterates through the array only once.

To try it, you can visit:
[Longuest consecutive sequence](http://127.0.0.1:8000/longest_sequence/14,5,1,100,3,4,4,2)

Or run this command in the command line:
```
php artisan app:longest-sequence 14,5,1,100,3,4,4,2
```

## Basket Prices

_Create a service using the middleware pattern to calculate the basket price. Given an array
of ProductItems and the User, create a service where you can provide different rules to
calculate the final basket price_

_The Rules will be:_
- _If the User is less than 21 years old, he has 15% of total discount._
- _If he bought more than 3 items of the same product, you have a 5% discount (This offer only applies for this product)._
- _If the total amount is over 100$, you have a 20% of total discount._

I implemented 3 middlewares to be used in the route where the total basket price is calculated.
One Middleware for each discount rule, so if we need to add a new discount rule it will be enough to add a new middleware 
and assign it to the required route.
These classes work directly from the basket items, and modify the request (for example usage, I added the basket items to 
the request in the Controller constructor, it will be necessary to modify this in a final implementation)

The example basket items is configured with this array:
```
$basketItems = [
    [
        'id' => 1,
        'item' => 121,
        'description' => 'Mouse pad',
        'qty' => 1,
        'price' => 20,
    ],
    [
        'id' => 2,
        'item' => 143,
        'description' => 'Monitor',
        'qty' => 2,
        'price' => 40,
    ],
    [
        'id' => 3,
        'item' => 135,
        'description' => 'Notebook Lenovo',
        'qty' => 1,
        'price' => 60,
    ],
    [
        'id' => 4,
        'item' => 34,
        'description' => 'Keyboard',
        'qty' => 4,
        'price' => 10,
    ],
];
```

To try this example, you can visit:
[Basket Prices](http://127.0.0.1:8000/basket_price)

## Laravel Party

_Given two databases one of those with a table Users (id, name, email) another one with a
table Exam (id, user_id, exam_date, updated_at, created_at, deleted_at). Create the Laravel
models with the relationships between both tables._

I implemented a new connection to the database in the config/database.php configuration file, and added a new environment 
variable (keep track about the new DB_SECOND_DATABASE env variable in the .env.example).
When creating the new Exam model I established that this model is implemented in the new db connection, while in the User 
model I established that the model is implemented in the first database connection.

The rest of the implementation is identical to a common related db model of User and Exams.

To try this example, I created a factory and a seeder, so it's possible to check the usage using the tinker tool.

First you need to install the new database schema:
```
 php artisan migrate:fresh --seed
```

Now, you can check that the user info can be fetched from the exam model in the Tinker tool:
```
php artian tinker
```

Inside tinker:
```
$examObj = new App\Models\Exam();

## Fetch first exam info
$examObj->first();

## Fetch first exam users info
$examObj->first()->user()->first();
```
