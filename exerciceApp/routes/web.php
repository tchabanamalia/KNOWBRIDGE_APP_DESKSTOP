<?php


use App\Http\Controllers\UploadFileController;

use App\Http\Controllers\CurlController;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    event(new \App\Events\Accueil());
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/translate', function (Request $request){
    //dd($request['locale']);
    App::setLocale($request['locale']);
    $date = date("d M Y", );
    \Carbon\Carbon::now()->diffForHumans();
    return view('dashboard');
})->middleware(['auth'])->name('translate');

//:::::::::::::::: TP 2 :::::::::::::::::::::::::::::
// Afficher le formulaire
Route::get("upload", [ UploadFileController::class, "show" ]);
// Enregistrer le fichier uploadé
Route::post("upload", [ UploadFileController::class, "store" ]);


require __DIR__.'/auth.php';


Route::get('/time', [TestController::class, 'test'])->name('time');

Route::get('/test', function () {
    return view('test');
});

// Routes CURL :

Route::get('test-curl-get', [CurlController::class, 'index'])->name('test_curl_get');
Route::post('test-curl-post', [CurlController::class, 'userConnection'])->name('test_curl_post');
Route::get('formulaire_test_curl_post', function() {
    return view('curl-post');
});
