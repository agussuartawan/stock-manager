<?php

namespace App\Http\Controllers;

use App\Models\Cure;
use App\Models\CurePurchase;
use App\Models\CureSale;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];
        foreach ($categories as $i => $value) {
            $purchases[$i] = Purchase::whereMonth('date', $i + 1)->sum('grand_total');
            $sales[$i] = Sale::whereMonth('date', $i + 1)->sum('grand_total');
        }
        $purchases = json_encode($purchases, JSON_NUMERIC_CHECK);
        $sales = json_encode($sales, JSON_NUMERIC_CHECK);
        $categories = json_encode($categories, JSON_NUMERIC_CHECK);

        $cureCount = Cure::count();
        $purchaseCount = CurePurchase::sum('qty');
        $saleCount = CureSale::sum('qty');
        $stockCount = Stock::sum('amount');

        return view('home', compact('categories', 'purchases', 'sales', 'cureCount', 'purchaseCount', 'saleCount', 'stockCount'));
    }
}