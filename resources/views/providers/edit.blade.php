@extends('adminlte::page')



@section('title', 'Dashboard')

@section('content_header')

  <h1>Editando fornecedor: {{$provider->name}}</h1>

@stop

@section('content')

@include('sweetalert::alert')

  <form action="/provider/update/{{$provider->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="col-md-12">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Editar Fornecedor</h3>
          </div>
          <div class="card-body">

            <div class="row">

              <div class="col-lg-6 mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-industry"></i></span>
                  </div>
                  <input type="text" name="name" id="name" placeholder="Razão Social" class="form-control" value="{{$provider->name}}">
                </div>
              </div>
              
              <div class="col-lg-6 mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                  </div>
                  <input type="text" class="identifier form-control" name="identifier" id="identifier" placeholder="CPF / CNPJ" value="{{$provider->identifier}}" />
                </div>
              </div>
        
              <div class="col-lg-6 mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Endereço" value="{{$provider->address}}" />
                </div>
              </div>
        
              <div class="col-lg-6 mb-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="district" id="district" placeholder="Bairro" value="{{$provider->district}}" />
                </div>
              </div>
        
                <div class="col-lg-6 mb-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <select name="state" id="state" class="form-control">
                      <option value="{{$provider->state}}">{{$provider->state}}</option>
                      <option value="acre">Acre</option>
                      <option value="alagoas">Alagoas</option>
                      <option value="amapa">Amapá</option>
                      <option value="amazonas">Amazonas</option>
                      <option value="bahia">Bahia</option>
                      <option value="ceara">Ceará</option>
                      <option value="distrito federal">Distrito Federal</option>
                      <option value="espirito santo">Espírito Santo</option>
                      <option value="goias">Goiás</option>
                      <option value="minas gerais">Minas Gerais</option>
                      <option value="maranhao">Maranhão</option>
                      <option value="mato grosso">Mato Grosso</option>
                      <option value="mato grosso do sul">Mato Grosso do Sul</option>
                      <option value="para">Pará</option>
                      <option value="paraiba">Paraíba</option>
                      <option value="parana">Paraná</option>
                      <option value="pernambuco">Pernambuco</option>
                      <option value="piaui">Piauí</option>
                      <option value="rio de janeiro">Rio de Janeiro</option>
                      <option value="rio grande do norte">Rio Grande do Norte</option>
                      <option value="rio grande do sul">Rio Grande do Sul</option>
                      <option value="rondonia">Rondônia</option>
                      <option value="roraima">Roraima</option>
                      <option value="santa catarina">Santa Catarina</option>
                      <option value="sao paulo">São Paulo</option>
                      <option value="sergipe">Sergipe</option>
                      <option value="tocantis">Tocantins</option>
                    </select>
                  </div>
                </div>
        
                <div class="col-lg-6 mb-3">
                  <div class="input-group" id="wrapper-cities">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <select name="city" id="city" class="form-control">
                      <option value="{{$provider->city}}">{{$provider->city}}</option>
                    </select>
                  </div>
                </div>
        
                <div class="col-lg-6 mb-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" id="phone" placeholder="telefone" class="phone form-control" value="{{$provider->phone}}">
                  </div>
                </div>
        
                <div class="col-lg-6 mb-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-at"></i></i></span>
                    </div>
                    <input type="email" name="email" id="email" placeholder="e-mail" class="form-control" value="{{$provider->email}}">
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

@section('js')
    <script src="/js/mask.js"></script>
    <script src="/js/city.js"></script>
    <script src="/js/scripts.js"></script>
@stop