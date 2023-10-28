<?php

namespace Models\Comment;

use Exceptions\InvalidArgumentException;
use Services\Db;
use Models\ActiveRecordEntity;
use Models\User\User;
Use Models\Articles\Article;

class Comment extends ActiveRecordEntity
{
    protected int $authorId;
    protected int $articlesId;
    protected string $text;
    protected string $date;

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function getText(): string
    {
        return $this->text;
    }
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getArticleId(): int
    {
        return $this->articlesId;
    }
    public function getDate(): string
    {
        return $this->date;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function setArticleId(int $articleId): void
    {
        $this->articlesId = $articleId;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }
    public function updateFromArray(array $fields): Comment
    {
        if (empty($fields['text']))
        {
            throw new InvalidArgumentException('Текст изменения пуст!');
        }
        $this->setText($fields['text']);

        $this->save();
        return $this;
    }
    public static function createFromArray(array $fields, User $author, Article $article): Comment
    {
        if (empty($fields['text']))
        {
            throw new InvalidArgumentException('Текст комментария пуст!');
        }
        $comment = New Comment();
        $comment->authorId = $author->getId();
        $comment->articlesId = $article->getId();
        $comment->setText($fields['text']);

        $comment->save();
        return $comment;
    }
}