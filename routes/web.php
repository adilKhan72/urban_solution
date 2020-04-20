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

    //Admin Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'admin'], function () {
        Route::get('admindashboard', ['as' => 'admin_dashboard', 'uses' => 'Admin\HomeController@index']);
 
        Route::group(['prefix' => 'option','as'=>'option.'], function () {
            //Route::get('view', ['as' => 'view', 'uses' => 'Admin\ProfileController@index']);
        });

        Route::group(['prefix' => 'profile','as'=>'profile.'], function () {
            Route::get('view', ['as' => 'view', 'uses' => 'Admin\ProfileController@index']);
            Route::get('informations', ['as' => 'informations', 'uses' => 'Admin\ProfileController@Informations']);
            Route::get('informations_store', ['as' => 'informations_store', 'uses' => 'Admin\ProfileController@InformationsStore']);
            Route::get('projects', ['as' => 'projects', 'uses' => 'Admin\ProfileController@Projects']);
            Route::get('qualitifcations', ['as' => 'qualitifcations', 'uses' => 'Admin\ProfileController@Qualitifcations']);
            Route::get('experiences', ['as' => 'experiences', 'uses' => 'Admin\ProfileController@Experiences']);
            Route::get('skills', ['as' => 'skills', 'uses' => 'Admin\ProfileController@Skills']);
        });



    });
    //Admin Rights Ends Here. 

    //Principal Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'principal'], function () {
        Route::get('principaldashboard', ['as' => 'principal_dashboard', 'uses' => 'Principal\HomeController@index']);
    });
    //Principal Rights Ends Here. 

    //Principal Check middleware where if Role = admin so then the routes in this group can be accessed.
    //otherwise redirect to login page.
    Route::group(['middleware'=>'assistant'], function () {
        Route::get('assistantdashboard', ['as' => 'assistant_dashboard', 'uses' => 'Assistant\HomeController@index']);
    });
    //Assistant Rights Ends Here. 

});
//Authenticated user urls ends here.


Route::get('routes_list', function () {
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