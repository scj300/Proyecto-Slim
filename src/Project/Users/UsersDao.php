<?php

namespace Project\Users;

use Project\Utils\ProjectDao;

class UsersDao // Data Acces Object
{

    private $dbConnection;


    public function __construct(ProjectDao $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }


    public function getAll()
    {

        $sql = "SELECT * FROM USERS";

        return $this->dbConnection->fetchAll($sql);

    }


    public function getID($id){

        $sql = "SELECT * FROM USERS WHERE ID=?";

        return $this->dbConnection->fetch($sql, array($id));

    }

    /**
     * @param $id
     * @param $name
     * @return User
     */
    public function newUser($id, $name)
    {

        $sql = "INSERT INTO USERS (Id, NAME, MAIL, PASSWORD, TOKEN) VALUES (?, ?, ?, ?, ?)";

        $params = array($id, $name, '$name@php.com', 'root', 'none');
        $id = $this->dbConnection->insert($sql, $params);

        return $this->getID($id);

       // $stm->execute(array($id, $name, '$name@php.com', 'root', 'none'));

    }


    public function updateUser($id, $user)
    {
        $sql = "UPDATE USERS SET name = ? WHERE id = ?";
        $this->dbConnection->execute($sql, array($id, $user));
    }

    public function delete($id){

        $sql = "DELETE FROM USERS WHERE id = ?";
        $this->dbConnection->execute($sql, array($id));
    }


    public function get_projects(){

        $sql = 'SELECT * FROM PROJECTS';

        return $this->dbConnection->fetchAll($sql);
    }


    public function add_newsletter($mail)
    {

        $sql = "INSERT INTO newsletter (mail) VALUES (?)";

        $id = $this->dbConnection->insert($sql, array($mail));

        return $mail;

    }


    public function delete_newsletter($mail){

        $sql = "DELETE FROM newsletter WHERE mail = ?";
        $this->dbConnection->execute($sql, array($mail));

        return $mail;
    }

    public function addProject($name, $description, $language)
    {

        $sql = "INSERT INTO PROJECTS (NAME, DESCRIPTION, LANGUAGE) VALUES (?, ?, ?)";

        $params = array($name, $description, $language);

        $this->dbConnection->insert($sql, $params);

        return $name;

    }

    public function deleteProject($name){

        $sql = "DELETE FROM PROJECTS WHERE name = ?";
        $this->dbConnection->execute($sql, array($name));

        return $name;
    }




}