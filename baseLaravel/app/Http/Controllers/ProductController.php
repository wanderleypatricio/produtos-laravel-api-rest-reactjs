<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
         
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product = new Product();

        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->amount = $data['amount'];

        $product->save();

        return response()->json(['message' => 'Cadastro realizado com sucesso!']);
    }

    public function show($id)
    {
        return Product::find($id)->get();
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product = Product::find($id);

        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->amount = $data['amount'];

        $product->save();

        return response()->json(['message' => 'Alteração realizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return response()->json(['message' => 'Alteração realizado com sucesso!']);
    }
}
