<?php

namespace App\Policies;

use App\Models\MatchUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatchUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatchUser  $matchUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MatchUser $matchUser)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatchUser  $matchUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MatchUser $matchUser)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatchUser  $matchUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MatchUser $matchUser)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatchUser  $matchUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MatchUser $matchUser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MatchUser  $matchUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MatchUser $matchUser)
    {
        //
    }
}
