<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello from Laravel!';
});

//接案相關
Route::post('/api/addCases', [CasesController::class, 'addCases']);
Route::post('/api/getCases', [CasesController::class, 'getCases']);
Route::delete('/api/deleteCases', [CasesController::class, 'deleteCases']);
Route::post('/api/getCasesData', [CasesController::class, 'getCasesData']);
Route::post('/api/modifyCases', [CasesController::class, 'casesModify']);
