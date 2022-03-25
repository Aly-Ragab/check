<?php

namespace Repositories;
require_once '../database/MySQLConnection.php';

use Database\MySQLConnection;

class UsersRepository
{
    /**
     * @var MySQLConnection
     */
    private $connection = null;

    public function __construct()
    {
        $this->connection = MySQLConnection::getInstance();
    }

    /*
          @description Login function which controls login and check the username of password of logged user
          @param string $username username
          @param string $password password
          @return bool
         */
    public function login(string $username, string $password): bool
    {
        $check_login_sql = "SELECT * FROM users WHERE uname=? AND password=?";

        $this->connection->queryExecute($check_login_sql, 'ss', array($username, $password));
        return $this->connection->numRows();

    }
}