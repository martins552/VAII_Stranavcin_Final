<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\EmptyResponse;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\User;

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

    public function kontrolaLoginAJAX() : Response
    {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();
        if (is_object($jsonData) && property_exists($jsonData, 'password')) {
            $hesloNaKontrolu = password_hash($jsonData->password, PASSWORD_DEFAULT);
            $idPouzivatela = $this->app->getAuth()->getLoggedUserId();
            $user = User::getOne($idPouzivatela);
            if ($user->getPassword() == $hesloNaKontrolu)
            {
                return $this->redirect($this->url("profil.upravit"));
            } else {
                throw new HTTPException(400);
            }
        }
        throw new HTTPException(400);
    }
}