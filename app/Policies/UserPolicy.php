<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function checkAccess(User $currentUser, User $id)
    {
        switch ($currentUser->role_id) {
            case 1:
                if ($id->role_id === 1) {
                    abort(403);
                }
                break;
            case 2:
                if ($id->role_id === 1 || $id->role_id === 2) {
                    abort(403);
                }
                break;
            default:
                // Allow access for all other cases
                break;
        }

        return true;
    }
    

    public function update(User $currentUser, User $user)
    {
        return $currentUser->can('update-user'); // Implement the appropriate check for updating users
    }


}
