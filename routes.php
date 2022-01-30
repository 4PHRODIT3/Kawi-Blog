<?php


$router->get('', [HomeController::class,'index']);
$router->get('user/login', [UserController::class,'login']);
$router->get('user/register', [UserController::class,'register']);
$router->post("user/register", [UserController::class,'createUser']);
$router->post("user/login", [UserController::class,'loginUser']);
$router->get("user/admin", [UserController::class,'adminPanel']);
$router->get("user/logout", [UserController::class,'logoutUser']);
