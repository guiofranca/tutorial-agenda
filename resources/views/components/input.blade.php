@props([
    'id',
    'name',
    'value' => null,
    'type' => null,
    'label' => 'Coloca o Label poxa',
    'required' => false,
])
<label for="{{$id}}" class="form-label">{{$label}}</label>
<input class="form-control" type="{{$type}}" id="{{$id}}" name="{{$name}}" value="{{$value}}" {{$required ? 'required' : ''}}>
@error($name)
<div class="form-text text-danger">{{$message}}</div>
@enderror