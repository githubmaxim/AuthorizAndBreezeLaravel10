<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//1. Вариант написания пути в котором логика использования авторизации написана во вложенной функции
//Route::get('/authoriz', function () {
//    Вариант 1 - выведет в случае не прохождения авторизации страницу с 403 ошибкой
//    Gate::authorize('view-protected-part');
//    return view('authoriz');
//    Вариант 2 - выведет в случае не прохождения авторизации наш текст
//    if (Gate::check('view-protected-part')){
//        return view('authoriz');
//    }
//    return 'У вас нет права доступа к этой странице!';
//})->middleware(['auth', 'verified'])->name('authoriz');


//2. Вариант написания пути в котором используется логика авторизации встроенная в готовый middleware "can" (но тут я не знаю как выбрасывать свой текст при попытке зайти неавторизованного пользователя)
//Route::get('/authoriz', [\App\Http\Controllers\AuthorizController::class, 'authorizCan'])->middleware('can:view-protected-part')->middleware(['auth', 'verified'])->name('authoriz');


//3. Вариант написания пути в котором логика использования авторизации написана в контроллере
//Route::get('/authoriz', [\App\Http\Controllers\AuthorizController::class, 'authoriz'])->middleware(['auth', 'verified'])->name('authoriz');


//4. Вариант написания пути в котором используется логика авторизации не для всей страницы, а только для отдельных ее кусков - этот механизм прописывается на конкретной странице (тут "authoriz.blade.php") с помощью аннотаций @can u @cannot
//Route::get('/authoriz', [\App\Http\Controllers\AuthorizController::class, 'authorizCan'])->middleware(['auth', 'verified'])->name('authorizCan');

//5. Вариант написания пути в котором используется логика авторизации написанная с использованием политик (Policy). Для этого нужно перенести код из файла "AuthServiceProvider" в файл "AuthorizControllerPolicy"
Route::get('/authoriz', [\App\Http\Controllers\AuthorizController::class, 'authorizeForAdmin'])->middleware(['auth', 'verified'])->name('authoriz');
Route::get('/authorizOnlyAdmin', [\App\Http\Controllers\AuthorizController::class, 'authorizeOnlyAdmin'])->middleware(['auth', 'verified'])->name('authorizOnlyAdmin');



Route::get('/forCheckMyCode', [\App\Http\Controllers\ForCheckMyCodeController::class, 'forCheckMyCode'])->middleware(['auth', 'verified'])->name('forCheckMyCode');


require __DIR__.'/auth.php';
