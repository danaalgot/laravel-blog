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
1. Follow the steps to [install tailwind.](https://tailwindcss.com/docs/guides/laravel)

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

## Controller commands
---
- php artisan make:controller Auth\\\register (makes a controller in a directory within the controllers)

## Using factories
---
Factories will add dummy content into your database for you.

- Make sure you create the factory when you create the model and migration with -f
- Add a definition to the factory. (See the user or post factory for a example)
- Open the terminal. Run php artisan tinker
    ```
    php artisan tinker
    ```
- Then run a command like the one below. (This one is creating posts with a user_id of 1)
    ```
    App\Models\Post::factory()->times(100)->create(['user_id' => 1]);
    ```
