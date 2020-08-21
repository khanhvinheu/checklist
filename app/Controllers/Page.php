<?php namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use App\Models\PostModel;
use CodeIgniter\Controller;


class Page extends Controller
{
    public function index($slug = Null, $author = Null)
    {
        $model = new PostModel();
        $data = [
            'news' => $model->getPost(),
            'title' => 'News Post',
        ];
        $author_model = new AuthorModel();
        $data['author'] = $author_model->getAuthor();
        $_SESSION['session'] = "session-test";
        setcookie('name', 'Test-cookie', time() + (86400 * 30), '/');
        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);

    }

    public function filter()
    {
        $model = new PostModel();
        if ($_GET['author'] == '0') {
            $data = [
                'news' => $model->getPost(),
                'title' => 'News Post',
            ];
        } else {
            $data = [
                'news' => $model->getPost_author($_GET['author']),
                'title' => 'News Post',
            ];
        }
        echo view('news/filter', $data);
    }

    public function view($slug = Null, $author = Null)
    {
        $model = new PostModel();
        $data['news'] = $model->getPost($slug, $author);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }

    public function formPost()
    {
        $data['title'] = 'Form Post';
        $model = new AuthorModel();
        $categoryModel = new CategoryModel();
        $data['author'] = $model->getAuthor();
        $data['category'] = $categoryModel->getCategory();
        if ($this->request->getMethod() === 'post' && $this->validate([
                'title' => 'required|min_length[10]|max_length[500]',
                'text' => 'required'
            ])) {
            $model = new PostModel();
            if ($model->insert([
                'title' => $this->request->getPost('title'),
                'slug' => $this->request->getPost('slug'),
                'text' => $this->request->getPost('text'),
                'category_id' => $this->request->getPost('category'),
                'author_id' => $this->request->getPost('author')
            ])) {
                $data['status'] = 'success';
            } else {
                $data['status'] = 'error';
            }

        }
        echo view('templates/header', $data);
        echo view('news/formPost', $data);
        echo view('templates/footer', $data);

    }

    public function deletePost($id)
    {
        $model = new PostModel();
        $model->delete($id);
        return redirect('/');
    }

    public function form_update($id)
    {
        $data['title'] = 'Form Post';
        $model = new PostModel();
        $model->where('id', $id);
        $data['post'] = $model->asArray()->find();
        $categoryModel = new CategoryModel();
        $model = new AuthorModel();
        $data['author'] = $model->getAuthor();
        $data['category'] = $categoryModel->getCategory();
        echo view('templates/header', $data);
        echo view('news/updatePost', $data);
        echo view('templates/footer', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
                'title' => 'required|min_length[10]|max_length[500]',
                'text' => 'required'
            ])) {
            $model = new PostModel();
            if ($model->update($id, [
                'title' => $this->request->getPost('title'),
                'slug' => $this->request->getPost('slug'),
                'text' => $this->request->getPost('text'),
                'category_id' => $this->request->getPost('category'),
                'author_id' => $this->request->getPost('author')
            ])) {
                $data['status'] = 'success';
                // return redirect()->to(site_url());
                return redirect('/');
            } else {
                $data['status'] = 'error';
            }
        }
        return redirect('/update');
    }
//    public function createPost()
//    {
//        if ($this->request->getMethod() === 'post' && $this->validate([
//                'title' => 'required|min_length[3]|max_length[255]',
//                'text' => 'required'
//            ])) {
//            $model = new PostModel();
//            $model->insert([
//                'title' => $this->request->getPost('title'),
//                'slug' => $this->request->getPost('slug'),
//                'text' => $this->request->getPost('text'),
//                'category_id' => $this->request->getPost('category'),
//                'author_id' => $this->request->getPost('author')
//            ]);
//            //echo view('news/success');
//        }
//        else{
//            echo 'Error';
//        }
//    }
}
