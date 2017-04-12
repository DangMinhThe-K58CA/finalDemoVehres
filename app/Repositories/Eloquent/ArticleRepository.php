<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Models\Article;

class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Article::class;
    }
}
