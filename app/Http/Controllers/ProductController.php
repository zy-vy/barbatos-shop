<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(Request $req)
    {
        // $products = Product::all();
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function category(Request $req, $name)
    {
        $category = Category::where('name', $name)->first();
        // $categories = Category::with('products')->where('name',$name)->first();
        $products = Product::whereBelongsTo($category)->paginate(10);
        // $categories = [$categories];
        // return dd($categories);
        return view('category', compact('category','products'));
    }

    public function addPage()
    {
        return view('add_product');
    }

    public function addProduct(Request $req)
    {
        $req->validate([
            'name' => 'required|min:5',
            'category' => 'required|not_in:Choose a Category',
            'detail' => 'required',
            'price' => 'required|integer',
            'photo' => 'required|image'
        ], [
            'name' => 'name is required (min. 5 character)',
            'category' => 'category is required',
            'detail' => 'detail is required',
            'price' => 'price is required',
            'photo' => 'image format must be jpg, jpeg, png'
        ]);


        $file = $req->file('photo');
        // return dd($file);
        $img = $req->name .'.'. $file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $img);
        $img = 'images/'.$img;
        $product = new Product();
        $product->name = $req->name;
        $product->category_id = $req->category;
        $product->detail = $req->detail;
        $product->price = $req->price;
        $product->photo = $img;
        // Product::save($product);

        $product->save();
        return redirect()->back()->with('message','success add new product');;
    }

    public function manage(){
        $products = Product::all();

        return view('manage_product',compact('products'));
    }

    public function searchProduct(Request $req){
        $products = Product::where('name','LIKE',"%$req->search%")->paginate(10);

        return view('manage_product',compact('products'));
    }

    public function edit($id){
        $product= Product::find($id);
        $category = $product->category;
        return view('edit_product',compact('product'));
    }

    public function editProduct(Request $req,$id){
        $req->validate([
            'name' => 'required',
            'category' => 'required|not_in:Choose a Category',
            'detail' => 'required',
            'price' => 'required|integer',
            'photo' => 'required|image'
        ], [
            'name' => 'name is required (min. 5 character)',
            'category' => 'category is required',
            'detail' => 'detail is required',
            'price' => 'price is required',
            'photo' => 'image format must be jpg, jpeg, png'
        ]);
        $product= Product::find($id);
        
        $file = $req->file('photo');
        // return dd($file);
        $img = $req->name .'.'. $file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $img);
        $img = 'images/'.$img;
        $product->name = $req->name;
        $product->category_id = $req->category;
        $product->detail = $req->detail;
        $product->price = $req->price;
        $product->photo = $img;

        $product->save();
        return redirect()->back()->with('message','success save product');;
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('message','success delete product');
    }

    public function productDetail(Request $req, $id){
        $product = Product::find($id);
        return view('product_detail',compact('product'));
    }

    public function search(Request $req){
        $products = Product::where('name','LIKE',"%$req->search%")->paginate(10);

        return view('search',compact('products'));
    }

}
