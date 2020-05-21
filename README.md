# Recipe Manager
![Backend](https://github.com/KristianWEB/recipe-manager/workflows/Backend/badge.svg) ![Frontend](https://github.com/KristianWEB/recipe-manager/workflows/Frontend/badge.svg)

# Screenshots
**Home page:**
![Home page](https://github.com/KristianWEB/recipe-manager/blob/master/public/images/home.PNG)

**Storage page:**
![Storage page](https://github.com/KristianWEB/recipe-manager/blob/master/public/images/storage.PNG)


Recipe Manager is a web application which helps you find and store your best meals:
 * **First:** the app provides you decent ` chocolate ` recipes just to show you how it's done
 
 * **Detailed searching:** If you want to browse something more than a chocolate, use the ` detailed search form ` to find the best recipe for your family dinner, lunch or whatever.
 
 * **Custom recipe builder:** The app provides you with ` custom recipe builder ` just in case you prefer to store your recipes online so you don't need to be scared where you left your diary before cooking a meal for your loved ones.
 
 * **Cross-platform:** The app is ` fully responsive ` and that means that you can use it from your phone exactly before cooking a meal or on your computer when you want to research what you are going to cook in the future.
 
 ### [UI Design done with Figma](https://www.figma.com/file/057VEmJbHkhO1pCIvRvdrq/Recipe-Manager-Recipes?node-id=0%3A1)
 
 ## Local installation
 > You need the following tools before cloning:
    
      PHP 7+ , Composer ( XAMPP is preferred )
      MySQL
      Node
    
> install Laravel & Vue packages

```shell
 composer install
 npm install
```

> Laravel setup

Using the pre-made ` .env.example ` duplicate it and create a ` .env ` file and run the following commands + write into .env your database properties:

    - php artisan jwt:secret
    - php artisan migrate ( setup backend database first and then write in the parameters )

> Edamam setup

[Go to Edamam's developer page](https://developer.edamam.com/) and sign-up for a ` Recipe Search ` account. After that go to Dashboard > Applications > View > Copy Application ID and Application Key and paste them into .env the following way:
   
    MIX_APP_ID={YOUR EDAMAM APP ID}
    MIX_APP_KEY={YOUR EDAMAM APP KEY}

> Vue setup
  After you have setup the Laravel backend, run the following command:
  
     - npm run dev
     - npm run hot

> View project

  You can view the project in 2 ways:

  * By using php integrated server ( ` php artisan serve ` )
  * [By using XAMPP + apache vhosts + hosts setup](youtube.com/watch?v=H3uRXvwXz1o)
