<?php

class Post
{
    private $title;
    protected $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }
}

class Lesson extends Post
{
    private $homework;

    public function __construct(string $title, string $text, string $homework)
    {
        parent::__construct($title, $text);
        $this->homework = $homework;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }

    public function setHomework(string $homework): void
    {
        $this->homework = $homework;
    }
}

$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');
echo 'Название урока: ' . $lesson->getTitle();
echo '<br>' . var_dump($lesson);

Class PaidLesson extends Lesson
{
    private $price;

    public function __construct(string $title, string $text, string $homework, int $price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

$paidLesson = new PaidLesson('Урок о наследовании в PHP', 'Лол, кек, чебурек', 'Ложитесь спать, утро вечера мудренее', 99);

echo '<br>';
echo var_dump($paidLesson);