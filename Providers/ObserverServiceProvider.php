<?php

namespace Modules\Rbac\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\Rbac\Models\Permission;
use Modules\Rbac\Models\Role;
use Modules\Rbac\Observers\PermissionObserver;
use Modules\Rbac\Observers\RoleObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        Permission::observe(PermissionObserver::class);
        Role::observe(RoleObserver::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [];
    }

}
