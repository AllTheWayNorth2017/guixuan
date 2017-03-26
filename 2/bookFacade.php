<?php

class author
{
    //作者写书
    protected $author;
    protected $book;

    public function write($book) {
        echo $this->content;
        echo $this->synopsis;
    }
}

class synopsis
{

    public function getSynopsis($book) {
        return $this->synopsis;
    }
}

class book
{
    //书的信息有作者、梗概、内容
    protected $author;
    protected $book;
    protected $synopsis;

    public function __construct($author, $synopsis) {
      $this->author = $author;
      $this->synopsis  = $synopsis;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getSynopsis() {
        return $this->synopsis;
    }

    public function getContent() {
        return $this->content;
    }

    public function getBook() {
        return $this->getSynopsis().'by'.$this->getAuthor();
    }
}

$author = "haha";
$synopsis = "hello world";
$book = new book($author, $synopsis);
var_dump($book);
