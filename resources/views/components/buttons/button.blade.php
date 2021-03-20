@props([
    'type',
    'name',
    'link'
])
<a  href="{{$link}}" type="button" class="btn btn-{{$type}}" style="margin-bottom: 20px;">{{$name}}</a>