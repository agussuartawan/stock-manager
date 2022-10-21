<?php

namespace App\Http\Controllers;

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
}
