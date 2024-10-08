<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view(uri:'/',view:'welcome')->name('Home') ;

Route::view(uri:'contacto',view:'contact')->name('contact');
Route::get('blog', [PostController::class, 'index'])->name('blog');//entre corchetes para decirle que metodo hay que llamar
Route::view(uri:'nosotros',view:'about')->name('about');

/*Route::match(['put', 'patch'], uri:'/', function(){
    return 'This is a patch request';
});*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
