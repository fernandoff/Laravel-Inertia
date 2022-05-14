<?php

namespace App\Policies;

use App\Models\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function list(User $user)    
    {        
        return $user->email == "fernando.cua@gmail.com";
    }

    public function create(User $user)
    {
        return $user->email == 'fernando.cua@gmail.com';
    }

    public function edit(User $user, User $model)
    {
        return (bool) mt_rand(0, 1); // 👀
    }
}
