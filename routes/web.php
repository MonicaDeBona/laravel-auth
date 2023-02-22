<?php

use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [GuestProjectController::class, 'index'])->name('guest.index');



Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/projects/trashed', [AdminProjectController::class, 'trashed'])->name('projects.trashed');
    // Route::post('/projects/{project}/restore', [AdminProjectController::class, 'restore']);
    // Route::delete('/projects/{project}/force-delete', [AdminProjectController::class, 'forceDelete']);
    Route::resource('/projects', AdminProjectController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// {{-- <form class="d-inline" action="{{ route('admin.projects.restore', $project->id) }}" method="POST">
//                                 @csrf
//                                 <button type="submit" class="btn btn-success" title="restore"><i
//                                         class="fa-solid fa-recycle"></i></button>
//                             </form>
//                             <form class="d-inline delete double-confirm"
//                                 action="{{ route('books.force-delete', $project->id) }}" method="POST">
//                                 @csrf
//                                 @method('DELETE')
//                                 <button type="submit" class="btn btn-danger" title="delete"><i
//                                         class="fa-solid fa-trash"></i></button>
//                             </form> --}}
