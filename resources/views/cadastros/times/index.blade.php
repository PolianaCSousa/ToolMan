@extends('layouts.main')

@section('body')

<div class="container">
  <h1>Exibindo Times</h1>
</div>

<div class="container text-end">
  <a class="btn btn-primary" href="{{route('time.create')}}">Cadastrar Time</a>
</div>

<div class="container">
  <table>
    <tr>
      <th>Líder</th>
      <th>Nome</th>
      <th>Descrição</th>
    </tr>

  

  </table>
</div>

@endsection