@props(['label', 'dados', 'name'])

<div class="mb-3">
  <div class="form-label">{{$label}}</div>
  <select name="{{$name}}" class="form-select">
    @foreach($dados as $d)
      <option value="{{$d->id}}">{{$d->nome}}</option>
    @endforeach
  </select>
</div>