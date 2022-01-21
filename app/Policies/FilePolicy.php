<?php

namespace App\Policies;

use App\Models\File;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FilePolicy
{
    use HandlesAuthorization;

    public function before(User $user,$ability)
    { 
        if ($user->isSupervisor()) {
           return true;
        }
        
       
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
       return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function view(User $user, File $file)
    {
        //
       
        
        return $user->id === $file->project->user_id
        ? Response::allow()
        : Response::deny('You do not own this file.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function update(User $user, File $file)
    {
        //
        return $user->id === $file->project->user_id
        ? Response::allow()
        : Response::deny('you do not have permission to update this file ');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function delete(User $user, File $file)
    {
        //
        return $user->id === $file->project->user_id
        ? Response::allow()
        : Response::deny('you do not have permission to delete this file ');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function restore(User $user, File $file)
    {
        //
        return $user->id === $file->project->user_id
        ? Response::allow()
        : Response::deny('you do not have permission to restore this file ');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\File  $file
     * @return mixed
     */
    public function forceDelete(User $user, File $file)
    {
        //
        return $user->id === $file->project->user_id
        ? Response::allow()
        : Response::deny('you do not have permission to forceDelete this file ');
    }

    
}
