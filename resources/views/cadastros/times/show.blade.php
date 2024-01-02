@extends('layouts.main')

@section('body')

<div class="container-fluid mb-5 mt-3">
  <div class="row">
    <div class="col">
      Exibindo Time
    </div>
    <div class="col text-end">
      <a href="{{route('time.index')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container">
  <form action="{{route('time.update', $time->id)}}" method="POST">
    @method('PUT')
    @csrf

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{old('nome', $time->nome)}}">

    <label for="lider">Líder:</label>
    <input type="text" id="lider" name="lider_id" value="{{old('lider', $time->lider->nome)}}">

    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" value="{{old('descricao', $time->descricao)}}">

    <button type="submit">Salvar alterações</button>

  </form>
</div>

@endsection