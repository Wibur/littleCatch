<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\QueryException;

class UserRepository
{
    public function create(array $data)
    {
        try {
            return User::create([
                'name' => $data['name'],
                'password' => bcrypt($data['password']),
                'status' => 1,
            ]);
        } catch (QueryException $e) {
            return false;
        }
    }
}
