# Task Planner
System which logs time for tasks. Built in Laravel 8.
## Functionality 
1. User can create tasks and log time for them
2. User only can access only their created tasks
## Installation instructions. For both enviromentns
-  Clone the repository with ```git clone```
### Windows localhost
* Copy ```.env.example``` file to ``.env`` and edit database credentials there
* Run ```composer install```
* Run ```php artisan key:generate```
* Run ```php artisan migrate``` 
* Run ```npm install && npm run dev```. Warning: ```npm run dev``` must be launched again to generate webpack mix file.
### Docker
* Go to project's laradock folder ```cd taskplanner-laradock```
* Run ```docker-compose up```. For the first time it took some time to install project's containers.
* Run ```docker-compose exec workspace bash```
* Copy ```.env.example``` file to ``.env`` and edit database credentials there with ```cp .env.example .env```
* In ```.env``` file. Do changes in these lines: 
- ```DB_HOST=127.0.0.1``` to   ```DB_HOST=taskplanner_mysql_1```
- ```DB_PASSWORD=``` to   ```DB_PASSWORD=root```
* In the MySQL Workbench create database with name ```taskplanner```
* Run ```composer install```
* Run ```php artisan migrate``` 
* Run ```npm install && npm run dev```. Warning: ```npm run dev``` must be launched again to generate webpack mix file.
## Final step
- That's it: launch the main URL (Windows: localhost:8000, Docker: localhost )
