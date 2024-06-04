<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Analytic;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnalyticsPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {

        $userAdmin = $user->teams->where('id', '=', '1')->first();

        if (!$userAdmin) {
            return Response::deny('You are not authorized to view this content.');
        } else {
            return Response::allow();
        }
    }


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
     * @param  \App\Models\Analytic  $analytic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Analytic $analytic)
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
     * @param  \App\Models\Analytic  $analytic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Analytic $analytic)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Analytic  $analytic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Analytic $analytic)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Analytic  $analytic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Analytic $analytic)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Analytic  $analytic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Analytic $analytic)
    {
        //
    }
}