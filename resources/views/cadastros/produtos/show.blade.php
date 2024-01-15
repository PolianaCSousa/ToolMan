@extends('layouts.main')

@section('body')

<div class="container-fluid mt-3">
  <div class="row">
      <div class="col">
        <h1>Exibindo produto</h1>
      </div>
      <div class="col text-end">
        <a href="{{route('produto.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
      </div>
  </div>  
</div>

<div class="container">
  <form action="{{route('produto.update', $produto->id)}}" method="POST">
    @method('PUT')
    @csrf 

    <x-tabler.input label="Nome" name="nome" value="{{old('nome', $produto->nome)}}"/>
    <x-tabler.text-area label="Descrição" name="descricao" value="{{old('descricao', $produto->descricao)}}"/>
    
    <div class="row">
      <div class="col-3">
        <x-tabler.input label="Estoque" name="estoque" value="{{old('estoque', $produto->estoque)}}" type="number"/>
      </div>
      <div class="col-3">
        <x-tabler.input label="Estoque mínimo" name="estoque_min" value="{{old('estoque_min', $produto->estoque_min)}}" type="number"/>
      </div>
      <div class="col-3">
        <x-tabler.input label="Estoque máximo" name="estoque_max" value="{{old('estoque_max', $produto->estoque_max)}}" type="number"/>
      </div>
      <div class="col-3">
        <x-tabler.input label="Preço" name="preco" value="{{old('preco', $produto->preco)}}" type="number"/>
      </div>
    </div>

    <button type="submit">Salvar</button>
    
  </form>
</div>

@endsection