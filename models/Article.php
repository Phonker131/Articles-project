<?php

// Class entity
class Article
{
    private $article_ID;
    private $name;
    private $content;
    function __construct($article_ID, $name, $content){
        $this-> name = $name;
        $this-> content = $content;
        $this -> article_ID = $article_ID;
    }

    /**
     * @return mixed
     */
    public function getArticleID()
    {
        return $this->article_ID;
    }

    /**
     * @param mixed $article_ID
     */
    public function setArticleID($article_ID): void
    {
        $this->article_ID = $article_ID;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

}