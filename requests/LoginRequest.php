<?php

namespace Requests;
require_once '../contracts/iRequest.php';


use Contracts\iRequest;

class LoginRequest implements iRequest
{

    /**
     * @var string
     */
    private $uname = '';
    /**
     * @var string
     */
    private $password = '';

    public function __construct(array $inputs)
    {
        $this->password = $inputs['password'];
        $this->uname = $inputs['uname'];
    }

    /**
     * @return string
     */
    public function getUname(): string
    {
        return $this->uname;
    }

    /**
     * @param string $uname
     * @return LoginRequest
     */
    public function setUname(string $uname): self
    {
        $this->uname = $uname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return LoginRequest
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }


}