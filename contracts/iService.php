<?php

namespace Contracts;

use Contracts\iRequest;

interface iService
{
    public function execute(iRequest $request);
}