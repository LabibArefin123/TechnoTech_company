<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

use App\Http\Controllers\WelcomePageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeoSettingController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Backend\Frontend_Management\ContactCardController;
use App\Http\Controllers\Backend\Frontend_Management\AboutSectionController;
use App\Http\Controllers\Backend\Frontend_Management\ProjectSectionController;
use App\Http\Controllers\Backend\Frontend_Management\KeyActivityController;
use App\Http\Controllers\Backend\Frontend_Management\SkillSectionController;
use App\Http\Controllers\Backend\Frontend_Management\NewsController;
use App\Http\Controllers\Backend\Frontend_Management\NewsSectionController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SystemProblemController;


/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [WelcomePageController::class, 'index'])->name('welcome');

Route::get('/contact-us', [WelcomePageController::class, 'contact'])->name('contact');

Route::post('/contact/send', [WelcomePageController::class, 'sendContact'])
    ->name('contact.send');

Route::post('/system-problem/store', [WelcomePageController::class, 'system_problem_store'])
    ->name('system_problem.store');

Route::post('/settings/update', [WelcomePageController::class, 'updateSettings'])
    ->name('settings.update');


/*
|--------------------------------------------------------------------------
| SEO / Utility Routes
|--------------------------------------------------------------------------
*/

Route::get('/generate-sitemap', function () {

    Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/about'))
        ->add(Url::create('/projects'))
        ->add(Url::create('/contact-us'))
        ->writeToFile(public_path('sitemap.xml'));
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| Authenticated Admin Panel
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    | Dashboard
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/global-search', [DashboardController::class, 'globalSearch'])
        ->name('global.search');

    Route::get('/search/result', [DashboardController::class, 'searchResult'])
        ->name('search.result');


    /*
    | SEO Management
    */
    Route::get('/admin/seo', [SeoSettingController::class, 'index'])
        ->name('seo.index');

    Route::post('/admin/seo/update', [SeoSettingController::class, 'update'])
        ->name('seo.update');


    /*
    | Organization Management
    */
    Route::resource('organizations', OrganizationController::class);


    /*
    | Frontend Content Management
    */
    Route::resource('about_sections', AboutSectionController::class);
    Route::resource('project_sections', ProjectSectionController::class);
    Route::resource('key_activities', KeyActivityController::class);
    Route::resource('news_sections', NewsSectionController::class);
    Route::resource('news', NewsController::class);
    Route::resource('skill_sections', SkillSectionController::class);
    Route::resource('contact_cards', ContactCardController::class);


    /*
    | User Profile
    */
    Route::get('/user_profile', [ProfileController::class, 'user_profile_show'])
        ->name('user_profile_show');

    Route::get('/user_profile_edit', [ProfileController::class, 'user_profile_edit'])
        ->name('user_profile_edit');

    Route::put('/user_profile_edit', [ProfileController::class, 'user_profile_update'])
        ->name('user_profile_update');


    /*
    | Access Control
    */
    Route::resource('roles', RoleController::class);

    Route::resource('permissions', PermissionController::class);

    Route::post(
        '/permissions/delete-selected',
        [PermissionController::class, 'deleteSelected']
    )
        ->name('permissions.deleteSelected');


    /*
    | System Users
    */
    Route::resource('system_users', SystemUserController::class);

    Route::post(
        '/system-users/{user}/change-password',
        [SystemUserController::class, 'updatePassword']
    )
        ->name('system_users.password.update');


    /*
    | System Problems
    */
    Route::resource('system_problems', SystemProblemController::class);
});


/*
|--------------------------------------------------------------------------
| Developer Mode
|--------------------------------------------------------------------------
*/

Route::post('/developer-unlock', function (Request $request) {

    session(['developer_mode' => true]);

    return response()->json(['status' => 'ok']);
});
