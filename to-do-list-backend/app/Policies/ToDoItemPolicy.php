<?php

namespace App\Policies;

use App\Models\ToDoItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToDoItemPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return mixed
     */
    public function view(User $user, ToDoItem $todo_item)
    {
      return $user->id === $todo_item->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return mixed
     */
    public function update(User $user, ToDoItem $todo_item)
    {
      return $user->id === $todo_item->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return mixed
     */
    public function delete(User $user, ToDoItem $todo_item)
    {
      return $user->id === $todo_item->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return mixed
     */
    public function restore(User $user, ToDoItem $toDoItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ToDoItem  $toDoItem
     * @return mixed
     */
    public function forceDelete(User $user, ToDoItem $toDoItem)
    {
        //
    }
}
