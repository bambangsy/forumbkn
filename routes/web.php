<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/category', function () { return view('category');})->name('category');



Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/thread/create', [PostController::class,'create'])->name('thread.create');
    Route::post('/thread/create', [PostController::class,'store'])->name('thread.store');
    Route::get('/thread/{id}', [PostController::class,'show'])->name('thread.show');
    


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
