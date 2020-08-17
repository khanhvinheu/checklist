<?php namespace App\Models;
use CodeIgniter\Model;


class AuthorModel extends Model
{
    protected $table = 'author';
    protected $allowedFields = ['name'];
    public function getAuthor()
    {
        return $this->findAll();
    }

}