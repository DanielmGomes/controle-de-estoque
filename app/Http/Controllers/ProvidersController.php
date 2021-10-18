<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\User;


class ProvidersController extends Controller
{

  public function create() {
    return view('providers.create');
  }

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

    return redirect('dashboard')->with('msg', 'fornecedor criado com sucesso');

  }

}
