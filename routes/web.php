<?php

use App\Http\Livewire\Cure\ShowCures;
use App\Http\Livewire\Rack\ShowRacks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Livewire\CureType\ShowCureTypes;
use App\Http\Livewire\Purchase\ShowPurchaseForm;
use App\Http\Livewire\Purchase\ShowPurchases;
use App\Http\Livewire\Report\ShowStocks;
use App\Http\Livewire\Sale\ShowSales;
use App\Http\Livewire\Unit\ShowUnits;
use App\Models\Cure;
use Illuminate\Http\Request;
use Spatie\Permission\Commands\Show;
use Symfony\Component\Console\Input\Input;

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
    return to_route('home');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'can:akses obat'], function () {
        Route::get('/cures', ShowCures::class)
            ->name('cures.index');
    });

    Route::group(['middleware' => 'can:akses rak obat'], function () {
        Route::get('/racks', ShowRacks::class)
            ->name('racks.index');
    });

    Route::group(['middleware' => 'can:akses jenis obat'], function () {
        Route::get('/cure-types', ShowCureTypes::class)
            ->name('cure-types.index');
    });

    Route::group(['middleware' => 'can:akses unit obat'], function () {
        Route::get('/units', ShowUnits::class)
            ->name('units.index');
    });

    Route::group(['middleware' => 'can:akses rak obat'], function () {
        Route::get('/racks', ShowRacks::class)
            ->name('racks.index');
    });

    Route::group(['middleware' => 'can:akses obat masuk'], function () {
        Route::get('/purchases', ShowPurchases::class)
            ->name('purchases.index');

        Route::get('/purchases/form/{id}', ShowPurchaseForm::class)
                ->name('purchases.edit');

        Route::get('/purchases/form/0', ShowPurchaseForm::class)
            ->name('purchases.create');

    });

    Route::group(['middleware' => 'can:akses obat masuk'], function () {
        Route::get('/sales', ShowSales::class)
            ->name('sales.index');
    });

    Route::group(['middleware' => 'can:akses laporan'], function () {
        Route::get('/report/stocks', ShowStocks::class)
            ->name('report.stocks');
        Route::get('/report/stocks/print', [ReportController::class, 'printStock'])
            ->name('report.stocks.print');
        
    });
});