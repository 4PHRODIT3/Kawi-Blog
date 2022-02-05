<?php

/*
    * Routes for all Users and Non-users
*/
$router->get('', [HomeController::class,'index']);


$router->get('user/login', [UserController::class,'login']);
$router->get('user/register', [UserController::class,'register']);
$router->post("user/register", [UserController::class,'createUser']);
$router->post("user/login", [UserController::class,'loginUser']);
$router->get("user/logout", [UserController::class,'logoutUser']);

/*
    * Routes for only Super User (Admin)
*/
$router->get("user/admin", [UserController::class,'adminPanel']);
$router->get("category", [CategoryController::class,'index']);
$router->post("category", [CategoryController::class,'createCategory']);
$router->get("category/manipulate", [CategoryController::class,'manipulateCategory']);
$router->post("category/manipulate/edit", [CategoryController::class,'editCategory']);
$router->get("category/manipulate/delete", [CategoryController::class,'deleteCategory']);
$router->get("user", [UserController::class,'index']);
$router->get("user/manipulate/role", [UserController::class,'updateRole']);
$router->get("user/manipulate/ban", [UserController::class,'banUser']);


/*
    * Routes for only Super User (Admin) and Authors
*/
$router->get("article", [ArticleController::class,'index']);
$router->post("article", [ArticleController::class,'createArticle']);
$router->get("article/manipulate", [ArticleController::class,'mainpulateArticle']);
$router->get("article/manipulate/edit", [ArticleController::class,'editArticle']);
$router->post("article/manipulate/edit", [ArticleController::class,'updateArticle']);
$router->get("article/manipulate/delete", [ArticleController::class,'deleteArticle']);
$router->get("articles", [ArticleController::class,'previewArticle']);
