<?php

namespace Controllers;

use Exceptions\ForbiddenException;
use Exceptions\InvalidArgumentException;
use Exceptions\UnauthorizedException;
use Models\Articles\Article;
use Models\User\User;
use Exceptions\NotFoundException;

class ArticlesController extends AbstractController
{
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
            throw new NotFoundException();
        }
        if($this->user === null)
        {
            throw new UnauthorizedException();
        }
        if($this->user->getRole() !== 'admin')
        {
            throw new ForbiddenException();
        }

        if(!empty($_POST))
        {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e)
            {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(),'article'=>$article]);
                return;
            }
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function add(): void
    {
        /*
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();

        var_dump($article);
        */

        if($this->user === null)
        {
            throw new UnauthorizedException();
        }
        if($this->user->getRole() !== 'admin')
        {
            throw new ForbiddenException();
        }
        if(!empty($_POST))
        {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e)
            {
                $this->view->renderHtml('article/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/add.php');
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