<?php namespace App\Models;

use CodeIgniter\Model;


class PostModel extends Model
{
    protected $table = 'post';
    protected $allowedFields = ['id', 'title', 'slug', 'text', 'category_id', 'author_id'];

    public function getPost($slug = false, $author_id = 'false')
    {
        if ($slug === false) {     //return $this->findAll();
            return $this->join('author', 'post.author_id=author.id')->select(['post.id','title', 'slug', 'text', 'category_id', 'author.name as author'])->findAll();
        }
        return $this->asArray()->join('author', 'post.author_id=author.id')->select(['post.id','title', 'slug', 'text', 'category_id', 'author.name as author'])
            ->where(['slug' => $slug])
            ->first();
    }

    public function getPost_author($author_id = false)
    {
        if ($author_id === false) {
            return $this->findAll();
        }
        return $this->asArray()->join('author', 'post.author_id=author.id')->select(['post.id', 'title', 'slug', 'text', 'category_id', 'author.name as author'])
            ->where(['author_id' => $author_id])
            ->find();
    }

}