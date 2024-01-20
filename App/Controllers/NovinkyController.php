<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Post;

class NovinkyController extends AControllerBase
{
    public function index() : Response
    {
        $novinky = Post::getAll();
        return $this->html([
            'novinky' => $novinky
        ]);
    }

    public function add() : Response
    {
        return $this->html();
    }

    public function zmazat() : Response
    {
        $id = (int) $this->request()->getValue('id');
        $novinka = Post::getOne($id);

        if (is_null($novinka)) {
            throw new HTTPException(404);
        } else {
            FileStorage::deleteFile($novinka->getObrazok());
            $novinka->delete();
            return new RedirectResponse($this->url("novinky.index"));
        }
    }

    public function upravit() : Response
    {
        $id = (int)$this->request()->getValue('id');
        $novinka = Post::getOne($id);

        if (is_null($novinka))
        {
            throw new HTTPException(404);
        }
        return $this->html([
            'novinky' => $novinka
        ]);
    }

    public function ulozit() : Response
    {
            $id = (int)$this->request()->getValue('id');
            $obrazok = "";
            if ($id > 0) {
                $novinka = Post::getOne($id);
                $obrazok = $novinka->getObrazok();
            } else {
                $novinka = new Post();
            }
            $novinka->setNazov($this->request()->getValue('nazov'));
            $novinka->setMiesto($this->request()->getValue('miesto'));
            $novinka->setText($this->request()->getValue('text'));
            $novinka->setDatum($this->request()->getValue('datum'));
            $novinka->setObrazok($this->request()->getFiles()['obrazok']['name']);

            $errors = $this->errors();
            if (count($errors) > 0) {
                return $this->html([
                    'novinka' => $novinka,
                    'errors' => $errors
                ], 'add'
                );
            } else {
                if ($obrazok != "") {
                    FileStorage::deleteFile($obrazok);
                }
                $obrazok = FileStorage::saveFile($this->request()->getFiles()['obrazok']);
                $novinka->setObrazok($obrazok);
                $novinka->save();
                return new RedirectResponse($this->url("novinky.index"));

            }
    }

    public function errors() : array
    {
        $errors = [];
        if ($this->request()->getFiles()['obrazok']['name'] == "")
        {
            $errors[] = "Vložte obrázok!";
        }
        if ($this->request()->getValue('text') == "")
        {
            $errors[] = "Vyplnte textové pole!";
        }
        if ($this->request()->getValue('miesto') == "")
        {
            $errors[] = "Zadajte miesto konania";
        }
        if ($this->request()->getValue('nazov') == "")
        {
            $errors[] = "Zadajte názov";
        }
        if (!$this->request()->getValue('datum') == '/([1-9]|[12][0-9]|3[0-1])\.([0-9]|1[0-2])\.(19|20)\d{2}/gm')
        {
            $errors[] = "Zadajte správny formát";
        }
        return $errors;
    }
}