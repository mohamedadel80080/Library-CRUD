@extends('layout')
@section('content')
{{-- this page use to show Book details --}}
<div>
  <h5 >Book ID:{{$book->id}}</h5>
  <h1 >{{$book->title}}</h1>
  <p >{{$book->desc}}</p>

  <h3>categories</h3>
  <br>
<ul>
@foreach($book->categories as $category)
  <li>{{$category->name}}</li>  
  <hr>
@endforeach
</ul>
<center>
  <a href="{{route('books.index')}}"><button type="button" class="btn btn-dark">back</button></a>
  </div>
</center>
@endsection