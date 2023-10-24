<?php

namespace Controllers;

use Models\Articles\Article;
use Models\User\User;
use View\View;
use Exceptions\NotFoundException;

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
            throw new NotFoundException();
            return;
        }
        $this->view->renderHtml('articles/view.php',['article' => $result]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if($article === null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $article = new Article();
        $article->setName('Статья 3');
        $article->setText('Текст статьи 3');

        $article->save();
        var_dump($article);
    }

    public function add(): void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();

        var_dump($article);
    }

    public function delete(int $articleId): void
    {
        $article = Article::getById($articleId);

        if($article === null)
        {
            echo "Такой статьи не существует!";
            throw new NotFoundException();
            return;
        }
        $article->delete();
        var_dump($article);
    }
    
}