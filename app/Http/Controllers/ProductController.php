<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public $productAttributeModel;

    public function __construct()
    {
        $this->productAttributeModel = new ProductAttributes;
    }

    public function json_all()
    {
        $products = Product::join('product_attributes', 'products.id', '=', 'product_attributes.product_id')->get();
        $response = json_encode([$products], JSON_PRETTY_PRINT);
        return response($response)->header('Content-Type', 'application/json');
    }

    public function json_this(Product $product) //
    {
        $product = $product::where('products.id', $product->id)->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')->get();
        $response = json_encode([$product], JSON_PRETTY_PRINT);
        return response($response)->header('Content-Type', 'application/json');;
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()  
    {
        return view('products.create');
    }

    public function store(Request $request) 
    {
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $productattributes = ProductAttributes::create([
            'product_id' => $product->id,
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => Product::findOrFail($product->id),
            'product_attributes' => ProductAttributes::where('product_id', '=', $product->id)->get()
        ]);
    }

    public function edit(Product $product) 
    {  
        return view('products.edit',[
            'product' => Product::findOrFail($product->id),
            'product_attributes' => ProductAttributes::where('product_id', '=', $product->id)->get()
        ]);
    }

    public function update(Request $request, Product $product, ProductAttributes $product_attributes) 
    {
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        $product_attributes->where('product_id', $product->id)->update([
            'product_id' => $product->id,
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    public function destroy(Product $product) 
    {
        ProductAttributes::where('product_id','=', $product->id)->delete();
        Product::findOrFail($product->id)->delete();

        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
