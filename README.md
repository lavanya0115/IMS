## About Inventory Management System

Guide for install and run the project

-   [x] Clone the project in your local machine
    -   If you've using laragon, clone the project in the `www` folder.
-   [x] Install the composer and NPM dependencies
    -   Run the `composer install` and `npm install` command.
-   [x] Create an empty database for our application
-   [x] Copy the .evn.example file to .env and update the database configuration
# for PostgreSQL connection  
        # DB_CONNECTION=pgsql
        # DB_HOST=127.0.0.1
        # DB_PORT=5432
        # DB_DATABASE=inventory-management-system
        # DB_USERNAME=postgres --(your username)
        # DB_PASSWORD=hello  --(your password)

-   [x] Generate an app encryption key
    -   Run the `php artisan key:generate` command.
-   [x] Migrate the database
    -   Run the following command for migrate the database `php artisan migrate`.
-   [x] Seed the database
    -   Run the following command for seed the database `php artisan db:seed`.
-   [x] Run the project by using vite

    -   Copy current app domain and paste it in the `APP_URL` variable in the `.env` file.
    -   Run the `npm run dev` command.

-   Roles and permissions
    Only one super_admin was created via the database seeder.
    Only super admin has the rights to create many more admins in `User` tab.
    Only the admin can create,update,delete and view the inventory items.

### Login with the following credentials

-   Username: `tara@gmail.com`
-   Password: `password`

# IMS
