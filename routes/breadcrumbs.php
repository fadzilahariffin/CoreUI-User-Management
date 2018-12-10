<?php

// Home
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard'));
});

Breadcrumbs::register('log-viewer::dashboard', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Log Viewer', url('/access/log-viewer'));
});

Breadcrumbs::register('log-viewer::logs.list', function ($breadcrumbs) {
    $breadcrumbs->parent('log-viewer::dashboard');
    $breadcrumbs->push('Logs', url('/access/log-viewer/logs'));
});

Breadcrumbs::register('log-viewer::logs.show', function ($breadcrumbs, $date) {
    $breadcrumbs->parent('log-viewer::logs.list');
    $breadcrumbs->push($date, url('access/log-viewer/logs/' . $date));
});

Breadcrumbs::register('log-viewer::logs.filter', function ($breadcrumbs, $date, $filter) {
    $breadcrumbs->parent('log-viewer::logs.show', $date);
    $breadcrumbs->push(ucfirst($filter), url('access/log-viewer/' . $date . '/' . $filter));
});

// Home > User
Breadcrumbs::register('user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('User Management', route('user.index'));
});

Breadcrumbs::register('user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('New', route('user.create'));
});

Breadcrumbs::register('user.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('Details', route('user.show', $id));
});

Breadcrumbs::register('user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('Edit', route('user.edit', $id));
});

Breadcrumbs::register('user.password.change', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('Change Password', route('user.password.change', $id));
});

// Home > Role
Breadcrumbs::register('role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Role Management', route('role.index'));
});

Breadcrumbs::register('role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('role.index');
    $breadcrumbs->push('New', route('role.create'));
});

Breadcrumbs::register('role.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('role.index');
    $breadcrumbs->push('Details', route('role.show', $id));
});

Breadcrumbs::register('role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('role.index');
    $breadcrumbs->push('Edit', route('role.edit', $id));
});

// Home > Permission
Breadcrumbs::register('permission.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Permission Management', route('permission.index'));
});

Breadcrumbs::register('permission.create', function ($breadcrumbs) {
    $breadcrumbs->parent('permission.index');
    $breadcrumbs->push('New', route('permission.create'));
});

Breadcrumbs::register('permission.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('permission.index');
    $breadcrumbs->push('Details', route('permission.show', $id));
});

Breadcrumbs::register('permission.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('permission.index');
    $breadcrumbs->push('Edit', route('permission.edit', $id));
});

// Profile
Breadcrumbs::register('profile.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('My Profile', route('profile.index'));
});

Breadcrumbs::register('profile.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('profile.index');
    $breadcrumbs->push('Update Profile', route('profile.edit', $id));
});

Breadcrumbs::register('datatables', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Datatables', route('datatables'));
});
