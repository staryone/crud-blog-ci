<?php

namespace App\Controllers;

use App\Controllers\Blog;

class Home extends BaseController
{
    public function index()
    {
        response()->redirect('blog');
    }
}
