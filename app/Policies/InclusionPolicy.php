<?php

namespace App\Policies;

use App\Models\Inclusion;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InclusionPolicy
{
    public function before(User $user)
    {
        if ($user->position === "admin") {
            return true;
        }
        return false;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Inclusion $inclusion): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inclusion $inclusion): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inclusion $inclusion): bool
    {
        if ($user->position === "admin") {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inclusion $inclusion): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inclusion $inclusion): bool
    {
        //
    }
}
