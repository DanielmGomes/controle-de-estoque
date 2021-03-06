@extends('adminlte::page')



@section('title', 'Dashboard')

@section('content_header')

    <h1>Fornecedores</h1>

@stop

@section('content')

@include('sweetalert::alert')

<form action="/providers" method="POST"  enctype="multipart/form-data">
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
                <span class="input-group-text"><i class="fas fa-industry"></i></span>
              </div>
              <input type="text" name="name" id="name" placeholder="Razão Social" class="form-control">
            </div>
          </div>
          
          <div class="col-lg-6 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
              </div>
              <input type="text" class="identifier form-control" name="identifier" id="identifier" placeholder="CPF / CNPJ" />
            </div>
          </div>
    
          <div class="col-lg-6 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input type="text" class="form-control" name="address" id="address" placeholder="Endereço" />
            </div>
          </div>
    
          <div class="col-lg-6 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input type="text" class="form-control" name="district" id="district" placeholder="Bairro" />
            </div>
          </div>
    
            <div class="col-lg-6 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <select name="state" id="state" class="form-control">
                  <option>Estado</option>
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
                <select name="city" id="city" class="form-control"></select>
              </div>
            </div>
    
            <div class="col-lg-6 mb-3">
              <div class="input-group" id="wrapper-cities">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" name="phone" id="phone" placeholder="telefone" class="phone form-control">
              </div>
            </div>
    
            <div class="col-lg-6 mb-3">
              <div class="input-group" id="wrapper-cities">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-at"></i></i></span>
                </div>
                <input type="email" name="email" id="email" placeholder="e-mail" class="form-control">
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
        <h3 class="card-title">Lista de Fornecedores Cadastrados</h3>
      </div>

      <!-- listando fornecedores cadastrados -->
      <div class="card-body">
        <table id="list" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>#</th>
                  <th>RAZÃO SOCIAL</th>
                  <th>CPF/CNPJ</th>
                  <th>ENDEREÇO</th>
                  <th>TELEFONE</th>
                  <th>E-MAIL</th>
                  <th>AÇÕES</th>
              </tr>
          </thead>
          <tbody>
            @foreach($providers as $provider)
              <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$provider->name}}</td>
                  <td>{{$provider->identifier}}</td>
                  <td>{{$provider->address}}</td>
                  <td>{{$provider->phone}}</td>
                  <td>{{$provider->email}}</td>
                  <td>
                    <div class="btn-group">
                      <a href="/provider/edit/{{$provider->id}}">
                        <button class="btn btn-success">
                          <i class="fas fa-edit"></i>
                        </button>
                      </a>
           
                      <form action="/provider/{{$provider->id}}" method="POST">
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
                  <th>RAZÃO SOCIAL</th>
                  <th>CPF/CNPJ</th>
                  <th>ENDEREÇO</th>
                  <th>TELEFONE</th>
                  <th>E-MAIL</th>
                  <th>AÇÕES</th>
              </tr>
          </tfoot>
        </table>

      </div>
    </div>
  </div>
</div>

@stop

@section('js')
    <script src="/js/mask.js"></script>
    <script src="/js/city.js"></script>
    <script src="/js/scripts.js"></script>
@stop