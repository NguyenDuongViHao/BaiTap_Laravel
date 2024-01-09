<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected function fixImage(Product $p){
        if($p->image && Storage::disk('public')->exists($p->image)){
            $p->image = Storage::url($p->image);

        }else{
            $p->image = '/img/no_image.png';
        }
    }


    public function index()
    {
        $lst = Product::all();
        foreach($lst as $p){
            $this->fixImage($p);
        }
        return view('product-index', ['lst'=>$lst]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lst = Category::all();
        return view('product-create',['lst'=>$lst]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $p = Product::create([
            'name'=> $request->name,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'desc'=>$request->desc,
            'image'=>''
        ]);

        $path = $request->image->store('upload/product/'.$p->id,'public');
        $p->image=$path;
        $p->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        $this->fixImage($product);
        if($request->expectsJson()){
            return $product;
        }
        return view('product-show', ['p'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->fixImage($product);
        $lst = Category::all();
        return view('product-edit', ['p'=>$product, 'lst'=>$lst]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $path= $product->image;
        if($request->hasFile('image')&&$request->image->isValid()){
            $path = $request->image->store('upload/product'.$product->id,'public');
        }

        $product->fill([
            'name'=> $request->name,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'desc'=>$request->desc,
            'image'=>$path
        ]);


        $product->save();
        return redirect()->route('products.show', ['product'=>$product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
