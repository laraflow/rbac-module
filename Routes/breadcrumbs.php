<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Modules\Rbac\Models\Permission;
use Modules\Rbac\Models\Role;


Breadcrumbs::for('rbac.', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Rbac', route('rbac.'));
});

/****************************************** Permission ******************************************/
Breadcrumbs::for('rbac.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('rbac.');
    $trail->push('Permissions', route('rbac.permissions.index'));
});

Breadcrumbs::for('rbac.permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('rbac.permissions.index');
    $trail->push('Add Permission', route('rbac.permissions.create'));
});

Breadcrumbs::for('rbac.permissions.show', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('rbac.permissions.index');
    $trail->push($permission->display_name, route('rbac.permissions.show', $permission->id));
});

Breadcrumbs::for('rbac.permissions.edit', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('rbac.permissions.index');
    $trail->push('Edit Permission', route('rbac.permissions.edit', $permission->id));
});

/****************************************** Role ******************************************/
Breadcrumbs::for('rbac.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('rbac.');
    $trail->push('Roles', route('rbac.roles.index'));
});

Breadcrumbs::for('rbac.roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('rbac.roles.index');
    $trail->push('Add Role', route('rbac.roles.create'));
});

Breadcrumbs::for('rbac.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('rbac.roles.index');
    $trail->push($role->name, route('rbac.roles.show', $role->id));
});

Breadcrumbs::for('rbac.roles.edit', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('rbac.roles.index');
    $trail->push('Edit Role', route('rbac.roles.edit', $role->id));
});
