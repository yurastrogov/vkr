<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Workday
    Route::delete('workdays/destroy', 'WorkdayController@massDestroy')->name('workdays.massDestroy');
    Route::resource('workdays', 'WorkdayController');

    // Shedule
    Route::delete('shedules/destroy', 'SheduleController@massDestroy')->name('shedules.massDestroy');
    Route::resource('shedules', 'SheduleController');

    // Medicposition
    Route::delete('medicpositions/destroy', 'MedicpositionController@massDestroy')->name('medicpositions.massDestroy');
    Route::resource('medicpositions', 'MedicpositionController');

    // Paramedic
    Route::delete('paramedics/destroy', 'ParamedicController@massDestroy')->name('paramedics.massDestroy');
    Route::post('paramedics/parse-csv-import', 'ParamedicController@parseCsvImport')->name('paramedics.parseCsvImport');
    Route::post('paramedics/process-csv-import', 'ParamedicController@processCsvImport')->name('paramedics.processCsvImport');
    Route::resource('paramedics', 'ParamedicController');

    // Insurance
    Route::delete('insurances/destroy', 'InsuranceController@massDestroy')->name('insurances.massDestroy');
    Route::post('insurances/parse-csv-import', 'InsuranceController@parseCsvImport')->name('insurances.parseCsvImport');
    Route::post('insurances/process-csv-import', 'InsuranceController@processCsvImport')->name('insurances.processCsvImport');
    Route::resource('insurances', 'InsuranceController');

    // Mkb
    Route::delete('mkbs/destroy', 'MkbController@massDestroy')->name('mkbs.massDestroy');
    Route::post('mkbs/parse-csv-import', 'MkbController@parseCsvImport')->name('mkbs.parseCsvImport');
    Route::post('mkbs/process-csv-import', 'MkbController@processCsvImport')->name('mkbs.processCsvImport');
    Route::resource('mkbs', 'MkbController');

    // Lpu
    Route::delete('lpus/destroy', 'LpuController@massDestroy')->name('lpus.massDestroy');
    Route::post('lpus/parse-csv-import', 'LpuController@parseCsvImport')->name('lpus.parseCsvImport');
    Route::post('lpus/process-csv-import', 'LpuController@processCsvImport')->name('lpus.processCsvImport');
    Route::resource('lpus', 'LpuController');

    // Contragent
    Route::delete('contragents/destroy', 'ContragentController@massDestroy')->name('contragents.massDestroy');
    Route::post('contragents/parse-csv-import', 'ContragentController@parseCsvImport')->name('contragents.parseCsvImport');
    Route::post('contragents/process-csv-import', 'ContragentController@processCsvImport')->name('contragents.processCsvImport');
    Route::resource('contragents', 'ContragentController');

    // Doctorvisit
    Route::delete('doctorvisits/destroy', 'DoctorvisitController@massDestroy')->name('doctorvisits.massDestroy');
    Route::post('doctorvisits/media', 'DoctorvisitController@storeMedia')->name('doctorvisits.storeMedia');
    Route::post('doctorvisits/ckmedia', 'DoctorvisitController@storeCKEditorImages')->name('doctorvisits.storeCKEditorImages');
    Route::post('doctorvisits/parse-csv-import', 'DoctorvisitController@parseCsvImport')->name('doctorvisits.parseCsvImport');
    Route::post('doctorvisits/process-csv-import', 'DoctorvisitController@processCsvImport')->name('doctorvisits.processCsvImport');
    Route::resource('doctorvisits', 'DoctorvisitController');

    // Registration New Visit
    Route::delete('registration-new-visits/destroy', 'RegistrationNewVisitController@massDestroy')->name('registration-new-visits.massDestroy');
    Route::resource('registration-new-visits', 'RegistrationNewVisitController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Workday
    Route::delete('workdays/destroy', 'WorkdayController@massDestroy')->name('workdays.massDestroy');
    Route::resource('workdays', 'WorkdayController');

    // Shedule
    Route::delete('shedules/destroy', 'SheduleController@massDestroy')->name('shedules.massDestroy');
    Route::resource('shedules', 'SheduleController');

    // Medicposition
    Route::delete('medicpositions/destroy', 'MedicpositionController@massDestroy')->name('medicpositions.massDestroy');
    Route::resource('medicpositions', 'MedicpositionController');

    // Paramedic
    Route::delete('paramedics/destroy', 'ParamedicController@massDestroy')->name('paramedics.massDestroy');
    Route::resource('paramedics', 'ParamedicController');

    // Insurance
    Route::delete('insurances/destroy', 'InsuranceController@massDestroy')->name('insurances.massDestroy');
    Route::resource('insurances', 'InsuranceController');

    // Mkb
    Route::delete('mkbs/destroy', 'MkbController@massDestroy')->name('mkbs.massDestroy');
    Route::resource('mkbs', 'MkbController');

    // Lpu
    Route::delete('lpus/destroy', 'LpuController@massDestroy')->name('lpus.massDestroy');
    Route::resource('lpus', 'LpuController');

    // Contragent
    Route::delete('contragents/destroy', 'ContragentController@massDestroy')->name('contragents.massDestroy');
    Route::resource('contragents', 'ContragentController');

    // Doctorvisit
    Route::delete('doctorvisits/destroy', 'DoctorvisitController@massDestroy')->name('doctorvisits.massDestroy');
    Route::post('doctorvisits/media', 'DoctorvisitController@storeMedia')->name('doctorvisits.storeMedia');
    Route::post('doctorvisits/ckmedia', 'DoctorvisitController@storeCKEditorImages')->name('doctorvisits.storeCKEditorImages');
    Route::resource('doctorvisits', 'DoctorvisitController');

    ///
    Route::resource('registrationvisit', 'RegistrationvisitController');

    // Registration New Visit
    Route::delete('registration-new-visits/destroy', 'RegistrationNewVisitController@massDestroy')->name('registration-new-visits.massDestroy');
    Route::resource('registration-new-visits', 'RegistrationNewVisitController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
