# Simple Booking

## About

this project an api project just for booking a room in certain date, that's simple

## Prerequisite

- mysql server
- git intalled
- composer installed
- php installed
- postman for testing 

## Instalation

1 - open cmd and navigate to any directory you want to install project in 

2 - just type 
```
git clone https://github.com/do7akhaled/simple-booking.git
```
3 - cd simple-booking

4 - install dependances

```
composer install
```

5 - copy env.example then rename it to just .env 

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

this endpint to show available rooms it accepts 4 paramters:

- **start** : the start date to filter result [format= "Y-m-d"] (optional, default is today)
- **end**   : the end date to filter result [format= "Y-m-d"] (optional, default is today)
- **take**  : to limit the result (optional, default = 1000)
- **skip**  : to skip some record from the result depending on it's order (optional, default = 0)


>**POST :** api/book-room

this endpoint to book a room, it accepts 3 paramters:

- **room_id** : the room_id we need to book
- **from**    : date to start booking (don't wory there is a validation to validate that date is in the future)
- **to**      : date to end booking (there is also a validation to validate that the date after or equals to from date)



## NOTES

- if you notices that all responses are automaticlly jsonified that's due to my middleware to jsonify all api responses

- my controllers are single invokable function then i decided to use **__invoke** magic method to just simplify the heading of naming method brrrrr (shy emoji)

- i tired to make exception in booking room to throw excpetion if room was booked, so i'm trying to menthion it here to highlight that, cause ohh yaah i'm trying show my muscles ooh, but who cares
( sad emoji :(   ), just kidding but realy i think it's the most suitable situation i should use exceptions 




