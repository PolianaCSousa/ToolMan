@extends('layouts.main')

@section('body')
<nav class="navbar navbar-expand-lg bg-body-secondary">
  <div class="container-fluid">
    <a href="{{route('home')}}" class="navbar-brand">Toolman</a>
    <div>
      <div class="navbar-nav">
        
          <a href="{{route('login')}}" class="nav-link">Entrar</a>
          <a href="{{route('register')}}" class="nav-link">Registrar-se</a>
        
      </div>
    </div>
  </div>
</nav>
@endsection