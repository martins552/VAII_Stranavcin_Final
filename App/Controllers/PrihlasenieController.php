<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;

class PrihlasenieController extends AControllerBase
{
    public function index() : Response
    {
        return $this->redirect($this->url('prihlasenie.login'));
    }

    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("uvod.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect($this->url("uvod.index"));
    }
}