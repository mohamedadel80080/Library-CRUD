@extends('layout')
@section('content')
{{-- this page use to show Book details --}}
<div>
  <h5 >Book ID:{{$category->id}}</h5>
  <h1 >{{$category->name}}</h1>


  <br>

  <h3>Books:</h3>
<ul>
@foreach($category->books as $book)
<hr>
  <li>{{$book->title}}</li>  
@endforeach
</ul>
<center>
  <a href="{{route('Categories.index')}}"><button type="button" class="btn btn-dark">back</button></a>
  </div>
</center>
@endsection