@extends('layouts.main')

@section('body')

<div class="container-fluid mt-3 mb-5">
  <div class="row">
    <div class="col">
      Criar um novo funcionário
    </div>
    <div class="col text-end">
      <a href="{{route('funcionario.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
  
</div>

<div class="container">
  <form method="POST" action="{{route('funcionario.store')}}">
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{old('nome')}}">
    <label for="cargo">Cargo:</label>
    <input type="text" id="cargo" name="cargo" value="{{old('cargo')}}">
    <label for="cod">Código:</label>
    <input type="number" id="cod" name="codigo" value="{{old('codigo')}}">
    <label for="salario">Salário</label>
    <input type="number" id="salario" name="salario" value="{{old('salario')}}">
    <label for="tel">Telefone:</label>
    <input type="number" id="tel" name="telefone" value="{{old('telefone')}}">
    
    <button type="submit">Salvar</button>

  </form>
</div>

@endsection