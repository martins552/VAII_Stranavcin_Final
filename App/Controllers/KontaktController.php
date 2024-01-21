<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class KontaktController extends AControllerBase
{
    public function index() : Response
    {
        return $this->html();
    }

    public function add() : Response
    {
        return $this->html();
    }
}