<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Provider;
use App\Models\User;

class ProvidersController extends Controller
{

  public function create() {

    $user = auth()->user();

    /* --- listar fornecedores salvos --- */
    $providers = $user->providers;


    return view('providers.create', ['providers' => $providers]);
  }

  /* --- salvar fornecedor --- */
  public function store(Request $request) {
    
    $provider = new Provider;
    $user = auth()->user();

    $provider->name = $request->name;
    $provider->identifier = $request->identifier;
    $provider->address = $request->address;
    $provider->district = $request->district;
    $provider->city = $request->city;
    $provider->state = $request->state;
    $provider->phone = $request->phone;
    $provider->email = $request->email;
    $provider->user_id = $user->id;

    $provider->save();

    return redirect('/provider/create')->with('success', 'fornecedor salvo!');

  }

  public function destroy($id) {
    Provider::findOrFail($id)->delete();

    return redirect('/provider/create')->with('success', 'fornecedor deletado com sucesso!');
  }

  public function edit($id) {
    $user = auth()->user();

    $provider = Provider::findOrFail($id);

    if ($user->id != $provider->user->id) {
      return redirect('/provider/create')->with('error', 'fornecedor não foi cadastrado pelo usuário');
    }

    return view('providers.edit', ['provider' => $provider]);
  }

    public function update(Request $request){

        $data = $request->all();

        Provider::findOrFail($request->id)->update($data);

        return redirect('/provider/create')->with('success', 'fornecedor editado com sucesso!');

    }

}
