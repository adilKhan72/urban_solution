<?php
Breadcrumbs::for('admindashboard', function ($trail) {
    $trail->push('Admin_Dashboard',route('admin_dashboard'));
});
    Breadcrumbs::for('profile', function ($trail) {
        $trail->parent('admindashboard');
        $trail->push('Profile', route('profile.index'));
    });
        Breadcrumbs::for('informations', function ($trail) {
            $trail->parent('profile');
            $trail->push('Informations', route('profile.informations.index'));
        });
        Breadcrumbs::for('projects', function ($trail) {
            $trail->parent('profile');
            $trail->push('Projects', route('profile.projects.index'));
        });
        Breadcrumbs::for('qualitifcations', function ($trail) {
            $trail->parent('profile');
            $trail->push('Qualitifcations', route('profile.qualitifcations.index'));
        });
        Breadcrumbs::for('experiences', function ($trail) {
            $trail->parent('profile');
            $trail->push('Experiences', route('profile.experiences.index'));
        });
        Breadcrumbs::for('skills', function ($trail) {
            $trail->parent('profile');
            $trail->push('Skills', route('profile.skills.index'));
        });


Breadcrumbs::for('principaldashboard', function ($trail) {
    $trail->push('Principal_Dashboard',route('principal_dashboard'));
});

Breadcrumbs::for('assistantdashboard', function ($trail) {
    $trail->push('Assistant_Dashboard',route('assistant_dashboard'));
});