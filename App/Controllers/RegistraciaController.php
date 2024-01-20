<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\User;

class RegistraciaController extends AControllerBase
{
    public function index() : Response
    {
        return $this->html();
    }

    public function vytvorUcet() : Response
    {
        $id = (int)$this->request()->getValue('id');
        $obrazok = "";
        if ($id > 0) {
            $pouzivatel = User::getOne($id);
            $obrazok = $pouzivatel->getObrazok();
        } else {
            $pouzivatel = new User();
        }
        $pouzivatel->setUsername($this->request()->getValue('username'));
        $pouzivatel->setEmail($this->request()->getValue('email'));
        $pouzivatel->setPassword(password_hash($this->request()->getValue('password'), PASSWORD_DEFAULT));
        $pouzivatel->setBirthdate($this->request()->getValue('birthdate'));
        $pouzivatel->setObrazok($this->request()->getFiles()['picture']['name']);
        $pouzivatel->setPermission(1);

        $errors = $this->errors();
        if (count($errors) > 0) {
            return $this->html([
                'pouzivatel' => $pouzivatel,
                'errors' => $errors
            ], 'index'
            );
        } else {
            if ($obrazok != "")
            {
                FileStorage::deleteFile($obrazok);
            }
            $obrazok = FileStorage::saveFile($this->request()->getFiles()['picture']);
            $pouzivatel->setObrazok($obrazok);
            $pouzivatel->save();
            return new RedirectResponse($this->url("uvod.index"));
        }
    }

    public function errors() : array
    {
        $errors = [];
        if ($this->request()->getFiles()['picture']['name'] == "")
        {
            $errors[] = "Vložte obrázok!";
        }
        if ($this->request()->getValue('username') == "")
        {
            $errors[] = "Zadajte používateľské meno!";
        }
        if ($this->request()->getValue('email') == "")
        {
            $errors[] = "Zadajte email";
        }
        if ($this->request()->getValue('password') == "")
        {
            $errors[] = "Zadajte heslo";
        }
        if ($this->request()->getValue('birthdate') == "")
        {
            $errors[] = "Zadajte dátum narodenia";
        }
        return $errors;
    }
}