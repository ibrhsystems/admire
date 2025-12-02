<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/testmail', [Home::class,'testmail']);

Route::get('/', [Home::class,'index']);
Route::get('/visa', [Home::class,'visa']);
Route::get('/about-us', [Home::class,'about_us']);
Route::get('/domestic-tour', [Home::class,'domestic_tour']);
Route::get('/international-tour', [Home::class,'international_tour']);
Route::get('/package-list', [Home::class,'package_list']);
Route::get('/package-list/{id}', [Home::class,'package_list']);
Route::get('/contact', [Home::class,'contact']);
Route::get('/hotel', [Home::class,'hotel']);
Route::get('/hotel/{any}', [Home::class,'hotel_details']);
Route::get('/package-details', [Home::class,'package_details']);
Route::get('/destination', [Home::class,'destination']);
Route::get('/destination-details', [Home::class,'destination_details']);
Route::get('/blogs', [Home::class,'blogs']);
Route::get('/blog/{any}', [Home::class,'blog_details']);
Route::match(['get','post'],'/home/save_contact_us', [Home::class,'save_contact_us']);
Route::match(['get','post'],'/home/save_subscriber', [Home::class,'save_subscriber']);
Route::get('/404', function(){
    return view('error_404');
});

Route::middleware(['Authcheck'])->group(function () {
/*************************Admin Controllers************************ */
    Route::get(ADMIN.'-dashboard', [Admin::class,'index']);
    Route::match(['get','post'], ADMIN.'-settings', [Admin::class,'settings']);

    Route::get(ADMIN.'-testimonials', [Admin::class,'testimonials']);
    Route::match(['get','post'], ADMIN.'-add-testimonial', [Admin::class,'add_edit_testimonials']);
    Route::match(['get','post'], ADMIN.'-edit-testimonial/{id}', [Admin::class,'add_edit_testimonials']);

    Route::get(ADMIN.'-cms', [Admin::class,'cms']);
    Route::match(['get','post'], ADMIN.'-add-cms', [Admin::class,'add_edit_cms']);
    Route::match(['get','post'], ADMIN.'-edit-cms/{id}', [Admin::class,'add_edit_cms']);

    Route::get(ADMIN.'-banner', [Admin::class,'banner']);
    Route::match(['get','post'], ADMIN.'-add-banner', [Admin::class,'add_edit_banner']);
    Route::match(['get','post'], ADMIN.'-edit-banner/{id}', [Admin::class,'add_edit_banner']);

    Route::match(['get','post'], ADMIN.'-contact_us', [Admin::class,'contact_us']);

    Route::get(ADMIN.'-blogs', [Admin::class,'blogs']);
    Route::match(['get','post'], ADMIN.'-add-blog', [Admin::class,'add_edit_blog']);
    Route::match(['get','post'], ADMIN.'-edit-blog/{id}', [Admin::class,'add_edit_blog']);

    Route::get(ADMIN.'-locations', [Admin::class,'locations']);
    Route::match(['get','post'], ADMIN.'-add-location', [Admin::class,'add_edit_location']);
    Route::match(['get','post'], ADMIN.'-edit-location/{id}', [Admin::class,'add_edit_location']);

    Route::get(ADMIN.'-packages', [Admin::class,'packages']);
    Route::match(['get','post'], ADMIN.'-package/{id}', [Admin::class,'add_edit_package']);

    Route::get(ADMIN.'-hotels', [Admin::class,'hotels']);
    Route::match(['get','post'], ADMIN.'-hotel/{id}', [Admin::class,'add_edit_hotel']);

    Route::get(ADMIN.'-visa', [Admin::class,'visa']);
    Route::match(['get','post'], ADMIN.'-add-visa', [Admin::class,'add_edit_visa']);
    Route::match(['get','post'], ADMIN.'-edit-visa/{id}', [Admin::class,'add_edit_visa']);

    Route::match(['get','post'], ADMIN.'-deleteRecord/{id}', [Admin::class,'deleteRecord']);
    Route::match(['get','post'], 'admin/remove_image/{id}', [Admin::class,'remove_image']);
    /*************************Auth Controllers************************* */
    Route::get(ADMIN.'-logout', [Auth::class,'logout']);
    Route::match(['get','post'], ADMIN.'-profile', [Auth::class,'edit_profile']);

});

Route::middleware(['Alreadyloggedcheck'])->group(function () {
    Route::match(['get','post'], '/'.ADMIN, [Auth::class,'login']);
    // Route::match(['get','post'], '/login', 'Auth@login');
});
Route::get('/{any}', [Home::class,'any_fun']);