# warranty-manager
This application is made using Laravel 10 with a Jetstream kit that comes with livewire components. the idea of this project is to manage folders of warranties, Each user has a folder where a bunch of information about the user is collected and calculate how much he should pay in the warranty.

# Requirements
- php >= 7.4
- Laravel = 8.4
 
# Instruction to install the application
```
git clone ...
cd peer-to-peer-car-location
composer install
npm install
php artisan migrate
```
> Don't forget to copy the env file and enter a valid database name before migration.  
> After creating .env file please run this command to generate an application key 
```
php artisan key:generate
```

# Functionalities
- Manage users
- Manage folders.
- Dashboard and live notifications about the urgent folders.
- Comment and note system.
