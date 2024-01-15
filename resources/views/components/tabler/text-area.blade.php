@props(['value', 'name', 'placeholder', 'label'])

<div class="mb-3">
  <label class="form-label">{{$label}}</label>
  <textarea value="{{$value}}" class="form-control" name="{{$name}}" placeholder="{{$placeholder ?? null}}">{{$value}}</textarea>
</div>