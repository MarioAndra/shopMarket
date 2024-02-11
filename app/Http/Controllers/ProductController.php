<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Product::latest()->paginate(4);
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nameProduct"=>"required",
            "price"=>"requierd"
        ]);
        $product=Product::create($request-all());
        return redirect()->route('index.php')->with('success','product has added succesfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product=Product::get()->all();
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "nameProduct"=>"required",
            "price"=>"required"
        ]);
        $product=Product::update($request->all());
        $product->save();
        return view('product.index')->with('success','product has updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
