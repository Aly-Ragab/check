<?php
namespace Controllers;

require_once '../services/LoginService.php';
require_once '../requests/LoginRequest.php';

use Services\LoginService;
use Requests\LoginRequest;

class LoginController
{
    /**
     * @descrtiption the login try and save the session login success
     * @param string $username the logged username
     * @param string $password the logged password
     * @return bool 0 or 1
     */
    public function login(
        string $username,
        string $password
    ): bool
    {
        $service = new LoginService();
        return $service->execute(new LoginRequest(['uname' => $username, 'password' => $password]));
    }

    /*
      @description destroy session and logout from the system
      @return int 0
     */

    public function logOut(): bool
    {
        session_destroy();
        return 0;
    }
}