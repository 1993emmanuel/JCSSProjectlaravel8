<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

use App\Models\Category;
use App\Models\Provider;

// use Picqer;
// use \Milon\Barcode\DNS1D;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(['role_or_permission:control-maestro|altas_lvl1|comprador']);
    }

    public function index()
    {
        $products = Product::get();
        return view('admin.products.index',compact('products'));
    }
    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.products.create',compact('categories','providers'));
    }
    public function store(StoreRequest $request)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/image'),$image_name);
            $product = Product::create($request->all()+[
                'image'=>$image_name,
            ]);
            $product->update(['code'=>$product->id]);
            return redirect()->route('products.index');
        }else{
            $product = Product::create($request->all());
            $product->update(['code'=>$product->id]);
            return redirect()->route('products.index');
        }
    }
    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.products.edit',compact('product','categories','providers'));
    }
    public function update(UpdateRequest $request, Product $product)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/image'),$image_name);
            $product->update($request->all()+[
                'image'=>$image_name,
            ]);
            return redirect()->route('products.index');
        }else{
            $product->name = $request->name;
            $product->sell_price = $request->sell_price;
            $product->category_id = $request->category_id;
            $product->provider_id = $request->provider_id;
            $product->save();
            return redirect()->route('products.index');
        }
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product){
        if($product->status == 'ACTIVE'){
            $product->update(['status'=>'DESACTIVE']);
            return redirect()->back();
        }else{
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        }
    }

}
