<?php

namespace App\Policies;

use App\User;
use App\Folder;
use Illuminate\Auth\Access\HandlesAuthorization;

class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the folder.
     *
     * @param \App\User $user
     * @param \App\Folder $folder
     * @return mixed
     */

    public function before(User $user)
    {
        if($user->id === 1){
            return true;
        }
    }

    public function show(?User $user, Folder $folder)
    {
        if ($folder->access == 1) {
            return true;
        }

        if (!$user == null) {
            if ($user->access >= $folder->access) {
                return true;
            }

            $folder = $user->folders->where('id', $folder->id)->first();
            if (!empty($folder)) {
                return true;
            }

        }

        return false;
    }

    public function admin()
    {
        return false;
    }

}
