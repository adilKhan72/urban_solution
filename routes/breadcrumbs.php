<?php
// Define your breadcrumbs here.

// dashboard
Breadcrumbs::for('home', function ($trail) {
    $user_role = Auth::user()->roles->pluck('display_name');

    if($user_role->contains('assistants'))
    $trail->push('Assistant_Dashboard',route('assistant_dashboard'));

    if($user_role->contains('principals'))
    $trail->push('Principal_Dashboard',route('principal_dashboard'));

    if($user_role->contains('admin'))
    $trail->push('Admin_Dashboard',route('admin_dashboard'));
});