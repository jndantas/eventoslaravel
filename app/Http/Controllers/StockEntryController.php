<?php

namespace App\Http\Controllers;

use App\Mail\StockGreatherMax;
use App\Product;
use App\StockEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class StockEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movements = StockEntry::all();
        return view('stock-entries.index', compact('movements'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck('name', 'id');
        return view('stock-entries.create', compact('products'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Arr::except($request->all(), '_token');
        $entry = StockEntry::forceCreate($data);
        $product = $entry->product;
        if($product->stock >= $product->stock_max){
            Mail::to(env('MAIL_STOCK'))->send(new StockGreatherMax($product));
        }
        return redirect()->route('stock_entries.index');
    }
}
