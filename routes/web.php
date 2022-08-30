<?php

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

Route::get('/',[App\Http\Controllers\UserController::class, 'index']);

Route::get('/home',[App\Http\Controllers\UserController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/medicines',[App\Http\Controllers\MedicineController::class,'index'])->name('medicine.index');

Route::get('/medicines/create',[App\Http\Controllers\MedicineController::class,'create'])->name('medicine.create');

Route::post('/medicines/create',[App\Http\Controllers\MedicineController::class,'store'])->name('medicine.store');

Route::get('/medicines/edit/{id}',[App\Http\Controllers\MedicineController::class,'edit'])->name('medicine.edit');

Route::post('/medicines/edit/{id}',[App\Http\Controllers\MedicineController::class,'update']);

Route::get('/medicines/delete/{id}',[App\Http\Controllers\MedicineController::class,'delete'])->name('medicine.delete');

// Route::get('/search',[App\Http\Controllers\MedicineDetailController::class, 'search']);




Route::get('/buymedicines',[App\Http\Controllers\BuyMedicineController::class, 'index'])->name('buymedicine.index');

Route::get('/buymedicines/create',[App\Http\Controllers\BuyMedicineController::class, 'create'])->name('buymedicine.create');

Route::post('/buymedicines/create',[App\Http\Controllers\BuyMedicineController::class, 'store'])->name('buymedicine.store');

Route::get('/buymedicines/edit/{id}',[App\Http\Controllers\BuyMedicineController::class,'edit'])->name('buymedicine.edit');

Route::post('/buymedicines/edit/{id}',[App\Http\Controllers\BuyMedicineController::class,'update']);

Route::get('/buymedicines/delete/{id}',[App\Http\Controllers\BuyMedicineController::class, 'delete'])->name('buymedicine.delete');




Route::get('/customers',[App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');

Route::get('/customers/create',[App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');

Route::post('/customers/create',[App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');

Route::get('/customers/edit/{id}',[App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');

Route::post('/customers/edit/{id}',[App\Http\Controllers\CustomerController::class, 'update']);




Route::get('/salepersons',[App\Http\Controllers\SalePersonController::class, 'index'])->name('saleperson.index');

Route::get('/salepersons/create',[App\Http\Controllers\SalePersonController::class, 'create'])->name('saleperson.create');

Route::post('/salepersons/create',[App\Http\Controllers\SalePersonController::class, 'store'])->name('saleperson.store');

Route::get('/salepersons/edit/{id}',[App\Http\Controllers\SalePersonController::class,'edit'])->name('saleperson.edit');

Route::post('/salepersons/edit/{id}',[App\Http\Controllers\SalePersonController::class,'update']);

Route::get('/salepersons/delete/{id}',[App\Http\Controllers\SalePersonController::class, 'delete'])->name('saleperson.delete');




Route::get('/sales',[App\Http\Controllers\SaleController::class, 'index'])->name('sale.index');

Route::get('/sales/create',[App\Http\Controllers\SaleController::class, 'create'])->name('sale.create');

Route::post('/sales/create',[App\Http\Controllers\SaleController::class, 'store'])->name('sale.store');

Route::get('/sales/details/{id}',[App\Http\Controllers\SaleController::class, 'details'])->name('sale.details');

Route::get('sale-print/{order}', [App\Http\Controllers\SaleController::class, 'print'])->name('order.print');




Route::get('/returnmedicines',[App\Http\Controllers\ReturnMedicineController::class, 'index'])->name('returnmedicine.index');

Route::get('/returnmedicines/create',[App\Http\Controllers\ReturnMedicineController::class, 'create'])->name('returnmedicine.create');

Route::post('/returnmedicines/create',[App\Http\Controllers\ReturnMedicineController::class, 'store'])->name('returnmedicine.store');

Route::get('/returnmedicines/details/{id}',[App\Http\Controllers\ReturnMedicineController::class, 'details'])->name('returnmedicine.details');

// Route::get('returnmedicine-print/{return}', [App\Http\Controllers\ReturnMedicineController::class, 'print'])->name('return.print');


Route::get('/report', [App\Http\Controllers\ReportController::class,'showReport'])->name('show.report');
Route::get('/daily-report', [App\Http\Controllers\ReportController::class,'saleReport'])->name('sale.report');



Route::get('/payment', [App\Http\Controllers\PaymentController::class,'showPayment'])->name('show.payment');