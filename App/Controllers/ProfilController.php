<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Post;
use App\Models\User;

class ProfilController extends AControllerBase
{
    public function index() : Response
    {
        $profil = User::getOne($this->app->getAuth()->getLoggedUserId());
        return $this->html([
           'profil' => $profil
        ]);
    }

    public function upravit() : Response
    {
        $id = (int)$this->request()->getValue('id');
        $profil = User::getOne($id);

        if ($auth->hasHighPermissions()) {
            throw new HTTPException(403, "unauthorized");
        }
        if (is_null($profil))
        {
            throw new HTTPException(404);
        }
        if ($profil->getId() != $this->app->getAuth()->getLoggedUserId()) {
            throw new HTTPException(403, "unauthorized");
        }
        return $this->html([
            'pouzivatel' => $profil
        ]);
    }

    public function zmazat() : Response
    {
        $id = (int)$this->request()->getValue('id');
        $pouzivatel = User::getOne($id);

        if ($auth->hasHighPermissions()) {
            throw new HTTPException(403, "unauthorized");
        }
        if ($pouzivatel->getId() != $this->app->getAuth()->getLoggedUserId()) {
            throw new HTTPException(403, "unauthorized");
        }
        if (is_null($pouzivatel))
        {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($pouzivatel->getObrazok());
            $pouzivatel->delete();
            $this->app->getAuth()->logout();
            return new RedirectResponse($this->url('uvod.index'));
        }
    }
}