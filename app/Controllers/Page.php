<?php namespace App\Controllers;
use App\Models\AuthorModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use App\Models\PostModel;
use CodeIgniter\Controller;
class Page extends Controller{
    public function index(){
        $model = new PostModel();

        $data = [
            'news'  => $model->getPost(),
            'title' => 'News archive',
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }
    public function view($slug= Null){
        $model = new PostModel();

        $data['news'] = $model->getPost($slug);

        if (empty($data['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }
    public function formPost(){
        $data['title'] = 'Form Post';
        $model= new AuthorModel();
        $categoryModel = new CategoryModel();
        $data['author']=$model->getAuthor();
        $data['category']= $categoryModel->getCategory();
        echo view('templates/header', $data);
        echo view('news/formPost', $data);
        echo view('templates/footer', $data);
    }
    public function createPost()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'text' => 'required'
            ])) {
            $model = new PostModel();
            $model->insert([
                'title' => $this->request->getPost('title'),
                'slug' => $this->request->getPost('slug'),
                'text' => $this->request->getPost('text'),
                'category_id' => $this->request->getPost('category'),
                'author_id' => $this->request->getPost('author')
            ]);
            //echo view('news/success');

        }
        else{
            echo 'Error';
        }
    }
}
