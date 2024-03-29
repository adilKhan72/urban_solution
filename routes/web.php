<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Auth\LoginController@showLoginForm')->name('main_home_page_login');

Auth::routes(['register' => false]);

//overall authentication of user by user table
Route::group(['middleware'=>'auth'], function () {

    Route::post('user_select_gender', ['as' => 'user_select_gender', 'uses' => 'UserController@SelectGender']);
    Route::post('user_select_employee_status', ['as' => 'user_select_employee_status', 'uses' => 'UserController@SelectEmployeeStatus']);
    Route::post('blood_group_select', ['as' => 'blood_group_select', 'uses' => 'BloodGroupController@BloodGroupSelect']);
    Route::post('country_select', ['as' => 'country_select', 'uses' => 'CountryController@CountrySelect']);
    Route::post('city_select', ['as' => 'city_select', 'uses' => 'CityController@CitySelect']);
    Route::post('educational_degree_select', ['as' => 'educational_degree_select', 'uses' => 'EducationalDegreeController@DegreeSelect']);



    Route::post('unit_for_area_select', ['as' => 'unit_for_area_select', 'uses' => 'UnitForAreaController@UnitSelect']);
    Route::post('project_zone_select', ['as' => 'project_zone_select', 'uses' => 'ZonesController@ZoneSelect']);
    Route::post('project_mouza_select', ['as' => 'project_mouza_select', 'uses' => 'MouzasController@MouzaSelect']);
    Route::post('project_societies_select', ['as' => 'project_societies_select', 'uses' => 'SocietiesController@SocietySelect']);
    Route::post('project_client_select', ['as' => 'project_client_select', 'uses' => 'ClientsController@ClientSelect']);
    Route::post('project_type_select', ['as' => 'project_type_select', 'uses' => 'ProjectTypeController@ProjectTypeSelect']);
    Route::post('project_service_select', ['as' => 'project_service_select', 'uses' => 'ServicesController@ServiceSelect']);
    Route::post('project_requirement_select', ['as' => 'project_requirement_select', 'uses' => 'RequirementController@RequirementSelect']);

    //Admin Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'admin'], function () {
        //Route::get('admindashboard', ['as' => 'admin_dashboard', 'uses' => 'Admin\HomeController@index']);

        Route::group(['prefix' => 'admindashboard','as'=>'admindashboard.'], function () { 
            Route::get('/', ['as' => 'index', 'uses' => 'Admin\HomeController@index']);

            

                Route::group(['prefix' => 'projecttab','as'=>'projecttab.'], function () {

                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Projects\NewProjectController@index']);

                    Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Admin\Projects\NewProjectController@getdatatable']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Projects\NewProjectController@delete']);

                    Route::get('newproject', ['as' => 'newproject', 'uses' => 'Admin\Projects\NewProjectController@newProject']);
                    

                    Route::post('store', ['as' => 'store', 'uses' => 'Admin\Projects\NewProjectController@store']);

                    Route::post('fetchrequirementsperformadetails', ['as' => 'fetchrequirementsperformadetails', 'uses' => 'Admin\Projects\NewProjectController@FetchReqDetailsById']);

                    Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'Admin\Projects\EditProjectController@index']);
                    Route::post('editstore', ['as' => 'editstore', 'uses' => 'Admin\Projects\EditProjectController@store']);
                });

                Route::group(['prefix' => 'tasks','as'=>'tasks.'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Tasks\HomeController@index']);
                    
                });


                Route::group(['prefix' => 'systemsetting','as'=>'systemsetting.'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\SystemSettings\SystemSettingBasicController@index']);
                    Route::post('updatefavicon', ['as' => 'updatefavicon', 'uses' => 'Admin\SystemSettings\SystemSettingBasicController@updateFavicon']);
                    Route::post('updateheaderlogo', ['as' => 'updateheaderlogo', 'uses' => 'Admin\SystemSettings\SystemSettingBasicController@updateHeaderLogo']);
                    Route::post('updateappname', ['as' => 'updateappname', 'uses' => 'Admin\SystemSettings\SystemSettingBasicController@updateAppName']);
                });


                Route::group(['prefix' => 'projectsetting','as'=>'projectsetting.'], function () {
                    
                    Route::group(['prefix' => 'tasks','as'=>'tasks.'], function () {

                        Route::get('list', ['as' => 'list', 'uses' => 'Admin\ProjectSettings\TasksController@index']);
                        Route::get('fetchtaskdatatable', ['as' => 'fetchtaskdatatable', 'uses' => 'Admin\ProjectSettings\TasksController@fetchtaskdatatable']);
                        Route::post('taskstore', ['as' => 'taskstore', 'uses' => 'Admin\ProjectSettings\TasksController@store']);
                        Route::post('taskdelete', ['as' => 'taskdelete', 'uses' => 'Admin\ProjectSettings\TasksController@delete']);
                        Route::post('taskfetch', ['as' => 'taskfetch', 'uses' => 'Admin\ProjectSettings\TasksController@fetch']);
                        Route::post('taskedit', ['as' => 'taskedit', 'uses' => 'Admin\ProjectSettings\TasksController@edit']);


                        Route::get('checklist', ['as' => 'checklist', 'uses' => 'Admin\ProjectSettings\ChecklistController@index']);
                        Route::get('fetchchecklistdatatable', ['as' => 'fetchchecklistdatatable', 'uses' => 'Admin\ProjectSettings\ChecklistController@fetchchecklistdatatable']);
                        Route::post('checkliststore', ['as' => 'checkliststore', 'uses' => 'Admin\ProjectSettings\ChecklistController@store']);
                        Route::post('checklistdelete', ['as' => 'checklistdelete', 'uses' => 'Admin\ProjectSettings\ChecklistController@delete']);
                        Route::post('checklistfetch', ['as' => 'checklistfetch', 'uses' => 'Admin\ProjectSettings\ChecklistController@fetch']);
                        Route::post('checklistedit', ['as' => 'checklistedit', 'uses' => 'Admin\ProjectSettings\ChecklistController@edit']);


                    });

                    Route::group(['prefix' => 'scopeandservice','as'=>'scopeandservice.'], function () {

                        Route::get('listscopeandservices', ['as' => 'listscopeandservices', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@index']);

                        Route::get('fetchscopedatatable', ['as' => 'fetchscopedatatable', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@fetchScopeDataTable']);
                        Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@edit']);
                        Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@delete']);
                        Route::post('store', ['as' => 'store', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@store']);
                        Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@fetch']);


                        Route::get('fetchscopesubtypedatatable', ['as' => 'fetchscopesubtypedatatable', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@fetchScopeSubtypeDataTable']);
                        Route::post('storesubtypes', ['as' => 'storesubtypes', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@storeSubTypes']);
                        Route::post('deletesubtype', ['as' => 'deletesubtype', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@deleteSubType']);
                        Route::post('fetchsubtype', ['as' => 'fetchsubtype', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@fetchSubType']);
                        Route::post('editsubtype', ['as' => 'editsubtype', 'uses' => 'Admin\ProjectSettings\ScopeAndTypesConrtoller@editSubType']);

                        
                        Route::get('fetchservicedatatable', ['as' => 'fetchservicedatatable', 'uses' => 'Admin\ProjectSettings\ServicesController@fetchServiceDataTable']);
                        Route::post('storeservice', ['as' => 'storeservice', 'uses' => 'Admin\ProjectSettings\ServicesController@store']);
                        Route::post('deleteservice', ['as' => 'deleteservice', 'uses' => 'Admin\ProjectSettings\ServicesController@delete']);
                        Route::post('fetchservice', ['as' => 'fetchservice', 'uses' => 'Admin\ProjectSettings\ServicesController@fetch']);
                        Route::post('editservice', ['as' => 'editservice', 'uses' => 'Admin\ProjectSettings\ServicesController@edit']);
                    });

                    Route::group(['prefix' => 'requirements','as'=>'requirements.'], function () {

                        Route::get('/', ['as' => 'index', 'uses' => 'Admin\ProjectSettings\RequirementsController@index']);

                        Route::get('fetchreqtypedatatable', ['as' => 'fetchreqtypedatatable', 'uses' => 'Admin\ProjectSettings\RequirementsController@fetchReqTypeDataTable']);
                        Route::get('fetchsubfielddataTable', ['as' => 'fetchsubfielddataTable', 'uses' => 'Admin\ProjectSettings\RequirementsController@fetchsubFieldDataTable']);

                        Route::post('requirementtypestore', ['as' => 'requirementtypestore', 'uses' => 'Admin\ProjectSettings\RequirementsController@requirementTypeStore']);
                        Route::post('subfieldstore', ['as' => 'subfieldstore', 'uses' => 'Admin\ProjectSettings\RequirementsController@subFieldStore']);

                        Route::post('requirementtypedelete', ['as' => 'requirementtypedelete', 'uses' => 'Admin\ProjectSettings\RequirementsController@requirementTypeDelete']);
                        Route::post('subfielddelete', ['as' => 'subfielddelete', 'uses' => 'Admin\ProjectSettings\RequirementsController@subFieldDelete']);


                        Route::post('requirementtypeedit', ['as' => 'requirementtypeedit', 'uses' => 'Admin\ProjectSettings\RequirementsController@requirementTypeEdit']);
                        Route::post('subfieldedit', ['as' => 'subfieldedit', 'uses' => 'Admin\ProjectSettings\RequirementsController@subFieldEdit']);

                        Route::post('requirementtypefetch', ['as' => 'requirementtypefetch', 'uses' => 'Admin\ProjectSettings\RequirementsController@requirementTypeFetch']);
                        Route::post('subfieldfetch', ['as' => 'subfieldfetch', 'uses' => 'Admin\ProjectSettings\RequirementsController@subFieldFetch']);

                    });
                    
                    Route::get('other', ['as' => 'other', 'uses' => 'Admin\ProjectSettings\HomeController@index']);

                    Route::group(['prefix' => 'areaunits','as'=>'areaunits.'], function () {
                        Route::get('/', ['as' => 'index', 'uses' => 'Admin\ProjectSettings\AreaUnitController@index']);
                        Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\ProjectSettings\AreaUnitController@edit']);
                        Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\ProjectSettings\AreaUnitController@delete']);
                        Route::post('store', ['as' => 'store', 'uses' => 'Admin\ProjectSettings\AreaUnitController@store']);
                        Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\ProjectSettings\AreaUnitController@fetch']);
                    });


                    Route::group(['prefix' => 'clients','as'=>'clients.'], function () {
                        Route::get('/', ['as' => 'index', 'uses' => 'Admin\ProjectSettings\ClientsController@index']);
                        Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\ProjectSettings\ClientsController@edit']);
                        Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\ProjectSettings\ClientsController@delete']);
                        Route::post('store', ['as' => 'store', 'uses' => 'Admin\ProjectSettings\ClientsController@store']);
                        Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\ProjectSettings\ClientsController@fetch']);
                    });


                    Route::group(['prefix' => 'mouzas','as'=>'mouzas.'], function () {
                        Route::get('/', ['as' => 'index', 'uses' => 'Admin\ProjectSettings\MouzasController@index']);
                        Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\ProjectSettings\MouzasController@edit']);
                        Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\ProjectSettings\MouzasController@delete']);
                        Route::post('store', ['as' => 'store', 'uses' => 'Admin\ProjectSettings\MouzasController@store']);
                        Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\ProjectSettings\MouzasController@fetch']);
                    });

                    Route::group(['prefix' => 'zones','as'=>'zones.'], function () {
                        Route::get('/', ['as' => 'index', 'uses' => 'Admin\ProjectSettings\ZonesController@index']);
                        Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\ProjectSettings\ZonesController@edit']);
                        Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\ProjectSettings\ZonesController@delete']);
                        Route::post('store', ['as' => 'store', 'uses' => 'Admin\ProjectSettings\ZonesController@store']);
                        Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\ProjectSettings\ZonesController@fetch']);
                    });

                    Route::group(['prefix' => 'societies','as'=>'societies.'], function () {
                        Route::get('/', ['as' => 'index', 'uses' => 'Admin\ProjectSettings\SocietiesController@index']);
                        Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\ProjectSettings\SocietiesController@edit']);
                        Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\ProjectSettings\SocietiesController@delete']);
                        Route::post('store', ['as' => 'store', 'uses' => 'Admin\ProjectSettings\SocietiesController@store']);
                        Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\ProjectSettings\SocietiesController@fetch']);
                    });

                });

          

            Route::group(['prefix' => 'profile','as'=>'profile.'], function () 
            {
                Route::get('/', ['as' => 'index', 'uses' => 'Admin\Profile\HomeController@index']);
                Route::group(['prefix' => 'informations','as'=>'informations.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Profile\InformationController@index']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Admin\Profile\InformationController@Store']);
                });
                Route::group(['prefix' => 'projects','as'=>'projects.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Profile\ProjectController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Profile\ProjectController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Admin\Profile\ProjectController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\Profile\ProjectController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\Profile\ProjectController@edit']);
                });
                Route::group(['prefix' => 'qualitifcations','as'=>'qualitifcations.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Profile\QualificationController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Profile\QualificationController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Admin\Profile\QualificationController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\Profile\QualificationController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\Profile\QualificationController@edit']);
                });
                Route::group(['prefix' => 'experiences','as'=>'experiences.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Profile\ExperienceController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Profile\ExperienceController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Admin\Profile\ExperienceController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\Profile\ExperienceController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\Profile\ExperienceController@edit']);
                });
                Route::group(['prefix' => 'skills','as'=>'skills.'], function () 
                {
                    
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Profile\SkillController@index']);
                    Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Admin\Profile\SkillController@getDataTable']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Admin\Profile\SkillController@store']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Profile\SkillController@delete']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\Profile\SkillController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\Profile\SkillController@edit']);
                });
                Route::group(['prefix' => 'emergency_contacts','as'=>'emergency_contacts.'], function () 
                {
                    
                    Route::get('/', ['as' => 'index', 'uses' => 'Admin\Profile\EmergencyContactController@index']);
                    Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Admin\Profile\EmergencyContactController@getDataTable']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Admin\Profile\EmergencyContactController@store']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Profile\EmergencyContactController@delete']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\Profile\EmergencyContactController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\Profile\EmergencyContactController@edit']);
                });
            });

            Route::group(['prefix' => 'users','as'=>'users.'], function () 
            {
                Route::get('/', ['as' => 'index', 'uses' => 'Admin\Users\HomeController@index']);
                Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Admin\Users\HomeController@getDataTable']);
                Route::post('store', ['as' => 'store', 'uses' => 'Admin\Users\HomeController@store']);
                Route::post('fetch', ['as' => 'fetch', 'uses' => 'Admin\Users\HomeController@fetch']);
                Route::post('edit', ['as' => 'edit', 'uses' => 'Admin\Users\HomeController@edit']);
                Route::post('delete', ['as' => 'delete', 'uses' => 'Admin\Users\HomeController@delete']);
            });

        });


    });
    //Admin Rights Ends Here. 

    //Principal Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'principal'], function () {

        Route::group(['prefix' => 'principaldashboard','as'=>'principaldashboard.'], function () { 
            Route::get('/', ['as' => 'index', 'uses' => 'Principal\HomeController@index']);

            Route::group(['prefix' => 'option','as'=>'option.'], function () {
                //Route::get('view', ['as' => 'view', 'uses' => 'Admin\ProfileController@index']);
            });

            Route::group(['prefix' => 'profile','as'=>'profile.'], function () 
            {
                Route::get('/', ['as' => 'index', 'uses' => 'Principal\Profile\HomeController@index']);
                Route::group(['prefix' => 'informations','as'=>'informations.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Principal\Profile\InformationController@index']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Principal\Profile\InformationController@Store']);
                });
                Route::group(['prefix' => 'projects','as'=>'projects.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Principal\Profile\ProjectController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Principal\Profile\ProjectController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Principal\Profile\ProjectController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Principal\Profile\ProjectController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Principal\Profile\ProjectController@edit']);
                });
                Route::group(['prefix' => 'qualitifcations','as'=>'qualitifcations.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Principal\Profile\QualificationController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Principal\Profile\QualificationController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Principal\Profile\QualificationController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Principal\Profile\QualificationController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Principal\Profile\QualificationController@edit']);
                });
                Route::group(['prefix' => 'experiences','as'=>'experiences.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Principal\Profile\ExperienceController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Principal\Profile\ExperienceController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Principal\Profile\ExperienceController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Principal\Profile\ExperienceController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Principal\Profile\ExperienceController@edit']);
                });
                Route::group(['prefix' => 'skills','as'=>'skills.'], function () 
                {
                    
                    Route::get('/', ['as' => 'index', 'uses' => 'Principal\Profile\SkillController@index']);
                    Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Principal\Profile\SkillController@getDataTable']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Principal\Profile\SkillController@store']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Principal\Profile\SkillController@delete']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Principal\Profile\SkillController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Principal\Profile\SkillController@edit']);
                });
                Route::group(['prefix' => 'emergency_contacts','as'=>'emergency_contacts.'], function () 
                {
                    
                    Route::get('/', ['as' => 'index', 'uses' => 'Principal\Profile\EmergencyContactController@index']);
                    Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Principal\Profile\EmergencyContactController@getDataTable']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Principal\Profile\EmergencyContactController@store']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Principal\Profile\EmergencyContactController@delete']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Principal\Profile\EmergencyContactController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Principal\Profile\EmergencyContactController@edit']);
                });
            });
        });

    });
    //Principal Rights Ends Here. 

    //Principal Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'assistant'], function () {

        Route::group(['prefix' => 'assistantdashboard','as'=>'assistantdashboard.'], function () { 
            Route::get('/', ['as' => 'index', 'uses' => 'Assistant\HomeController@index']);
            Route::group(['prefix' => 'option','as'=>'option.'], function () {
                //Route::get('view', ['as' => 'view', 'uses' => 'Admin\ProfileController@index']);
            });
            Route::group(['prefix' => 'profile','as'=>'profile.'], function () 
            {
                Route::get('/', ['as' => 'index', 'uses' => 'Assistant\Profile\HomeController@index']);
                Route::group(['prefix' => 'informations','as'=>'informations.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Assistant\Profile\InformationController@index']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Assistant\Profile\InformationController@Store']);
                });
                Route::group(['prefix' => 'projects','as'=>'projects.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Assistant\Profile\ProjectController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Assistant\Profile\ProjectController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Assistant\Profile\ProjectController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Assistant\Profile\ProjectController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Assistant\Profile\ProjectController@edit']);
                });
                Route::group(['prefix' => 'qualitifcations','as'=>'qualitifcations.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Assistant\Profile\QualificationController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Assistant\Profile\QualificationController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Assistant\Profile\QualificationController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Assistant\Profile\QualificationController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Assistant\Profile\QualificationController@edit']);
                });
                Route::group(['prefix' => 'experiences','as'=>'experiences.'], function () 
                {
                    Route::get('/', ['as' => 'index', 'uses' => 'Assistant\Profile\ExperienceController@index']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Assistant\Profile\ExperienceController@delete']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Assistant\Profile\ExperienceController@store']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Assistant\Profile\ExperienceController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Assistant\Profile\ExperienceController@edit']);
                });
                Route::group(['prefix' => 'skills','as'=>'skills.'], function () 
                {
                    
                    Route::get('/', ['as' => 'index', 'uses' => 'Assistant\Profile\SkillController@index']);
                    Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Assistant\Profile\SkillController@getDataTable']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Assistant\Profile\SkillController@store']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Assistant\Profile\SkillController@delete']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Assistant\Profile\SkillController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Assistant\Profile\SkillController@edit']);
                });
                Route::group(['prefix' => 'emergency_contacts','as'=>'emergency_contacts.'], function () 
                {
                    
                    Route::get('/', ['as' => 'index', 'uses' => 'Assistant\Profile\EmergencyContactController@index']);
                    Route::get('getdatatable', ['as' => 'getdatatable', 'uses' => 'Assistant\Profile\EmergencyContactController@getDataTable']);
                    Route::post('store', ['as' => 'store', 'uses' => 'Assistant\Profile\EmergencyContactController@store']);
                    Route::post('delete', ['as' => 'delete', 'uses' => 'Assistant\Profile\EmergencyContactController@delete']);
                    Route::post('fetch', ['as' => 'fetch', 'uses' => 'Assistant\Profile\EmergencyContactController@fetch']);
                    Route::post('edit', ['as' => 'edit', 'uses' => 'Assistant\Profile\EmergencyContactController@edit']);
                });
            });
        });

    });
    //Assistant Rights Ends Here. 

});
//Authenticated user urls ends here.


Route::get('routes_list', function () {

    echo " User Last ACtivity: ".Session::previousUrl();

    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%; font-size:0.9em;   font-family:  Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;'>";
    echo '<tr style="  border: 1px solid #ddd;
    padding: 8px;   padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;">';
    echo "<td width='5%' style='border: 1px solid #ddd;
    padding: 8px;   padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;'><h4>HTTP Method</h4></td>";
    echo "<td width='15%' style='border: 1px solid #ddd;
    padding: 8px;   padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;'><h4>Route</h4></td>";
    echo "<td width='30%' style='border: 1px solid #ddd;
    padding: 8px;   padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;'><h4>Name</h4></td>";
    echo "<td width='50%' style='border: 1px solid #ddd;
    padding: 8px;   padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;'><h4>Corresponding Action</h4></td>";
    echo '</tr>';
    $i = 2;
    foreach ($routeCollection as $value) {
        
        $remainder = $i % 2;
        if($remainder == 0){
            echo '<tr style="border: 1px solid #ddd;
            padding: 8px; background-color: #f2f2f2;" >';
        }else{
            echo '<tr style="border: 1px solid #ddd;
            padding: 8px;" >';
        }
        echo '<td style="border: 1px solid #ddd;
        padding: 8px;">'.$value->methods()[0].'</td>';
        echo '<td style="border: 1px solid #ddd;
        padding: 8px;">'.$value->uri().'</td>';
        echo '<td style="border: 1px solid #ddd;
        padding: 8px;">'.$value->getName().'</td>';
        echo '<td style="border: 1px solid #ddd;
        padding: 8px;">'.$value->getActionName().'</td>';

        echo '</tr>';
        $i ++;
    }
    
    echo '</table>';
});

        //Example of group prefix to use.
        /************************** Country *************************/
        // Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
        //     Route::get('/', ['as' => 'index', 'uses' => 'CountryController@index']);
        //     Route::post('update_status', ['as' => 'update_status', 'uses' => 'CountryController@update_status']);
        //     Route::post('store', ['as' => 'store', 'uses' => 'CountryController@store']);
        //     Route::get('getcountries', ['as' => 'getcountries', 'uses' => 'CountryController@getcountries']);
        //     Route::get('edit', ['as' => 'edit', 'uses' => 'CountryController@edit']);
        //     Route::post('update', ['as' => 'update', 'uses' => 'CountryController@update']);
        //     Route::post('delete', ['as' => 'delete', 'uses' => 'CountryController@delete']);
        // });
        /************************** End Country *************************/

// Route::group(['middleware' => ['role:admin', 'auth', 'verified']], function () use ($perms) {
//     Route::get('/dashboard', 'HomeController@index')->name('admin_dashboard');

// });

// Route::get('/home', function () {
//     echo "am logged in";
// })->name('home');