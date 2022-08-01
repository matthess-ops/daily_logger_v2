<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestpolPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewClient(User $user)
    {
        error_log("--poltestpolicy-----".$user->role);
        return $user->role === 'client';
    }
    public function viewAdmin(User $user)
    {
        error_log("--poltestpolicy-----".$user->role);
        return $user->role === 'admin';
    }
    public function viewMentor(User $user)
    {
        error_log("--poltestpolicy-----".$user->role);
        return $user->role === 'mentor';
    }
}
