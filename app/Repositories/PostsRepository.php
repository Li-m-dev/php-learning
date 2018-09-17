<?php

namespace App\Repositories;

use App\Posts;

class PostsRepository
{
    public function all()
    {
        return Posts::all();
    }

   
}