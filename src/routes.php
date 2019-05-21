<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Project\Users\UsersController;

// Routes
$app->get('/users', UsersController::class .':getAll');

$app->get('/projects', UsersController::class .':get_all_projects');

$app->post('/project', UsersController::class .':add_newsletter');

$app->delete('/project/{mail}', UsersController::class .':delete_newsletter');

$app->post('/new-project', UsersController::class .':add_project');

$app->delete('/del-project/{name}', UsersController::class .':delete_project');


$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->get('/user/{id}', UsersController::class .':getById');
$app->post('/user', UsersController::class .':newUser');


