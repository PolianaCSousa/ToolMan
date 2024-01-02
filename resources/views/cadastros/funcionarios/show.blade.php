@extends('layouts.main')

@section('body')

<div class="container-fluid mt-3 mb-5">
  <div class="row">
    <div class="col">
      <h1>Exibindo funcionário</h1>
    </div>
    <div class="col text-end">
      <a href="{{route('funcionario.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container">
  <form action="{{route('funcionario.update', $funcionario->id)}}" method="POST">
    @method('PUT')
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{old('nome', $funcionario->nome)}}">
    
    <label for="time">Time:</label>
    <input type="text" id="time" name="time_id" value="{{old('time_id', $funcionario->time->nome)}}">
    
    <label for="cargo">Cargo:</label>
    <input type="text" id="cargo" name="cargo" value="{{old('cargo', $funcionario->cargo)}}">
    
    <label for="codigo">Código</label>
    <input type="text" id="codigo" name="codigo" value="{{old('codigo', $funcionario->codigo)}}">
    
    <label for="salario">Salário:</label>
    <input type="number" id="salario" name="salario" value="{{old('salario', $funcionario->salario)}}">
    
    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="{{old('telefone', $funcionario->telefone)}}">
 
  </form>
</div>

@endsection