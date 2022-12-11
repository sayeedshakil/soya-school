<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home
Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');
//frontend
Route::group(['as'=>'soya.'],function(){
    Route::get('about/', [App\Http\Controllers\frontend\HomeController::class, 'aboutus'])->name('aboutus');
    Route::get('contact/', [App\Http\Controllers\frontend\HomeController::class, 'contactus'])->name('contactus');
    Route::get('view_notice/{id}', [App\Http\Controllers\frontend\HomeController::class, 'viewnotice'])->name('viewnotice');
    Route::get('all_notice/', [App\Http\Controllers\frontend\HomeController::class, 'allnotice'])->name('allnotice');

});


//backend routes
// Auth::routes();
Auth::routes(['register' => false]);
Route::group(['middleware'=>['auth', 'authGate'],'prefix'=>'backend', 'as'=>'backend.'], function(){
    Route::get('/dashboard', [App\Http\Controllers\backend\HomeController::class, 'index'])->name('dashboard');
    // Route::post('/mark-as-read', [App\Http\Controllers\backend\HomeController::class, 'markNotification'])->name('markNotification');

    //users
    Route::delete('users_mass_destroy', [App\Http\Controllers\backend\UserController::class, 'massDestroy'])->name('users.mass_destroy');
    Route::resource('users', App\Http\Controllers\backend\UserController::class);
    //roles
    Route::delete('roles_mass_destroy', [App\Http\Controllers\backend\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('roles', App\Http\Controllers\backend\RoleController::class);
    // Permissions
    Route::delete('permissions/destroy', [App\Http\Controllers\backend\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('permissions', App\Http\Controllers\backend\PermissionController::class);

    // Change Password Routes...
    Route::get('change_password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('auth.change_password');
    Route::patch('change_password', [App\Http\Controllers\Auth\ChangePasswordController::class,'changePassword'])->name('auth.change_password');
    //profile
    Route::resource('profiles', App\Http\Controllers\backend\ProfileController::class);
    // ---------------
    //Student
    Route::delete('student_mass_destroy', [App\Http\Controllers\backend\StudentController::class, 'massDestroy'])->name('students.mass_destroy');
    Route::resource('students', App\Http\Controllers\backend\StudentController::class);
    //Teacher
    Route::delete('teacher_mass_destroy', [App\Http\Controllers\backend\TeacherController::class, 'massDestroy'])->name('teachers.mass_destroy');
    Route::resource('teachers', App\Http\Controllers\backend\TeacherController::class);
    //Class
    Route::delete('class_mass_destroy', [App\Http\Controllers\backend\StudentClassController::class, 'massDestroy'])->name('studentclasses.mass_destroy');
    Route::resource('studentclasses', App\Http\Controllers\backend\StudentClassController::class);
    //Notice
    Route::delete('notice_mass_destroy', [App\Http\Controllers\backend\NoticeController::class, 'massDestroy'])->name('notices.mass_destroy');
    Route::resource('notices', App\Http\Controllers\backend\NoticeController::class);
    //Notice categories
    Route::delete('categories_mass_destroy', [App\Http\Controllers\backend\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');
    Route::resource('categories', App\Http\Controllers\backend\CategoryController::class);
    //mainSlider
    Route::delete('mainSlider_mass_destroy', [App\Http\Controllers\backend\MainSliderController::class, 'massDestroy'])->name('mainSliders.mass_destroy');
    Route::resource('mainSliders', App\Http\Controllers\backend\MainSliderController::class);

    // Expense Category
    Route::delete('expense-categories/destroy',[App\Http\Controllers\backend\ExpenseCategoryController::class, 'massDestroy'])->name('expense-categories.massDestroy');
    Route::resource('expense-categories', App\Http\Controllers\backend\ExpenseCategoryController::class);

    // Income Category
    Route::delete('income-categories/destroy', [App\Http\Controllers\backend\IncomeCategoryController::class, 'massDestroy'])->name('income-categories.massDestroy');
    Route::resource('income-categories', App\Http\Controllers\backend\IncomeCategoryController::class);

    // Expense
    Route::delete('expenses/destroy', [App\Http\Controllers\backend\ExpenseController::class, 'massDestroy'])->name('expenses.massDestroy');
    Route::resource('expenses', App\Http\Controllers\backend\ExpenseController::class);

    // Income
    Route::delete('incomes/destroy', [App\Http\Controllers\backend\IncomeController::class, 'massDestroy'])->name('incomes.massDestroy');
    Route::get('incomes/invoice/{income}', [App\Http\Controllers\backend\IncomeController::class, 'invoice'])->name('incomes.invoice');
    Route::resource('incomes', App\Http\Controllers\backend\IncomeController::class);

    // Expense Report
    Route::delete('expense-reports/destroy', [App\Http\Controllers\backend\ExpenseReportController::class, 'massDestroy'])->name('expense-reports.massDestroy');
    Route::resource('expense-reports', App\Http\Controllers\backend\ExpenseReportController::class);

    //front page
    Route::delete('front-page/destroy', [App\Http\Controllers\backend\FrontPageController::class, 'massDestroy'])->name('front-page.mass_destroy');
    Route::resource('front-page', App\Http\Controllers\backend\FrontPageController::class);

    //insttitution details
    Route::delete('institution_details_mass_destroy', [App\Http\Controllers\backend\InstitutionDetailController::class, 'massDestroy'])->name('institution_details.mass_destroy');
    Route::resource('institution_details', App\Http\Controllers\backend\InstitutionDetailController::class);

    //Feature box
    Route::delete('feature_box_mass_destroy', [App\Http\Controllers\backend\FeatureBoxController::class, 'massDestroy'])->name('feature_box.mass_destroy');
    Route::resource('feature_box', App\Http\Controllers\backend\FeatureBoxController::class);
});

Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('route:cache');
    // Artisan::call('migrate');
    return "Cleared!";
    });


