<?php

namespace Models\Articles;

use Models\ActiveRecordEntity;
use Models\User\User;

class Article extends ActiveRecordEntity
{
    protected $article_name;
    protected $text;
    protected $author_id;
    protected $created_at;

    protected static function getTableName(): string 
    {
        return 'articles';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->article_name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorId(): int
    {
        return (int) $this->author_id;
    }

    public function getAuthor(): User
    {
        return User::getById($this->author_id);
    }

    public function setName(string $name)
    {
        $this->article_name = $name;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function setAuthor(User $author)
    {
        $this->author_id = $author->getId();
    }
}




/*class Article
{
    private $title;
    private $text;
    private $author;

    public function __construct(string $title, string $text, User $author)
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }
} */