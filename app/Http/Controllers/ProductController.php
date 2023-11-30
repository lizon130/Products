<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return view('backend.product.index', compact('product'));
    }

    public function addproduct()
    {
        return view('backend.product.add');
    }

    public function storeproduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products|max:255',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        Product::insert([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect(route('product.index'));
    }

    public function editproduct($id)
    {
        $product = Product::find($id);
        return view('backend.product.edit', compact('product'));
    }

    public function updateproduct(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|unique:products|max:255' . $id,
            'quantity' => 'required',
            'price' => 'required'
        ]);


        $product_id = $request->id;

        Product::find($product_id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect(route('product.index'));
    }

    public function deleteproduct($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
