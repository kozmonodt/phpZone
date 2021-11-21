<?php

namespace MyProject\Models\Posts;

use MyProject\Exceptions\InvalidDataException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Services\Db;

class Post extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $createdAt;
    protected $image;

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
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    public static function createFromArray(array $fields) : Post
    {
        $post = new Post();
        $post->setName($fields['name']);
        $post->setText($fields['text']);
        $post->setImage($fields['image']);

        $post->save();
        return $post;
    }

    public static function findAll() : array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '` ORDER BY created_at DESC;',[],static::class);
    }

    public static function limitedQuery($start, $per_page)
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '` ORDER BY created_at DESC LIMIT ' .
            $start . ',' . $per_page . ';',
            [],
            static::class);
    }

    public static function countEntries()
    {
        $db = Db::getInstance();
        return $db->countQuery('SELECT count(*) FROM `' . static::getTableName() . '` ;');
    }


    protected static function getTableName(): string
    {
        return "posts";
    }

}