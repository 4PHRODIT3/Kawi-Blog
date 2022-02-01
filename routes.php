<?php


$router->get('', [HomeController::class,'index']);
$router->get('user/login', [UserController::class,'login']);
$router->get('user/register', [UserController::class,'register']);
$router->post("user/register", [UserController::class,'createUser']);
$router->post("user/login", [UserController::class,'loginUser']);
$router->get("user/admin", [UserController::class,'adminPanel']);
$router->get("user/logout", [UserController::class,'logoutUser']);
$router->get("category", [CategoryController::class,'index']);
$router->post("category", [CategoryController::class,'createCategory']);
$router->get("category/manipulate", [CategoryController::class,'manipulateCategory']);
$router->post("category/manipulate/edit", [CategoryController::class,'editCategory']);
$router->get("category/manipulate/delete", [CategoryController::class,'deleteCategory']);
