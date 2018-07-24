<?php
class Pages extends Controller
{
 

    public function __construct(){
    //   $this->postModel = $this->model('Post');
    }

    public function index()
    {

        // $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'Welcome to Jeffrey PHP MVC',
        ];
        $this->view('pages/index', $data);

    }

    /*
     *  url ->> currentController/currentMethod/
     */

    //  pages/about
    public function about()
    {
        $this->view('pages/about', ['title' => 'About us']);
    }

    //   pages/update/33
    public function update($id)
    {
        echo "update where id = " . $id;
    }

}
