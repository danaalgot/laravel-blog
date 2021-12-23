# Laravel Blog

Learning about laravel by creating a blog application.

## Setting up your environment for Laravel
---

1. Ensure you have [composer](https://getcomposer.org/download/) installed:
You can install this globally or locally (where you want to create your project)
2. From the terminal, move into the directory you want to create your project in.(cd desktop/projects)
3. Create your project by entering the command below in your terminal 
    ``` 
    php composer.phar create-project laravel/laravel my-project 
    ```

## Setting up Tailwind CSS
---
1. Open terminal within your project 
2. Install all npm packages with 
    ``` 
    npm install 
    ```
3. Install tailwind by entering the following commands in the terminal
    ```
    npm install -D tailwindcss postcss autoprefixer
    npx tailwindcss init
    ```
4. Add laravel to your webpack.mix.js file
    ```
    require("tailwindcss")
    ```
5. Configure your template paths in the tailwind.config.js file
    ```
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    ```
6. Add directives to your resouces/css/add.css file
    ```
    @tailwind base;
    @tailwind components;
    @tailwind utilities;
    ```
7. In the terminal, run
    ```
    npm run dev OR npm run watch (if dev doesn't work)
    ```

## Connecting your database
---
1. Go into the .env file and change the following settings. I'm using phpmyadmin from my hosting on WHC.ca. Make sure if you are working from a different place, to add your IP address to your remote MySQL settings thought cPanel.
    ```
        DB_HOST=beaudry.whc.ca
        DB_DATABASE=db_name
        DB_USERNAME=username
        DB_PASSWORD=password
    ```

## Database migration commands
---
- php artisan migrate
- php artisan migrate:rollback


