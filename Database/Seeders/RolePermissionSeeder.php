<?php

namespace Modules\Rbac\Database\Seeders;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Rbac\Models\Permission;
use Modules\Rbac\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public $command = null;

    public function __construct()
    {
        $this->command = new Command();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //get all Routes
        $roles = Role::all();
        $permissions = Permission::all()->pluck('id');

        foreach ($roles as $role) {
            try {
                $role->permissions()->attach($permissions);
            } catch (\PDOException  $exception) {
                throw new \PDOException($exception->getMessage());
            }
        }

        //reset Spatie Permission cache
        if (app(PermissionRegistrar::class)->forgetCachedPermissions()) {
            $this->command->info('Permission cache reset' . PHP_EOL);
        } else {
            $this->command->error('Permission cache reset failed' . PHP_EOL);
        }
    }
}
