<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view(uri:'/',view:'welcome')->name('Home') ;

Route::view(uri:'contacto',view:'contact')->name('contact');

Route::resource('blog',PostController::class)//solo para las siete rutas estandars
    ->names('posts')
    ->parameters(['blog' => 'post'])//que mierda es esto
;
/*Route::get('blog', [PostController::class, 'index'])->name('posts.index');//entre corchetes para decirle que metodo hay que llamar
Route::get('blog/create', [PostController::class, 'create'])->name('posts.create');
Route::post('blog', [PostController::class, 'store'])->name('posts.store');
Route::get('blog/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('blog/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');*/

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
