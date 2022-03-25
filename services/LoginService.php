<?php

namespace Services;
require_once '../contracts/iService.php';
require_once '../contracts/iRequest.php';
require_once '../repositories/UsersRepository.php';


use Contracts\iService;
use Contracts\iRequest;
use Repositories\UsersRepository;

class LoginService implements iService
{
    /**
     * @var UsersRepository
     */
    private $repo = null;

    /**
     * @param iRequest $request
     * @return bool
     */
    public function execute(iRequest $request) : bool
    {
        $this->repo = new UsersRepository;
        return $this->repo->login($request->getUname(),$request->getPassword());
    }
}