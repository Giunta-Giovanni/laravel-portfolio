<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // mi salvo le rotte in una variabile per mostrarle a schermo in fase di progettazione
    $routes = collect(Route::getRoutes());
    // ->map(function ($route) {
    //     $methods = implode(', ', $route->methods());
    //     if ($methods === "GET, HEAD") {
    //         return [
    //             'uri' => $route->uri()
    //         ]
    //     else{
    //         unset($route)
    //     }
    //     }

    // 'name' => $route->getName(),
    // 'methods' => implode(', ', $route->methods()),
    // 'action' => $route->getActionName(),
    // });
    return view('home', compact('routes'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name("admin")
    ->prefix("admin")
    ->group(function () {

        Route::get("/", [DashboardController::class, 'index'])
            ->name("index");
        Route::get("/profile", [DashboardController::class, 'profile'])
            ->name("profile");
    });

// rotta dei progetti in administration
Route::resource('projects', ProjectsController::class)
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
