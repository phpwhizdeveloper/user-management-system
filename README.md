# User Management Dashboard

A **dynamic single-page application** built with Laravel, displaying users in a responsive card layout. Users can be filtered by **type** using an AJAX-based dropdown. Admin users are excluded from the display.  

## Features

- Display all normal users in a **responsive card layout**.  
- Filter users by **type** without reloading the page using AJAX.  
- Modern and clean **single-page UI** with core CSS.  
- Supports dynamic data from the database (users, types).  

## Requirements

- PHP >= 8.1  
- Composer  
- MySQL or MariaDB  
- Laravel 10.x  
- Node.js & NPM (optional, if using Laravel Mix or Vite)  

## Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/user-management-dashboard.git
   cd user-management-dashboard
````

2. **Install dependencies**

   ```bash
   composer install
   ```

3. **Copy `.env` file**

   ```bash
   cp .env.example .env
   ```

4. **Configure database**

   * Open `.env` and set your database credentials:

     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_db_user
     DB_PASSWORD=your_db_password
     ```

5. **Generate application key**

   ```bash
   php artisan key:generate
   ```

6. **Run migrations and seeders**

   ```bash
   php artisan migrate --seed
   ```

   > Make sure you have `types` and `users` seeded or manually inserted for testing.

7. **Create storage link**

   ```bash
   php artisan storage:link
   ```

8. **Run the development server**

   ```bash
   php artisan serve
   ```

   The app will be available at `http://127.0.0.1:8000`.

## Usage

* Open the homepage to see all **normal users** displayed as cards.
* Use the **Type dropdown** at the top to filter users dynamically.
* Admin users (`is_admin = 1`) will not be shown.

## Relationships

* `User` belongs to `Type` (`type_id`).
* Only users with `is_admin = 0` are shown in the UI.
````
## Screenshots
<img width="1918" height="926" alt="ss1" src="https://github.com/user-attachments/assets/fb6f2a9d-3b5b-4b40-835c-2ea0fae22a44" />
<img width="1919" height="848" alt="ss2" src="https://github.com/user-attachments/assets/0278cfc7-c1e1-4543-9260-b357cd5befdc" />
<img width="1919" height="847" alt="ss3" src="https://github.com/user-attachments/assets/622d7e23-e790-470f-bdd8-2291795dc563" />
<img width="1919" height="847" alt="ss4" src="https://github.com/user-attachments/assets/240712af-0e72-4240-9bb3-ef9d3372ce24" />
<img width="1910" height="851" alt="ss5" src="https://github.com/user-attachments/assets/0bfcd184-f4aa-4cf4-81ef-92947dfa0e3d" />
<img width="1919" height="920" alt="ss6" src="https://github.com/user-attachments/assets/f2bf07d8-aee0-4c3b-af79-7fde7fd5eb1b" />


