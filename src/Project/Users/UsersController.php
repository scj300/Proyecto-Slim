<?php

namespace Project\Users;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class UsersController
{
    private $dao;

    public function __construct(ContainerInterface $container)
    {
        $dbConnection = $container['dbConnection'];
        $this->dao = new UsersDao($dbConnection);
    }


    public function getAll(Request $request, Response $response, array $args)
    {
        $users = $this->dao->getAll();

        return $response->withJson($users);
    }


    public function get_all_projects(Request $request, Response $response, array $args)
    {
        $users = $this->dao->get_projects();

        return $response->withJson($users);
    }


    public function add_newsletter(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $mail = $body['mail'];
        $newUser = $this->dao->add_newsletter($mail);

        return $response->withJson($newUser);
    }


    public function delete_newsletter(Request $request, Response $response, array $args)
    {

        $mail = $args['mail'];
        $this->dao->delete_newsletter($mail);

        return $response->withStatus(204);
    }

    public function add_project(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $name = $body['name'];
        $description = $body['description'];
        $language = $body['language'];

        $newProject = $this->dao->addProject($name, $description, $language);

        return $response->withJson($newProject);
    }

    public function delete_project(Request $request, Response $response, array $args)
    {

        $name = $args['name'];
        $this->dao->deleteProject($name);

        return $response->withStatus(204);
    }



    public function getByID(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $user = $this->dao->getID($id);

        return $response->withJson($user);

    }

    public function newUser(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $id = $body['id'];
        $name = $body['name'];
        $newUser = $this->dao->newUser($id, $name);

        return $response->withJson($newUser);

    }

    public function updateUser(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $body = $request->getParsedBody();
        $user = $this->dao->updateUser($id, $body);

        return $response->withJson($user);
    }

}