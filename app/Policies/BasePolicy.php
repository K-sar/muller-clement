<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function before(User $user)
    {
        if($user->id === 1){
            return true;
        }
    }

    public function admin()
    {
        return false;
    }
}
