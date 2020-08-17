<?php namespace App\Models;
use CodeIgniter\Model;


class CategoryModel extends Model
{
    protected $table = 'categorys';
    protected $allowedFields = ['category'];
    public function getCategory()
    {
        return $this->findAll();
    }

}