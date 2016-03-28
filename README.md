# BlogSystem v1.0.0

This is a simple blog system as a first project using Symfony 2. It hasn't any frontend excepting
a login screen. There you're able to sign into the admin area where you can manage all your blog
posts.

## Requirements

This version requires PHP v5.6 and a MySQL database.

## Setup

Before you can start using this blog post, you have to prepare your database.
Just enter this url in your browser:

    http://your-domain.com/setup

There you'll find the button to start the installation. Afterwards, you're ready 
to start working with this system.

## Admin login

In this version the system uses a in memory user management. Just enter ``admin``
as your email and ``admin`` for your password.

## Running it locally

    NOTE: This was tested on Mac OS X!

In case you want to use this app locally, maybe because you wish to use this system
as a foundation for your own development, here is a brief description about a way
how you could achieve it:

Download and instal XAMPP to have a working PHP 5.6 environment and mysql:
https://www.apachefriends.org/index.html

- Start your mysql server.
- Start a local PHP server in your terminal:

    php app/console server:run

Now you can open the url in your browser and test the system.

## Branches

This project is separated into two branches:

###master 

Includes the most stable version

###dev 

Includes some new features but isn't tested yet and therefore it's possible that it includes 
some bugs. It isn't recommended to use this version in your production environment.

## Third Party 

This system is based on those following third party libraries/Frameworks:

- Symfony v2.8.3 (https://symfony.com/)
- GLYPHICONS (http://glyphicons.com/)
- Bootstrap v3.3.6 (http://getbootstrap.com/)

You don't have to worry about how to install them into your project because those will
be added via CDN url for a better front page performance.

