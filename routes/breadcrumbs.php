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
            $trail->push('Profile', route('principaldashboard.profile.index'));
        });
    }else{

        Breadcrumbs::for('profile', function ($trail) {
            $trail->parent('assistantdashboard');
            $trail->push('Profile', route('assistantdashboard.profile.index'));
        });
    }
}
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admindashboard');
    $trail->push('users', route('admindashboard.users.index'));
 });




        Breadcrumbs::for('systemsetting', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('systemsetting', route('admindashboard.systemsetting.index'));
        });


        Breadcrumbs::for('list', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('Task_list', route('admindashboard.projectsetting.tasks.list'));
        });

        Breadcrumbs::for('checklist', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('checklist', route('admindashboard.projectsetting.tasks.checklist'));
        });

        Breadcrumbs::for('listscopeandservices', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('listscopeandservices', route('admindashboard.projectsetting.scopeandservice.listscopeandservices'));
        });
        Breadcrumbs::for('services', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('services', route('admindashboard.projectsetting.scopeandservice.services'));
        });






        Breadcrumbs::for('projecttab', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('projecttab', route('admindashboard.projecttab.index'));
        });

        Breadcrumbs::for('newproject', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('newproject', route('admindashboard.projecttab.newproject'));
        });

        Breadcrumbs::for('tasks', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('tasks', route('admindashboard.tasks.index'));
        });


        Breadcrumbs::for('requirements', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('requirements', route('admindashboard.projectsetting.requirements.index'));
        });

        Breadcrumbs::for('areaunit', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('areaunit', route('admindashboard.projectsetting.areaunit'));
        });
        Breadcrumbs::for('zones', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('zones', route('admindashboard.projectsetting.zones'));
        });
        Breadcrumbs::for('clients', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('clients', route('admindashboard.projectsetting.clients'));
        });
        Breadcrumbs::for('mouzas', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('mouzas', route('admindashboard.projectsetting.mouzas'));
        });
        Breadcrumbs::for('societies', function ($trail) {
            $trail->parent('admindashboard');
            $trail->push('societies', route('admindashboard.projectsetting.societies'));
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


     

