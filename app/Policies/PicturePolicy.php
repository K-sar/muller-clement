<?php

namespace App\Policies;

    use App\User;
    use App\Picture;
    use Illuminate\Auth\Access\HandlesAuthorization;

class PicturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the picture.
     *
     * @param \App\User $user
     * @param \App\Picture $picture
     * @return mixed
     */
    public function show(?User $user, Picture $picture)
    {
        if ($picture->access == 1) {
            return true;
        }

        if (!$user == null) {
            if ($user->access >= $picture->access) {
                return true;
            }

            //$this->>admin($user);
            if ($user->id === 1) {
                return true;
            }
        }

        return false;
    }

    public function admin(User $user)
    {
        return $user->id === 1;
    }
}
