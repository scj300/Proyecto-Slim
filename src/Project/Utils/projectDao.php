<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 2019-03-19
 * Time: 09:13
 */


namespace Project\Utils;


interface ProjectDao {

    public function fetchAll($sql, $params = null);

    public function fetch($sql, $params = null);

    public function execute($sql, $params = null);

    public function insert($sql, $params = null);


}