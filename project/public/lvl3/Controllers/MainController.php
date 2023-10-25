<?php

namespace Controllers;

use Models\Articles\Article;
use Models\User\UsersAuthService;
use Services\Db;
use View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../templates');
        $this->view->setVar('user', $this->user);
    }

    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'user' => UsersAuthService::getUserByToken()
        ]);
        echo UsersAuthService::getUserByToken();
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