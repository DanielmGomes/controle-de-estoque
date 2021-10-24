@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
	<h1>Produtos</h1>
@stop

@section('content')

@include('sweetalert::alert')

<form action="/product/update/{{$product->id}}" method="POST"  enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="col-md-12">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Editar</h3>
      </div>
      <div class="card-body">

        <div class="row">

          <div class="col-lg-6 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-archive"></i></span>
              </div>
              <input type="text" name="name" id="name" value="{{$product->name}}" placeholder="Nome" class="form-control">
            </div>
          </div>

          <div class="col-lg-6 mb-3">
          	<div class="input-group">
          		  <select name="type" id="type" class="form-control">
                  <option value="{{$product->type}}" disabled selected>{{$product->type}}</option>
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
              <img id="img" src="/img/products/{{$product->image}}">
          	</div>
          </div>

          <div class="mb-3">
            <input type="submit" value="editar" class="btn btn-info">
          </div>
          
      	</div>
    
    	</div>

  	</div>

  </div>

</form>

@stop

@section('css')

<link rel="stylesheet" type="text/css" href="/css/styles.css">

@section('js')

<script src="/js/scripts.js"></script>

@stop