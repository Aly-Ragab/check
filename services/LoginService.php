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
     * @param iRequest $request
     * @return bool
     */
    public function execute(iRequest $request): bool
    {
        $repo = new UsersRepository;
        return $repo->login($request->getUname(), $request->getPassword());
    }
}