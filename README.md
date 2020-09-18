# RestauLav
A Restaurant Featuring Demo App -User | Admin 

Built with Laravel 7.25.
Practised an idea of using a single login page to authenticate both Admins and Users and have them redirected to specific dashboards. That implies that loginController and registerController's  $redirectTo property has no actually value but it determined by the account's role using a little function written on the User Model. And the redirect function on authenticate.php which is in Middleware has been modified to suit the condition. Laravel Socialite using Github Login Interface as implementation tool was was as a means to authenticate users which directly redirects them to the user dashboard. 
Made Use of packages like UniSharp FileManager, htmlCollective, disqus, sluggable, srmklive/PayPal, Socialite(Using Github Login Interface),  dropzone and ...




Note:
The project needs you to manually creates 3 records on your roles after migration; Admin,Subscriber and Staff. This aids the project to function properly for now till I modify it later. 

The PayPal Integration will require you to have some credentials information which will be passed on .env file. Credentials like:

PAYPAL_MODE=sandbox --
PAYPAL_SANDBOX_API_USERNAME=  --
PAYPAL_SANDBOX_API_PASSWORD=  --
PAYPAL_SANDBOX_API_SECRET=  --
PAYPAL_CURRENCY=USD  --
PAYPAL_SANDBOX_API_CERTIFICATE=


To use Socialite(Github Login as I used), you'll need some credentials on your .env file. You'll need to create a github app so as to get this. Check out the documentation on : https://laravel.com/docs/7.x/socialite

GITHUB_CLIENT_ID = --
GITHUB_CLIENT_SECRET = --

You can see this on your PayPal Developer Accounts when you try viewing/editing any of your sandbox accounts.
Reconfigure the file on config/paypal.php to your wants and the little functions on the PayPalController.
--- This is just a practical demo, should in case you want to use it for production consider adjusting it to your ... | still on building trials | 






## Built with
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




