@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
	<h1>Produtos</h1>
@stop

@section('content')

@include('sweetalert::alert')

<form action="/products" method="POST"  enctype="multipart/form-data">
  @csrf
  <div class="col-md-12">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Cadastrar</h3>
      </div>
      <div class="card-body">

        <div class="row">

          <div class="col-lg-6 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-archive"></i></span>
              </div>
              <input type="text" name="name" id="name" placeholder="Nome" class="form-control">
            </div>
          </div>

          <div class="col-lg-6 mb-3">
          	<div class="input-group">
          		  <select name="type" id="type" class="form-control">
                  <option value="" disabled selected>Unidade de Medida</option>
                  <option value="uni">(UNI) Unidade</option>
                  <option value="kg">(KG) Quilograma</option>
                  <option value="lt">(LT) Litro</option>
                  <option value="mt">(MT) Metro</option>
                  <option value="pr">(PR) Par</option>
                  <option value="m2">(M²) Metro quadrado</option>
                  <option value="M³">(M³) Metro cubico</option>
          			</select>
          	</div>
          </div>

          <div class="col-lg-6 mb-3">
          	<div class="input-group">
              <label for="image">Foto do produto</label>
              <input type="file" name="image" id="image">          			
          	</div>
          </div>

          <div class="col-lg-6 mb-3">
          	<div class="input-group">
              <img id="img">
          	</div>
          </div>

          <div class="mb-3">
            <input type="submit" value="cadastrar" class="btn btn-info">
          </div>
          
      	</div>
    
    	</div>

  	</div>

  </div>

</form>

<div class="container-fluid">

  <div class="col-mb-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lista de Produtos Cadastrados</h3>
      </div>

      <!-- listando fornecedores cadastrados -->
      <div class="card-body">

        @if(empty($products) == true)
          <h1>não possui produtos cadastrados</h1>
        @else

        <table id="list" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>#</th>
                  <th>FOTO</th>
                  <th>PRODUTO</th>
                  <th>TIPO </th>
                  <th>AÇÕES</th>
              </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
              <tr>
                  <td>{{$loop->index+1}}</td>
                  <td><img src="/img/products/{{$product->image}}"></td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->type}}</td>

                  <td>
                    <div class="btn-group">
                      <a href="/product/edit/{{$product->id}}">
                        <button class="btn btn-success">
                          <i class="fas fa-edit"></i>
                        </button>
                      </a>
           
                      <form action="/product/{{$product->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger" style="margin-left: 10px;">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                  </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>#</th>
                  <th>FOTO</th>
                  <th>PRODUTO</th>
                  <th>TIPO</th>
                  <th>AÇÕES</th>
              </tr>
          </tfoot>
        </table>
        @endif
      </div>
    </div>
  </div>
</div>
@stop

@section('css')

<link rel="stylesheet" type="text/css" href="/css/styles.css">

@section('js')

<script src="/js/scripts.js"></script>

@stop