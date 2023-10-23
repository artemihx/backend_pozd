<?php

namespace Controllers;

use Models\Articles\Article;
use Models\User\User;
use View\View;

class ArticlesController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
    }

    public function view(int $articleId)
    {
        $result = Article::getById($articleId);
        
        if($result === null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('articles/view.php',['article' => $result]);
    }
}