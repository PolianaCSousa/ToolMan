@extends('layouts.main')

@section('body')

<div class="container-fluid mb-5 mt-3">
  <div class="row">
    <div class="col">
      Exibindo Faturamento
    </div>
    <div class="col text-end">
      <a href="{{route('faturamento.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container">
  <form action="{{route('faturamento.update', $faturamento->id)}}" method="POST">
    @method('PUT')
    @csrf

    <label for="funcionario">Funcionário:</label>
    <input type="text" id="funcionario" name="funcionario_id" value="{{old('funcionario', $faturamento->funcionario->nome)}}">

    <label for="valor">Valor:</label>
    <input type="number" id="valor" name="valor" value="{{old('valor', $faturamento->valor)}}">

    <label for="data">Data:</label>
    <input type="date" id="data" name="data" value="{{old('data', $faturamento->data)}}">

    <label for="observacoes">Observações:</label>
    <input type="text" id="observacoes" name="observacoes" value="{{old('observacoes', $faturamento->observacoes)}}">

    <button type="submit">Salvar alterações</button>

  </form>
</div>

@endsection