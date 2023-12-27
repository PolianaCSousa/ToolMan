@extends('layouts.main')

@section('body')

<div class="container">
  <form method="POST" action="/funcionarios">
    @csrf

    <label for="time">Time:</label>
    <input type="text" id="time" disabled name="time">
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