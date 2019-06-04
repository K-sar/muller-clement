<?php

namespace App\Policies;

use App\User;
use App\Portfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    public function admin(User $user)
    {
        return $user->id === 1;
    }
}