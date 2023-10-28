<?php

namespace Controllers;

use Models\Articles\Article;
use Models\User\UsersAuthService;
use Services\Db;
use View\View;

class MainController extends AbstractController
{
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'user' => UsersAuthService::getUserByToken()
        ]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php',['name' => $name, 'title' => 'Страница приветствия']);
    }

    public function sayBye(string $name)
    {
        $this->view->renderHtml('main/bye.php', ['name' => $name, 'title' => 'Страница прощания']);
    }
}