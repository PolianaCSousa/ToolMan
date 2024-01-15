@props(['label', 'name', 'placeholder', 'type', 'value', 'id'])


<div class="mb-3">
  <label class="form-label">{{$label}}</label>
  <input value="{{$value ?? null}}" @if($type == 'number') step="0.1" @endif type="{{$type}}" class="form-control" name="{{$name}}" placeholder="{{$placeholder ?? null}}" />
</div>