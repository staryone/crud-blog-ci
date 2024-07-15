<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model{
    protected $table = 'blog';
    protected $allowedFields = ['id', 'title', 'content', 'url', 'cover'];

    public function getBlog(){
        $get = request()->getGet('find');
        if(!$get)
            return $this->orderBy('date', 'DESC')->paginate(3);
        
        return $this->like('title', $get)->paginate(3);
    }

    public function getSingleBlog($field = false, $value = false){
        if($field === false || $value === false)
            return null;
        
        return $this->where([$field => $value])->first();
    }

    public function getUniqueUrl($id = null, $title){
        $url = url_title($title, '-', true);
        $urlBase = null;
        if($id != null)
            $urlBase = $this->where(['id' => $id])->first()['url'];
        
        while ($this->where(['url' => $url])->first() && ($url !== $urlBase)) {
            $url = $url . '-1';
        }
        return $url;
    }
}