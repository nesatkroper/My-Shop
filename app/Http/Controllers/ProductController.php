<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProDetails;

class ProductController extends Controller
{

    public function index()
    {
        // $pro = Product::all();
        $pro = DB::select('SELECT p.id, p.name, p.photo, p.status, c.name AS cate, c.id AS cate_id, p.price, (SUM(pd.add) - SUM(pd.sale)) AS qty FROM products p LEFT JOIN categories c ON p.cate = c.id LEFT JOIN pro_details pd ON p.id = pd.pro_id GROUP BY p.id, p.name, p.photo, c.name, c.id, p.price, p.status');
        $cate = Category::all();
        return view("product", compact(["pro", "cate"]));
    }

    public function create() {}

    public function store(Request $request)
    {
        //upload the image
        $imgPath = null;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imgPath = 'product' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product'), $imgPath);
        }

        //create a new product
        Product::create([
            'name' => $request->name,
            'photo' => $imgPath,
            'cate' => $request->cate,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Product created successfully');
    }

    public function add(Request $req, string $id)
    {
        ProDetails::create([
            'pro_id' => $id,
            'add' => $req->add,
            'add_price' => $req->price,
        ]);

        return redirect()->back()->with('success', 'Product Quantity add successfully');
    }

    public function show(string $id) {}

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $pro = Product::findOrFail($id);

        $imgPath = $pro->photo;
        if ($request->hasFile('photo')) {
            if ($pro->photo && Storage::exists($pro->photo)) {
                Storage::delete($pro->photo);
            }
            $image = $request->file('photo');
            $imgPath = 'product' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product'), $imgPath);
        }

        $pro->update([
            'name' => $request->name,
            'photo' => $imgPath,
            'cate' => $request->cate,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function destroy(string $id)
    {
        $del = Product::findOrFail($id);
        $del->update(['status' => '1']);
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
