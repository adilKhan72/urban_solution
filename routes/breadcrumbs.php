<?php
Breadcrumbs::for('admindashboard', function ($trail) {
    $trail->push('admindashboard',route('admindashboard.index'));
});
Breadcrumbs::for('principaldashboard', function ($trail) {
    $trail->push('principaldashboard',route('principaldashboard.index'));
});
Breadcrumbs::for('assistantdashboard', function ($trail) {
    $trail->push('assistantdashboard',route('assistantdashboard.index'));
});

if(Auth::user() != null){
    $user_role = Auth::user()->roles->pluck('display_name');
    if($user_role->contains('admin')){
        Breadcrumbs::for('profile', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('Profile', route('admindashboard.profile.index'));
        });
    }elseif($user_role->contains('principals')){
        Breadcrumbs::for('profile', function ($trail) {
            $trail->parent('principaldashboard');
            $trail->push('Profile', route('admindashboard.profile.index'));
        });
    }else{
        Breadcrumbs::for('profile', function ($trail) {
            $trail->parent('assistantdashboard');
            $trail->push('Profile', route('admindashboard.profile.index'));
        });
    }
}
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admindashboard');
    $trail->push('users', route('admindashboard.users.index'));
 });

        Breadcrumbs::for('informations', function ($trail) {
            $trail->parent('profile');
            $trail->push('Informations', route('admindashboard.profile.informations.index'));
        });
        Breadcrumbs::for('projects', function ($trail) {
            $trail->parent('profile');
            $trail->push('Projects', route('admindashboard.profile.projects.index'));
        });
        Breadcrumbs::for('qualitifcations', function ($trail) {
            $trail->parent('profile');
            $trail->push('Qualitifcations', route('admindashboard.profile.qualitifcations.index'));
        });
        Breadcrumbs::for('experiences', function ($trail) {
            $trail->parent('profile');
            $trail->push('Experiences', route('admindashboard.profile.experiences.index'));
        });
        Breadcrumbs::for('skills', function ($trail) {
            $trail->parent('profile');
            $trail->push('Skills', route('admindashboard.profile.skills.index'));
        });
        Breadcrumbs::for('emergency_contacts', function ($trail) {
            $trail->parent('profile');
            $trail->push('emergency_contacts', route('admindashboard.profile.emergency_contacts.index'));
        });


     

