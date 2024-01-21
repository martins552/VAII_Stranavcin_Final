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
        $pouzivatel->setPermission(3);

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
            $this->app->getAuth()->login($this->request()->getValue('username'), $this->request()->getValue('password'));
            return new RedirectResponse($this->url("profil.index"));
        }
    }

    public function errors() : array
    {
        $errors = [];
        if (!is_null(User::getAll('username = ?', [$this->request()->getValue('username')]))) {
            $errors[] = "Zadané meno už existuje!";
        }
        if (!is_null(User::getAll('email = ?', [$this->request()->getValue('email')]))) {
            $errors[] = "Zadaný email už existuje!";
        }
        if ($this->request()->getValue('password') != $this->request()->getValue('passwordRepeat'))
        {
            $errors[] = "Zadajte rovnaké heslá!";
        }
        if (!filter_var($this->request()->getValue('email'),FILTER_VALIDATE_EMAIL))
        {
            $errors[] = "Zadajte spávny formát e-mailu!";
        }
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