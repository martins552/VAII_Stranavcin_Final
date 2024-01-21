<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Comment;
use App\Models\Post;

class KomentarController extends AControllerBase
{
    public function index() : Response
    {
        $idNovinky = (int)$this->request()->getValue('id');
        $novinka = Post::getOne($idNovinky);
        $komentare = Comment::getAll('post = ?',[$idNovinky]);

        if (is_null($novinka)) {
            throw new HTTPException(404);
        }
        return $this->html([
            'novinka' => $novinka,
            'komentare' => $komentare
        ]);
    }

    public function ulozit() : Response
    {
        $id = (int)$this->request()->getValue('id');
        if ($id > 0)
        {
            $komentar = Comment::getOne($id);
        }
        else
        {
            $komentar = new Comment();
        }
        $komentar->setUser($this->app->getAuth()->getLoggedUserId());
        $komentar->setText($this->request()->getValue('komentar'));
        $komentar->setPost($this->request()->getValue('post'));

        $errors = $this->errors();
        if (count($errors) > 0)
        {
            return $this->html([
                'komentar' => $komentar,
                'errors' =>$errors
            ], 'index'
            );
        } else {
            $komentar->save();
            return new RedirectResponse($this->url('novinky.index'));
        }
    }

    public function upravit() : Response
    {
        $idKoment = (int)$this->request()->getValue('idKoment');
        $komentar = Comment::getOne($idKoment);

        $idNovinka = (int)$this->request()->getValue('idPost');
        $novinka = Post::getOne($idNovinka);

        $komentare = Comment::getAll('post = ?', [$idNovinka]);
        if (is_null($komentar))
        {
            throw new HTTPException(404);
        }
        if ($komentar->getUser() != $this->app->getAuth()->getLoggedUserId()) {
            throw new HTTPException(403, "unauthorized");
        }
        return $this->html([
            'komentare' => $komentare,
            'novinka' => $novinka,
            'komentar' => $komentar
        ]);
    }

    public function zmazat() : Response
    {
        $id = (int)$this->request()->getValue('id');
        $komentar = Comment::getOne($id);
        if ($komentar->getUser() != $this->app->getAuth()->getLoggedUserId()) {
            throw new HTTPException(403, "unauthorized");
        }
        if (is_null($komentar))
        {
            throw new HTTPException(404);
        } else {
            $komentar->delete();
            return new RedirectResponse($this->url('novinky.index'));
        }
    }

    public function errors() : array
    {
        $errors = [];
        if ($this->request()->getValue('komentar') == "")
        {
            $errors[] = "Zadajte text komentára!";
        }
        return $errors;
    }
}