<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\ValidationException;
use App\Models\Product;
use App\Models\User;

class ProductsController extends Controller
{
  public function create() {

    $user = auth()->user();

    /* --- listar fornecedores salvos --- */
    $products = $user->products;


    return view('products.create', ['products' => $products]);
  }

  public function store(Request $request) {

    $user = auth()->user();

    $product = new Product;

    $product->name = $request->name;
    $product->type = $request->type;

  //image upload
  if ($request->hasFile('image') && $request->file('image')->isValid()) {
      
    $requestImage = $request->image;
    $extension = $requestImage->extension();
    $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'))  . '.' . $extension;
    
    $requestImage->move(public_path('img/products'), $imageName);

    $product->image = $imageName;
  }

  $product->user_id = $user->id;

  $product->save();

  return redirect('/product/create')->with('success', 'produto cadastrado com sucesso!');

  }

  public function destroy($id) {
    product::findOrFail($id)->delete();

    return redirect('/product/create')->with('success', 'produto deletado com sucesso!');
  }

  public function edit($id) {

    $user = auth()->user();

    $product = Product::findOrFail($id);

    if ($user->id != $product->user->id) {
      return redirect('/product/create')->with('error', 'produto não cadastrado pelo usuário');
    }

    return view('products.edit', ['product' => $product]);

  }

  public function update(Request $request) {

    $data = $request->all();

        //image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'))  . '.' . $extension;
            
            $requestImage->move(public_path('img/products'), $imageName);

            $data['image'] = $imageName;
        }

    Product::findOrFail($request->id)->update($data);

    return redirect('/product/create')->with('success', 'produto editado com sucesso!');

  }
}
