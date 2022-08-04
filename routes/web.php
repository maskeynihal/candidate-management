<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

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

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Candidate
    Route::delete('candidates/destroy', 'CandidateController@massDestroy')->name('candidates.massDestroy');
    Route::post('candidates/parse-csv-import', 'CandidateController@parseCsvImport')->name('candidates.parseCsvImport');
    Route::post('candidates/process-csv-import', 'CandidateController@processCsvImport')->name('candidates.processCsvImport');
    Route::resource('candidates', 'CandidateController');

    // Candidate Personal Detail
    Route::delete('candidate-personal-details/destroy', 'CandidatePersonalDetailController@massDestroy')->name('candidate-personal-details.massDestroy');
    Route::post('candidate-personal-details/parse-csv-import', 'CandidatePersonalDetailController@parseCsvImport')->name('candidate-personal-details.parseCsvImport');
    Route::post('candidate-personal-details/process-csv-import', 'CandidatePersonalDetailController@processCsvImport')->name('candidate-personal-details.processCsvImport');
    Route::resource('candidate-personal-details', 'CandidatePersonalDetailController');

    // Candidate Official Detail
    Route::delete('candidate-official-details/destroy', 'CandidateOfficialDetailController@massDestroy')->name('candidate-official-details.massDestroy');
    Route::post('candidate-official-details/parse-csv-import', 'CandidateOfficialDetailController@parseCsvImport')->name('candidate-official-details.parseCsvImport');
    Route::post('candidate-official-details/process-csv-import', 'CandidateOfficialDetailController@processCsvImport')->name('candidate-official-details.processCsvImport');
    Route::resource('candidate-official-details', 'CandidateOfficialDetailController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
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

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Candidate
    Route::delete('candidates/destroy', 'CandidateController@massDestroy')->name('candidates.massDestroy');
    Route::resource('candidates', 'CandidateController');

    // Candidate Personal Detail
    Route::delete('candidate-personal-details/destroy', 'CandidatePersonalDetailController@massDestroy')->name('candidate-personal-details.massDestroy');
    Route::resource('candidate-personal-details', 'CandidatePersonalDetailController');

    // Candidate Official Detail
    Route::delete('candidate-official-details/destroy', 'CandidateOfficialDetailController@massDestroy')->name('candidate-official-details.massDestroy');
    Route::resource('candidate-official-details', 'CandidateOfficialDetailController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
