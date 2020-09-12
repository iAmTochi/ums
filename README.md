#UMS
 Simple User Management System
  
 ## Installation
 * Clone Repo
 * Install packages
 
 ```bash
 composer install
 ```
 
 * Duplicate `.env.example`
 
 ```bash
 cp .env.example .env
 ```


 * Create a database called 'user'
 * Update database credentials
 ##

 
 * Update mailtrap credentials - 
 Sign Up [here](https://mailtrap.io/) to get your mailtrap credentials
 
 * Generate app key
 
 ```bash
 php artisan key:generate
 ```
 
 
 * Run Migrations
 
 ```bash
 php artisan migrate
 ```
 * Start Ums
 
 ```bash
 php artisan serve
 ```



