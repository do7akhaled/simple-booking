# Simple Booking

this is an api project just for booking a room in certain date, that's simple

## Prerequisite

- mysql server
- git installed
- composer installed
- php installed
- postman for testing 

## Installation

1 - open cmd and navigate to any directory you want to install project in 

2 - just type 
```
git clone https://github.com/do7akhaled/simple-booking.git
```
3 - cd simple-booking

4 - install dependencies

```
composer install
```

5 - copy ***env.example*** then rename it to just ***.env***

6 - create a database in your mysql server then update the database name in .env

7 - run command to generate application keys

```
php artisan key:generate
```

8 - run migration and seeders

```
php artisan migrate --seed
```

9 - run the server

```
php artisan serve
```

and vooolaaaa


## Api

I built this application with only two endpoints 

> **GET :** api/get-available-rooms

this endpoint to show available rooms it accepts 4 parameters:

- **start** : the start date to filter result [format= "Y-m-d"] (optional, default is today)
- **end**   : the end date to filter result [format= "Y-m-d"] (optional, default is today)
- **take**  : to limit the result (optional, default = 1000)
- **skip**  : to skip some record from the result depending on it's order (optional, default = 0)





>**POST :** api/book-room

this endpoint to book a room, it accepts 3 parameters:

- **room_id** : the room_id we need to book
- **from**    : date to start booking (don't worry there is a validation to validate that date is in the future)
- **to**      : date to end booking (there is also a validation to validate that the date after or equals to from date)


The [Postman_Collection](https://www.getpostman.com/collections/b6d27192aac73614715c)

## NOTES

- if you notice that all responses are automatically jsonify that's due to my middleware to jsonify all api responses

- my controllers are single invokable function then I decided to use **__invoke** magic method to just simplify the heading of naming method brr-rrr :sweat_smile:

- I tired to make exception in booking room to throw exception if room was booked, so I'm trying to mention it here to highlight that, cause ohh yeah I'm trying to show my muscles ooh, but who cares
  :pensive: :cry: , just kidding,  but really I think it's the most suitable situation I should use exceptions 




