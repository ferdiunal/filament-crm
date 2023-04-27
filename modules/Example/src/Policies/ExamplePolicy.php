<?php

declare(strict_types=1);

namespace Modules\Example\Policies;

use App\Models\User;
use Modules\Example\ExampleServiceProvider;
use Modules\Example\Models\Example;

class ExamplePolicy
{
    /**
     * Determine whether the Example can view any models.
     */
    public function viewAny(User $user): bool
    {
        return
            tenancy()->initialized &&
            in_array(
                '\\'.ExampleServiceProvider::class,
                tenant()->modules,
                true
            );
    }

    /**
     * Determine whether the Example can view the model.
     */
    public function view(User $user, Example $example): bool
    {
        return
            tenancy()->initialized &&
            in_array(
                '\\'.ExampleServiceProvider::class,
                tenant()->modules,
                true
            );
    }

    /**
     * Determine whether the Example can create models.
     */
    public function create(User $_user): bool
    {
        return
            tenancy()->initialized &&
            in_array(
                '\\'.ExampleServiceProvider::class,
                tenant()->modules,
                true
            );
    }

    /**
     * Determine whether the Example can update the model.
     */
    public function update(User $user, Example $example): bool
    {
        return
            tenancy()->initialized &&
            in_array(
                '\\'.ExampleServiceProvider::class,
                tenant()->modules,
                true
            );
    }

    /**
     * Determine whether the Example can delete the model.
     */
    public function delete(User $user, Example $example): bool
    {
        return
            tenancy()->initialized &&
            in_array(
                '\\'.ExampleServiceProvider::class,
                tenant()->modules,
                true
            );
    }

    /**
     * Determine whether the Example can restore the model.
     */
    public function restore(User $user, Example $example): bool
    {
        return
            tenancy()->initialized &&
            in_array(
                '\\'.ExampleServiceProvider::class,
                tenant()->modules,
                true
            );
    }

    /**
     * Determine whether the Example can permanently delete the model.
     */
    public function forceDelete(User $user, Example $example): bool
    {
        return
            tenancy()->initialized &&
            in_array(
                '\\'.ExampleServiceProvider::class,
                tenant()->modules,
                true
            );
    }
}
