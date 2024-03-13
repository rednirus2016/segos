<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});


Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});


Route::get('/search-data','PublicPages@searchdata');




Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 


Route::get('/','PublicPages@index');


Route::fallback(function(){
   return redirect('/');
});





Route::get('/thank-you-for-contacting-us', function() {
 
 	return view('thank');
}); 





// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});

// Route::get('/', 'CategoriesController@welcome');

Route::get('/contact', function () {
return view('contact');
});


 Route::get('/', function () {
    return view('welcome');
    });
Route::get('/our-divisions', function () {
    return view('divisions');
    });

    Route::get('/Home', function () {
        return abort(404);   
    });

Route::get('/our-certifications', function () {
    return view('certifications');
    });
    
Route::get('/privacy-policy', function () {
    return view('cert');
    });
    Route::get('/abc', function () {
        return view('post');
        });

        Route::get('/main', function () {
            return view('website');
            });
            
            Route::get('/hello', function () {
                return view('first');
                });

                Route::get('/link', function () {
                    return view('mypage');
                    });



Route::post('/enquiry/store','EnquirysController@store');



Route::get('/', function () {
return view('layouts.app');
});


Route::get('/third-party-manufacturer', function () {
    return view('third');
    });




Route::get('/admin','Auth\LoginController@showLoginForm')->name('admin');
Route::post('/admin','Auth\LoginController@login');



Route::group(['middleware' => 'auth'],function(){
Route::post('/logout','Auth\LoginController@logout');
//Home Routes...
Route::get('/admins', 'HomeController@index')->name('home');
Route::get('/home/enquiries', 'EnquirysController@view');
//Category Routes...
Route::get('/admin/categories/add', 'CategoriesController@new');
Route::post('/admin/categories/add/store', 'CategoriesController@store');
Route::get('/admin/categories/view', 'CategoriesController@view');
Route::get('/admin/categories/edit/{cid}', 'CategoriesController@edit');
Route::post('/admin/categories/update', 'CategoriesController@update');
Route::post('/admin/categories/change-status/{cid}', 'CategoriesController@changestatus');

//Product Routes...
Route::get('/admin/products/add', 'ProductsController@new');
Route::post('/admin/products/add/store', 'ProductsController@store');
Route::get('/admin/products/view', 'ProductsController@view');
Route::get('/admin/products/edit/{pid}', 'ProductsController@edit');
Route::post('/admin/products/update', 'ProductsController@update');
Route::get('/admin/products/change-status/{pid}', 'ProductsController@changestatus');
Route::post('/admin/products/view/import', 'ProductsController@import');  
Route::post('/admin/products/view/search', 'ProductsController@search');
Route::post('/update-product-with-all-category-and-update', 'ProductsController@productcategorykeywords');



//Division Routes...
Route::get('/admin/division/add', 'DivisionsController@index');
Route::post('/admin/division/add/store', 'DivisionsController@store');
Route::get('/admin/division/change-status/{did}', 'DivisionsController@changestatus');
Route::get('/admin/division/edit/{did}', 'DivisionsController@edit');
Route::post('/admin/division/update', 'DivisionsController@update');

 //Pages Routes...
 Route::get('/admin/pages/add', 'PagesController@new');
 Route::post('/admin/pages/add/store', 'PagesController@store');
 Route::get('/admin/pages/view', 'PagesController@view');
 Route::get('/admin/pages/edit/{pid}', 'PagesController@edit');
 Route::post('/admin/pages/update', 'PagesController@update');
 Route::get('/admin/pages/change-status/{pid}', 'PagesController@changestatus');


//Blog Routes...
Route::get('/admin/blogs/add', 'BlogsController@new');
Route::post('/admin/blogs/add/store', 'BlogsController@store');
Route::get('/admin/blogs/view', 'BlogsController@view');
Route::get('/admin/blogs/edit/{pid}', 'BlogsController@edit');
Route::post('/admin/blogs/update', 'BlogsController@update');
Route::get('/admin/blogs/change-status/{bid}', 'BlogsController@changestatus');
});




Route::get('/{data}','PublicPages@index');
