<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class POSController extends Controller
{
    protected $item = [];

    public function index()
    {
        $pro = DB::select(
            "SELECT p.id, p.name, p.photo, p.price, SUM(pd.add) - SUM(pd.sale) AS qty FROM products p JOIN pro_details pd ON p.id = pd.pro_id WHERE p.status = ? GROUP BY p.id, p.name, p.photo, p.price",
            ['0']
        );
        return view('pos', compact('pro'));
    }

    public function add(Request $req, string $id)
    {
        $pro = Product::find($id);
        $qty = $req->qty;

        return view(
            'cart',
            [
                'pro' => $pro,
                'id' => $id,
                'qty' => $qty
            ]
        );
    }

    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pro = Product::find($id);
        return view(
            'cart',
            [
                'pro' => $pro,
                'id' => $id
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cart = Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
