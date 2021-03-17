## Aim: ##

This is my first Laravel web app. Since nutrition is a personal interest of mine, I was inspired by the popular MyFitnessPal app and I decided to create my own version of it.
I made this app with the aim of getting familiar with Laravel and backend development in general.

This project is meant to reflect most of what I've learned over the past half year, including CRUD, authentication, as well as basic frontend skills in JavaScript/jQuery, responsive design and using CSS frameworks (TailwindCSS in this case).




## Description: ##

With this app, users can log their food intake and monitor the amount of calories and nutrients they consume.
By using the *diet* feature, a user can set a *weight goal*, to which the app will calculate how long users will need to consume a certain number of calories/nutrients in order to achieve that goal.




## Languages/systems/frameworks used: ##

- Laravel/PHP
- JavaScript/jQuery/Vue.js
- CSS/TailwindCSS
- MySQL




## Instructions: ##

- `git clone` repo
- `npm install && npm update`
- `composer install && composer update`
- Rename `.env.example` to `.env`
- `php artisan key:generate`
- Create database
- Add database name and credentials to `.env`
- `php artisan migrate:fresh --seed`
- `npm run dev`
- `php artisan serve`

Either create a new account, or (if seeded) login by using a demonstration account with the following credentials:

*Username*: demo

*Password*: demopass

You can then start a Log by clicking the *Create Log* button.
Select the product you wish to log, or create a new Product.
You will then be taken to the *Create Log* page in which you can enter the quantity you have just consumed. Nutritional values will be adjusted accordingly.

The sum of nutritional values of Logs on a particular day will make up your *Current Total* as displayed on the *Dashboard*.
Your *Required Intake* shows the numbers still needed in order to hit your daily nutritional goal.
The pie charts on the Dashboard show the ratio of macronutrients you have consumed so far, as well as an 'ideal' ratio for fitness purposes that is based on scientific research.

By default, *Required Intake* is set to *maintenance*, this can be changed by setting a *diet*.
Depending on your dietary goal, this either lowers or raises your daily required number of calories and macro's for a length of time, which in turn depends on a variety of biological factors as well as your activity level.
Diets end automatically once the end date has been met, but they can also be ended prematurily.




## Screenshots: ##

![Alt text](/screenshots/newyou0.jpg?raw=true "preview")

![Alt text](/screenshots/newyou1.jpg?raw=true "preview")

![Alt text](/screenshots/newyou2.jpg?raw=true "preview")

![Alt text](/screenshots/newyou3.jpg?raw=true "preview")

![Alt text](/screenshots/newyou4.jpg?raw=true "preview")

![Alt text](/screenshots/newyou5.jpg?raw=true "preview")
