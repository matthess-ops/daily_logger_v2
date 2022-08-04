<?php

namespace App\Policies;

use App\Client;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
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
    // viewAny, view, create, update, delete, restore

    public function before(User $user, $ability)
{
    error_log('ClientPolicy before called');

    if ($user->role === 'admin') {
        return true;
    }
}

    public function viewAny(User $user)
    {
        error_log("-------".$user->role);
        return $user->role === 'client' or $user->role ==='mentor';
    }


    //only the user, all mentors and all admins (before function) should be able to view client data
    public function view(User $user, Client $client){

        error_log('ClientPolicy view called ');
        if($user->id == $client->user_id){
            return true;

        }
    }
    // Only the user and all admins (before function) should be able to update client data
    public function update(User $user, Client $client){
        error_log('ClientPolicy update called');

        return $user->id == $client->user_id;
    }
}
