<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Files\FileCollection;

class Blog extends BaseController
{
    private $model;
    public function __construct() {
        $this->model = model(BlogModel::class);
    }

    public function index()
    {
        $title = 'Blog Archive';

        $data = [
            'blog_list' => $this->model->getBlog(),
            'pager' => $this->model->pager,
        ];
        $data['pager']->setPath( 'blog/' );
        
        return view('templates/header', ['title' => $title])
             . view('blog/index', $data)
             . view('templates/footer');

    }

    public function show(?string $url = null){
        $data['blogs'] = $this->model->getSingleBlog('url', $url);

        if ($data['blogs'] === null) {
            throw new PageNotFoundException('Cannot find the blog item: ' . $url);
        }

        $data['title'] = $data['blogs']['title'];

        return view('templates/header', $data)
            . view('blog/view')
            . view('templates/footer');
    }

    public function add(){
        helper('form');

        $data['title'] = 'Add Blog';
        return view('templates/header', $data)
            . view('blog/add')
            . view('templates/footer');
    }

    public function create(){
        helper('form');

        $data = $this->request->getPost(['title', 'content']);
        
        if(! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'content' => 'required|max_length[5000]|min_length[10]',
            'cover' => [
                'max_size[cover,200]',
                'mime_in[cover,image/png,image/jpg,image/jpeg]',
                'ext_in[cover,png,jpg,jpeg]',
                'max_dims[cover,1024,768]',
            ]
        ])){
            return $this->add();
        }

        $post = $this->validator->getValidated();

        $file = $this->request->getFile('cover');
        if($file->getSize() > 0){
            $path_cover = str_replace('images/', '', $file->store('images'));
            $post['cover'] = $path_cover;
        }

        $post['url'] = $this->model->getUniqueUrl(null,$post['title']);

        if($this->model->save($post))
            session()->setFlashdata('success', 1);
        else
            session()->setFlashdata('error', 1);
        
        session()->setFlashdata('created', 1);

        return view('templates/header', ['title' => 'Create a blog item'])
            . view('blog/alert')
            . view('templates/footer');
    }

    public function edit(?string $id = null){
        helper('form');

        $data['blogs'] = $this->model->getSingleBlog('id', $id);

        if ($data['blogs'] === null) {
            throw new PageNotFoundException('Cannot find the blog item: ' . $id);
        }      

        $data['title'] = 'Update Blog';
        return view('templates/header', $data)
            . view('blog/edit')
            . view('templates/footer');
    }

    public function update(){
        helper('form');

        $data = $this->request->getPost(['id', 'title', 'content', 'cover_name']);

        if(! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
            'content' => 'required|max_length[5000]|min_length[10]',
            'cover' => [
                'max_size[cover,200]',
                'mime_in[cover,image/png,image/jpg,image/jpeg]',
                'ext_in[cover,png,jpg,jpeg]',
                'max_dims[cover,1024,768]',
            ]
        ])){
            return $this->edit($data['id']);
        }

        $post = $this->validator->getValidated();
        $file = $this->request->getFile('cover');
        $path_cover = FileController::get_path($data['cover_name']);
        if($file->getSize() > 0){
            if(file_exists($path_cover)){
                unlink($path_cover);
            }   
            
            $path_cover = str_replace('images/', '', $file->store('images'));
            $post['cover'] = $path_cover;
        }

        $post['url'] = $this->model->getUniqueUrl($data['id'],$post['title']);

        if($this->model->update($data['id'], $post))
            session()->setFlashdata('success', 1);
        else
            session()->setFlashdata('error', 1);


        session()->setFlashdata('updated', 1);

        return view('templates/header', ['title' => 'Update a blog item'])
            . view('blog/alert')
            . view('templates/footer');
    }

    public function delete(?string $id = null){
        if($id == null)
            throw new PageNotFoundException('Cannot find the blog item: ' . $id);
        $cover_name = $this->model->getSingleBlog('id', $id)['cover'];
        $path_cover = FileController::get_path($cover_name);

        if($this->model->delete($id)){
            if(file_exists($path_cover)){
                unlink($path_cover);
            }
            session()->setFlashdata('success', 1);
        } else
            session()->setFlashdata('error', 1);

        session()->setFlashdata('deleted', 1);

        return view('templates/header', ['title' => 'Delete a blog item'])
            . view('blog/alert')
            . view('templates/footer');
    }
}