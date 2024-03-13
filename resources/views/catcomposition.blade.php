@extends('layouts.app')
@section('meta_title','')
@section('content')
<ul>
@foreach($data as $r)
<li><a href="/category/{{$r->composition}}/{{$r->packing}}">{{$r->packing}}</a></li>
@endforeach
</ul>

@endsection