
# Online Journel

Kawi is a content management system that has two panels, front panel and admin panel.
 The whole project is contributed by me and created with pure PHP MVC framework with routing system using OO Design Pattern. You can also contribute me by adding new features.


## User Features

- Article Preview ordered by pinned, most viewed and timestamp
- Users can view articles sorted by genres
- Efficient and Useful search bar
- Subscribe newsletter
- Share on social media
- Commenting and Reacting ( Upcoming Feature )

## Admin Features

- Statistics Features for viewer per day and engagement for last three contents
- User Management Features like banning, verifying and removing new users, promotion and demotion roles
- CRUD Features for articles and categories
- Subscribers Management


## Demo

You can test user features here.

[Demo Website](http://kawis.social)
## Run Locally

Clone the project

```bash
  git clone https://github.com/4PHRODIT3/Kawi-Blog.git
```

Go to the project directory

```bash
  cd Kawi-Blog
```

Install dependencies

```bash
  composer install
  npm install
```

Create database via phpmyadmin or terminal and import my db that exists in main directory with extension '.sql'.

After this you need to setup configuration according to your environment. 

- First open /db_config.php and change your db credentials.
- Second open /core/boot.php and setup the fields.
- You don't need to do the next steps if you are running your project directory directly with http://localhost/index.php.
- You need to provide MAIN_FOLDER in /core/boot.php correctly if you are running project via htdocs folder. (Example - put your folder name with slash like "/Kawi-Blog").
- As a final step, you need to provide folder name in .htaccess file at line no.4.
- You can learn routes via /routes.php and Happy Testing!
Start the server with this if you are using default ubuntu apache2

```bash
  php -S localhost:8000
```
If you are using xampp or other web engines, open http://localhost/Kawi-Blog/
## Author

[@ Htet Myat Linn](https://github.com/4PHRODIT3)