@extends('layouts.main')

@section('body')

<div class="container">
  <form method="POST" action="{{route('faturamento.store')}}">
    @csrf 

    <label for="funcionarios">Funcionário:</label>
    <select name="funcionario_id" id="funcionarios">
      @foreach($funcionarios as $f)
        <option value="{{$f->id}}">{{$f->nome}}</option>
      @endforeach
    </select>

    <label for="data">Data:</label>
    <input type="date" id="data" name="data">
    <label for="valor">Valor:</label>
    <input type="number" id="valor" name="valor">
    <label for="observacoes">Observações:</label>
    <input type="text" name="observacoes">

    <button type="submit">Salvar</button>

  </form>
</div>

@endsection