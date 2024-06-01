# Hotel Application

This is a Laravel-based REST API service for managing hotel information. It allows storing, retrieving, and searching hotel data along with room facilities. The project uses MySQL as the database and is designed to work with PHP 7.4 or later.

## Features

- CRUD operations for hotels, cities, and facilities
- Search and filter hotels by name, country code, city, and price per night
- Authentication using Laravel Sanctum
- Unit and API tests

## Prerequisites

- PHP 7.4 or later
- Composer
- Docker 
- Laravel Sail 

## Setup

### Clone the Repository

```bash
git clone https://github.com/yourusername/hotel-app.git
cd hotel-app

composer install

cp .env.example .env
php artisan key:generate

create database and rename it in .env file

php artisan migrate
php artisan db:seed

php artisan serve


API Endpoints
Authentication
Register: POST /api/register
Request Body: { "name": "your name", "email": "your email", "password": "your password" }
Login: POST /api/login
Request Body: { "email": "your email", "password": "your password" }

Hotels
Get All Hotels: GET /api/hotels
Query Parameters: name, country_code, city, price_per_night, sort_by
Get a Hotel: GET /api/hotels/{id}
Create a Hotel: POST /api/hotels
Request Body: { "name": "Hotel Name", "city_id": 1, "price_per_night": 100.00, "facilities": [ { "name": "Facility 1", "capacity": 2 } ] }
Update a Hotel: PUT /api/hotels/{id}
Request Body: { "name": "Updated Hotel Name", "city_id": 1, "price_per_night": 150.00 }
Delete a Hotel: DELETE /api/hotels/{id}

Cities
Get All Cities: GET /api/cities
Get a City: GET /api/cities/{id}
Create a City: POST /api/cities
Request Body: { "name": "City Name", "country_code": "US" }
Update a City: PUT /api/cities/{id}
Request Body: { "name": "Updated City Name", "country_code": "US" }
Delete a City: DELETE /api/cities/{id}

Facilities
Get All Facilities: GET /api/facilities
Get a Facility: GET /api/facilities/{id}
Create a Facility: POST /api/facilities
Request Body: { "name": "Facility Name", "capacity": 2 }
Update a Facility: PUT /api/facilities/{id}
Request Body: { "name": "Updated Facility Name", "capacity": 3 }
Delete a Facility: DELETE /api/facilities/{id}

Examples

Register a New User

curl -X POST http://localhost:8000/api/register -H "Content-Type: application/json" -d '{ "name": "ahmed wardany", "email": "wardany@example.com", "password": "password" }'

Login
curl -X POST http://localhost:8000/api/login -H "Content-Type: application/json" -d '{ "email": "wardany@example.com", "password": "password" }'

Create a Hotel

curl -X POST http://localhost:8000/api/hotels -H "Authorization: Bearer {token}" -H "Content-Type: application/json" -d '{ "name": "Hotel alexandria", "city_id": 1, "price_per_night": 200.00, "facilities": [ { "name": "Swimming Pool", "capacity": 50 } ] }'
