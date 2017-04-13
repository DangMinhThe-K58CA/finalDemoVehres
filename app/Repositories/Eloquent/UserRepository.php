<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }
}
