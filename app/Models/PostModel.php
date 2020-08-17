<?php namespace App\Models;
use CodeIgniter\Model;


class PostModel extends Model
{
    protected $table = 'post';
    protected $allowedFields = ['title', 'slug', 'text','category_id', 'author_id'];
    public function getPost($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }

}