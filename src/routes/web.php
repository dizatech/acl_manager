<?php
use Illuminate\Support\Facades\Route;

Route::namespace('Authorization')->group(function () {

    Route::resource('/permissions', 'PermissionsController')
        ->except(['show']);

    Route::resource('/roles', 'RolesController')
        ->except(['show']);

    Route::resource('/roles-assignment', 'RolesAssignmentController')
        ->only(['index', 'edit', 'update']);

});
