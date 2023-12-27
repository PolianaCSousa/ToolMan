@extends('layouts.main')


@section('body')

<div class="container">
  <form action="{{route('times.store')}}">
    @csrf
    
  </form>
</div>

@endsection
