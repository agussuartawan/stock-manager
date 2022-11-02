<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function printStock()
    {
        return view('report.print-stock', [
            'stocks' => Stock::orderBy('cure_id', 'desc')->get()
        ]);
    }

    public function purchaseInvoice(Purchase $purchase)
    {
        return view('report.purchase-invoice', [
            'purchase' => $purchase
        ]);
    }

    public function printPurchase(Request $request)
    {
        $dateFilter = [$request->from, $request->until];
        $purchases = Purchase::whereBetween('date', $dateFilter)->get();

        return view('report.print-purchases', compact('purchases'));
    }

    public function saleInvoice(Sale $sale)
    {
        return view('report.sale-invoice', [
            'sale' => $sale
        ]);
    }

    public function printSale(Request $request)
    {
        $dateFilter = [$request->from, $request->until];
        $sales = Sale::whereBetween('date', $dateFilter)->get();

        return view('report.print-sales', compact('sales'));
    }
}