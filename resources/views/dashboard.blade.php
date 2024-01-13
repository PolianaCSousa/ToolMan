@extends('layouts.main')

@section('body')
<div class="container-fluid mb-5 mt-3">
  <div class="row">
    <div class="col">
      Dashboard
    </div>
    <div class="col text-end">
      <a href="{{route('home')}}" class="btn btn-outline-primary"><i class="ti ti-arrow-narrow-left mr-3"></i>Voltar</a>
    </div>
  </div>
</div>

<div class="container mt-5">
    <h1>Meu perfil</h1>
</div>
    
@endsection