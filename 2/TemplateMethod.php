<?php

abstract class book
{
    final public function info() {
        $this->getAuthor();
        $this->getTitle();
        $this->getContent();
        $this->getSynopsis();
    }

    abstract protected function read();

    final protected function getAuthor() {
        $this->author = $author;
    }
}

class eBook extends book
{
    protected function read() {
        echo "you are reading an ebook now";
    }
}

class pBook extends book
{
    protected function read() {
        echo "you are reading a pbook now";
    }
}